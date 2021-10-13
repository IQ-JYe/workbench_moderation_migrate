<?php

declare(strict_types = 1);

namespace Drupal\workbench_moderation_migrate\Plugin\migrate\source;

use Drupal\Core\Database\Driver\pgsql\Connection as PostgreSqlConnection;
use Drupal\migrate\Exception\RequirementsException;
use Drupal\migrate\Row;
use Drupal\migrate_drupal\Plugin\migrate\source\DrupalSqlBase;

/**
 * Source plugin for Workbench Moderation module's node related workflows.
 *
 * @MigrateSource(
 *   id = "workbench_moderation_flow",
 *   source_module = "workbench_moderation"
 * )
 */
class WorkbenchModerationFlow extends DrupalSqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('variable', 'vw')
      ->fields('vw', ['value'])
      ->condition('vw.name', 'workbench_moderation_default_state_%', 'LIKE');

    // Only existing node types.
    $available_node_types = $this->select('node_type', 't')
      ->fields('t', ['type']);
    $query->join($available_node_types, 'nt', 'SUBSTR(vw.name, 36) = nt.type');

    // Inner join variable table again on records where the
    // 'workbench_moderation_default_state_%' variable suffix equals to the
    // 'node_options_%' variable's suffix (so: the two variables addressing the
    // same node_type).
    // @see https://git.drupalcode.org/project/workbench_moderation/-/blob/7.x-3.x/workbench_moderation.module#L1091
    $node_options_var_join = $this->select('variable', 'vnj')
      ->fields('vnj')
      ->condition('vnj.name', 'node_options_%', 'LIKE');
    $query->join($node_options_var_join, 'vn', 'SUBSTR(vw.name, 36) = SUBSTR(vn.name, 14)');

    // Condition: moderation is enabled.
    $query->condition('vn.value', '%"moderation";%', 'LIKE');
    // Condition: node revisions are enabled.
    $query->condition('vn.value', '%"revision";%', 'LIKE');

    // Collect all the node types which are using the same default moderation
    // state.
    $node_types_expression = $this->getDatabase() instanceof PostgreSqlConnection
      ? "STRING_AGG(nt.type, ',')"
      : 'GROUP_CONCAT(nt.type)';
    $query->addExpression($node_types_expression, 'node_types');
    $query->groupBy('vw.value');

    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    return [
      'value' => $this->t('The default moderation state.'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    // One record for one default moderation state.
    return [
      'value' => [
        'type' => 'string',
        'alias' => 'vw',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    $states = $this->select('workbench_moderation_states', 'wms')
      ->fields('wms')
      ->orderBy('wms.name')
      ->execute()
      ->fetchAll();
    $transitions = $this->select('workbench_moderation_transitions', 'wmt')
      ->fields('wmt')
      ->orderBy('wmt.id')
      ->execute()
      ->fetchAll();
    $row->setSourceProperty('workbench_moderation_states', $states);
    $row->setSourceProperty('workbench_moderation_transitions', $transitions);

    // Convert the aggregated node_types string to a keyed array what
    // sub_process and migration_lookup can process.
    $node_types_keyed_array = array_reduce(
      explode(',', $row->getSourceProperty('node_types')),
      function (array $carry, string $node_type) {
        $carry[] = ['node_type' => $node_type];
        return $carry;
      },
      []
    );
    $row->setSourceProperty('node_types', $node_types_keyed_array);

    return parent::prepareRow($row);
  }

  /**
   * {@inheritdoc}
   */
  public function checkRequirements() {
    parent::checkRequirements();

    // If node isn't installed on source, we don't have data to migrate.
    if (!$this->moduleExists('node')) {
      throw new RequirementsException('The node module is not enabled in the source site.', [
        'source_module_additional' => 'node',
      ]);
    }
  }

}
