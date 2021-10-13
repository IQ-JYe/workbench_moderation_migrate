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

$connection->schema()->createTable('history', array(
  'fields' => array(
    'uid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'nid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'timestamp' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
  ),
  'primary key' => array(
    'uid',
    'nid',
  ),
  'indexes' => array(
    'nid' => array(
      'nid',
    ),
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('history')
->fields(array(
  'uid',
  'nid',
  'timestamp',
))
->values(array(
  'uid' => '1',
  'nid' => '1',
  'timestamp' => '1634049036',
))
->values(array(
  'uid' => '1',
  'nid' => '2',
  'timestamp' => '1634049538',
))
->values(array(
  'uid' => '1',
  'nid' => '3',
  'timestamp' => '1634050760',
))
->values(array(
  'uid' => '1',
  'nid' => '4',
  'timestamp' => '1634051011',
))
->values(array(
  'uid' => '1',
  'nid' => '5',
  'timestamp' => '1634135187',
))
->execute();
