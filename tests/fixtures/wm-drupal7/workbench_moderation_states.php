<?php
// phpcs:ignoreFile
/**
 * @file
 * A database agnostic dump for testing purposes.
 *
 * This file was generated by the Drupal 9.2.7 db-tools.php script.
 */

use Drupal\Core\Database\Database;

$connection = Database::getConnection();

$connection->schema()->createTable('workbench_moderation_states', array(
  'fields' => array(
    'name' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
    ),
    'label' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '255',
    ),
    'description' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '255',
    ),
    'weight' => array(
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
      'default' => '0',
    ),
  ),
  'primary key' => array(
    'name',
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('workbench_moderation_states')
->fields(array(
  'name',
  'label',
  'description',
  'weight',
))
->values(array(
  'name' => 'draft',
  'label' => 'Draft',
  'description' => 'Work in progress',
  'weight' => '-99',
))
->values(array(
  'name' => 'needs_review',
  'label' => 'Needs Review',
  'description' => 'Ready for moderation',
  'weight' => '0',
))
->values(array(
  'name' => 'published',
  'label' => 'Published',
  'description' => 'Make this version live',
  'weight' => '99',
))
->execute();
