<?php

use Phinx\Migration\AbstractMigration;

class TakkenTable extends AbstractMigration {

  /**
  * Migrate Up.
  */
  public function up() {
    $Table = $this->table('Takken', ['id' => 'ID']);

    $Table->addColumn('Tak', 'string', ['limit' => 30])
      ->addColumn('Beschrijving', 'text')
      ->addColumn('Title', 'string', ['limit' => 255])
      ->addColumn('Sub_title', 'string', ['limit' => 60])
      ->addColumn('Last_edited', 'string', ['limit' => 15])
      ->addIndex('Tak', ['unique' => true])
      ->save();
  }

  /**
  * Migrate Down.
  */
  public function down() {
    $this->dropTable('Takken');
  }
}
