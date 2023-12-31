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

$connection->schema()->createTable('file_managed', array(
  'fields' => array(
    'fid' => array(
      'type' => 'serial',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ),
    'uid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'filename' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'uri' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
      'binary' => TRUE,
    ),
    'filemime' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'filesize' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'big',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'status' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'tiny',
      'default' => '0',
    ),
    'timestamp' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
  ),
  'primary key' => array(
    'fid',
  ),
  'unique keys' => array(
    'uri' => array(
      'uri',
    ),
  ),
  'indexes' => array(
    'uid' => array(
      'uid',
    ),
    'status' => array(
      'status',
    ),
    'timestamp' => array(
      'timestamp',
    ),
  ),
  'mysql_character_set' => 'utf8',
));
