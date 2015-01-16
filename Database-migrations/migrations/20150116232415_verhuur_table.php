<?php
use Phinx\Migration\AbstractMigration;

class VerhuurTable extends AbstractMigration {

  /**
  * Migrate Up.
  */
  public function up() {
    $Table = $this->table('Verhuur', ['id' => 'ID']);

    $Table->addColumn('Start_datum', 'string', ['limit' => 255])
      ->addColumn('Eind_datum', 'string', ['limit' => 255])
      ->addColumn('Groep', 'string', ['limit' => 255])
      ->addColumn('Status', 'string', ['limit' => 50])
      ->addColumn('Email', 'string', ['limit' => 255])
      ->addColumn('GSM', 'string', ['limit' => 255])
      ->save();
  }

  /**
  * Migrate Down.
  */
  public function down()
  {
    $this->dropTable('Verhuur');
  }
}
