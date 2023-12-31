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

$connection->schema()->createTable('url_alias', array(
  'fields' => array(
    'pid' => array(
      'type' => 'serial',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ),
    'source' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'alias' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'language' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '12',
      'default' => '',
    ),
  ),
  'primary key' => array(
    'pid',
  ),
  'indexes' => array(
    'alias_language_pid' => array(
      'alias',
      'language',
      'pid',
    ),
    'source_language_pid' => array(
      'source',
      'language',
      'pid',
    ),
  ),
  'mysql_character_set' => 'utf8',
));
