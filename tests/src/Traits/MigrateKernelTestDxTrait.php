<?php

namespace Drupal\Tests\workbench_moderation_migrate\Traits;

/**
 * Trait for improving developer experience with migration kernel tests.
 */
trait MigrateKernelTestDxTrait {

  /**
   * Checks migration messages & shows dev friendly output if there are errors.
   */
  public function assertNoMigrationMessages() {
    $messages_as_strings = [];
    $dummies = [];
    foreach ($this->migrateMessages as $type => $messages) {
      foreach ($messages as $message) {
        $messages_as_strings[$type][] = (string) $message;
      }

      $dummies[$type] = array_fill(0, count($messages), '...');
    }

    $this->assertEquals($dummies, $messages_as_strings);
  }

}
