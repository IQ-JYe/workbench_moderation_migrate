<?php

namespace Drupal\Tests\workbench_moderation_migrate\Kernel;

use Drupal\Core\Config\Entity\ConfigEntityStorageInterface;
use Drupal\migrate_drupal\NodeMigrateType;
use Drupal\Tests\migmag\Traits\MigMagKernelTestDxTrait;
use Drupal\Tests\migrate_drupal\Kernel\d7\MigrateDrupal7TestBase;
use Drupal\Tests\workbench_moderation_migrate\Traits\WorkbenchModerationAssertionsTrait;
use Drupal\Tests\workbench_moderation_migrate\Traits\WorkbenchModerationTestToolsTrait;

/**
 * Tests Workbench Moderation flow and the changed node complete migrations.
 *
 * @group workbench_moderation_migrate
 */
class WorkbenchModerationMigrateTest extends MigrateDrupal7TestBase {

  use MigMagKernelTestDxTrait;
  use WorkbenchModerationTestToolsTrait;
  use WorkbenchModerationAssertionsTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'content_moderation',
    'filter',
    'menu_ui',
    'node',
    'text',
    'workbench_moderation_migrate',
    'workflows',
    'migmag_callback_upgrade',
  ];

  /**
   * {@inheritdoc}
   */
  protected function getFixtureFilePath() {
    return implode(DIRECTORY_SEPARATOR, [
      drupal_get_path('module', 'workbench_moderation_migrate'),
      'tests',
      'fixtures',
      'wm-drupal7.php',
    ]);
  }

  /**
   * Prepares tests: remove node migrate table and install configs and schema.
   */
  protected function prepareTest(): void {
    $this->removeNodeMigrateMapTable(NodeMigrateType::NODE_MIGRATE_TYPE_CLASSIC, '7');

    $this->installConfig(['node']);
    $this->installEntitySchema('node');
    $this->installSchema('node', ['node_access']);
    $this->installEntitySchema('content_moderation_state');
  }

  /**
   * Executes all workbench moderation related migrations.
   */
  protected function executeWorkbenchRelatedMigrations(): void {
    $this->startCollectingMessages();
    $this->executeMigrations([
      'd7_node_type',
      'd7_user_role',
      'd7_user',
    ]);
    $this->assertNoMigrationMessages();

    $this->startCollectingMessages();
    $this->executeMigrations(['workbench_moderation_flow']);
    $this->assertNoMigrationMessages();

    $this->startCollectingMessages();
    $this->executeMigrations(['d7_node_complete']);
    $this->assertNoMigrationMessages();
  }

  /**
   * Tests the "workbench_moderation_flow" migration.
   */
  public function testWorkbenchModerationFlowMigration() {
    $this->prepareTest();

    $this->startCollectingMessages();
    $this->executeMigrations(['d7_node_type']);
    $this->executeMigrations(['workbench_moderation_flow']);
    $this->assertNoMigrationMessages();

    $workflow_storage = $this->container->get('entity_type.manager')->getStorage('workflow');
    assert($workflow_storage instanceof ConfigEntityStorageInterface);
    $workflow_ids = array_keys($workflow_storage->loadMultiple());
    $this->assertEquals(
      [
        'editorial_with_draft_default_state',
      ],
      $workflow_ids
    );

    $this->assertEditorialWithDraftDefaultStateWorkflow();
  }

  /**
   * Test moderated content migration with and without missing source node revs.
   *
   * @param bool $with_missing_node_revisions
   *   Whether the test should be performed with complete or corrupted node
   *   revision data.
   *
   * @dataProvider providerTest
   */
  public function testWorkbenchModerationMigrations(bool $with_missing_node_revisions) {
    if ($with_missing_node_revisions) {
      $this->deleteSourceNodeRevisions();
    }

    $this->prepareTest();
    $this->executeWorkbenchRelatedMigrations();

    $this->assertNode1RevisionStates($with_missing_node_revisions);
    $this->assertNode2RevisionStates($with_missing_node_revisions);
    $this->assertNode3RevisionStates($with_missing_node_revisions);
    $this->assertNode4RevisionStates($with_missing_node_revisions);
    $this->assertNode5RevisionStates($with_missing_node_revisions);
  }

}
