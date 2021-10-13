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

$connection->schema()->createTable('workbench_moderation_node_history', array(
  'fields' => array(
    'hid' => array(
      'type' => 'serial',
      'not null' => TRUE,
      'size' => 'normal',
    ),
    'vid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'nid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'from_state' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '255',
    ),
    'state' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '255',
    ),
    'uid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'stamp' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'published' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'is_current' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
  ),
  'primary key' => array(
    'hid',
  ),
  'indexes' => array(
    'nid' => array(
      'nid',
    ),
    'vid' => array(
      'vid',
    ),
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('workbench_moderation_node_history')
->fields(array(
  'hid',
  'vid',
  'nid',
  'from_state',
  'state',
  'uid',
  'stamp',
  'published',
  'is_current',
))
->values(array(
  'hid' => '1',
  'vid' => '101',
  'nid' => '1',
  'from_state' => 'draft',
  'state' => 'needs_review',
  'uid' => '1',
  'stamp' => '1634048858',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '2',
  'vid' => '102',
  'nid' => '1',
  'from_state' => 'needs_review',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634048872',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '3',
  'vid' => '103',
  'nid' => '1',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634048897',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '4',
  'vid' => '104',
  'nid' => '1',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634048911',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '5',
  'vid' => '105',
  'nid' => '1',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634048911',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '6',
  'vid' => '106',
  'nid' => '1',
  'from_state' => 'draft',
  'state' => 'needs_review',
  'uid' => '1',
  'stamp' => '1634048933',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '7',
  'vid' => '107',
  'nid' => '1',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634048933',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '8',
  'vid' => '106',
  'nid' => '1',
  'from_state' => 'needs_review',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634048958',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '9',
  'vid' => '108',
  'nid' => '1',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634048958',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '10',
  'vid' => '109',
  'nid' => '1',
  'from_state' => 'draft',
  'state' => 'needs_review',
  'uid' => '1',
  'stamp' => '1634049000',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '11',
  'vid' => '110',
  'nid' => '1',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634049000',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '12',
  'vid' => '111',
  'nid' => '1',
  'from_state' => 'needs_review',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634049035',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '13',
  'vid' => '112',
  'nid' => '1',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634049056',
  'published' => '1',
  'is_current' => '1',
))
->values(array(
  'hid' => '14',
  'vid' => '201',
  'nid' => '2',
  'from_state' => 'draft',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634049454',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '15',
  'vid' => '202',
  'nid' => '2',
  'from_state' => 'draft',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634049483',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '16',
  'vid' => '203',
  'nid' => '2',
  'from_state' => 'draft',
  'state' => 'needs_review',
  'uid' => '1',
  'stamp' => '1634049510',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '17',
  'vid' => '203',
  'nid' => '2',
  'from_state' => 'needs_review',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634049518',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '18',
  'vid' => '204',
  'nid' => '2',
  'from_state' => 'draft',
  'state' => 'needs_review',
  'uid' => '1',
  'stamp' => '1634049538',
  'published' => '0',
  'is_current' => '1',
))
->values(array(
  'hid' => '19',
  'vid' => '301',
  'nid' => '3',
  'from_state' => 'draft',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634050731',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '20',
  'vid' => '302',
  'nid' => '3',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634050745',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '21',
  'vid' => '303',
  'nid' => '3',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634050745',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '22',
  'vid' => '304',
  'nid' => '3',
  'from_state' => 'draft',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634050760',
  'published' => '0',
  'is_current' => '1',
))
->values(array(
  'hid' => '23',
  'vid' => '305',
  'nid' => '3',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634050760',
  'published' => '1',
  'is_current' => '0',
))
->values(array(
  'hid' => '24',
  'vid' => '401',
  'nid' => '4',
  'from_state' => 'draft',
  'state' => 'needs_review',
  'uid' => '1',
  'stamp' => '1634050903',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '25',
  'vid' => '402',
  'nid' => '4',
  'from_state' => 'needs_review',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634050922',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '26',
  'vid' => '403',
  'nid' => '4',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634051011',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '27',
  'vid' => '404',
  'nid' => '4',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634051011',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '28',
  'vid' => '404',
  'nid' => '4',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634051021',
  'published' => '0',
  'is_current' => '1',
))
->values(array(
  'hid' => '29',
  'vid' => '501',
  'nid' => '5',
  'from_state' => 'draft',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634129105',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '30',
  'vid' => '502',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634129128',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '31',
  'vid' => '503',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634129128',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '32',
  'vid' => '504',
  'nid' => '5',
  'from_state' => 'draft',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634129955',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '33',
  'vid' => '505',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634129955',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '34',
  'vid' => '506',
  'nid' => '5',
  'from_state' => 'draft',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634129974',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '35',
  'vid' => '506',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634129997',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '36',
  'vid' => '507',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634130038',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '37',
  'vid' => '508',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634135026',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '38',
  'vid' => '509',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634135026',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '39',
  'vid' => '510',
  'nid' => '5',
  'from_state' => 'draft',
  'state' => 'needs_review',
  'uid' => '1',
  'stamp' => '1634135122',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '40',
  'vid' => '511',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634135122',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '41',
  'vid' => '512',
  'nid' => '5',
  'from_state' => 'needs_review',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634135144',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '42',
  'vid' => '513',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634135170',
  'published' => '0',
  'is_current' => '0',
))
->values(array(
  'hid' => '43',
  'vid' => '514',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'draft',
  'uid' => '1',
  'stamp' => '1634135186',
  'published' => '0',
  'is_current' => '1',
))
->values(array(
  'hid' => '44',
  'vid' => '515',
  'nid' => '5',
  'from_state' => 'published',
  'state' => 'published',
  'uid' => '1',
  'stamp' => '1634135186',
  'published' => '1',
  'is_current' => '0',
))
->execute();