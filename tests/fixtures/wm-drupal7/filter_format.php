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

$connection->schema()->createTable('filter_format', array(
  'fields' => array(
    'format' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
    ),
    'name' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'cache' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'tiny',
      'default' => '0',
    ),
    'status' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'tiny',
      'default' => '1',
      'unsigned' => TRUE,
    ),
    'weight' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
  ),
  'primary key' => array(
    'format',
  ),
  'unique keys' => array(
    'name' => array(
      'name',
    ),
  ),
  'indexes' => array(
    'status_weight' => array(
      'status',
      'weight',
    ),
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('filter_format')
->fields(array(
  'format',
  'name',
  'cache',
  'status',
  'weight',
))
->values(array(
  'format' => 'plain_text',
  'name' => 'Plain text',
  'cache' => '1',
  'status' => '1',
  'weight' => '10',
))
->execute();
