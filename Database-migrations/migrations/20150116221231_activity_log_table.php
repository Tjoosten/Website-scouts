<?php
  use Phinx\Migration\AbstractMigration;

  class ActivityLogTable extends AbstractMigration {

    /**
     * Migrate Up.
     */
    public function up() {
      $Table = $this->table('Activity_log', ['id' => 'ID']);

      $Table->addColumn('Gebruiker', 'string', ['limit' => 255])
        ->addColumn('Bericht','text')
        ->addColumn('Datum','string', ['limit' => 200])
        ->save();
    }

    /**
     * Migrate Down.
     */
    public function down() {
      $this->dropTable('Activity_log');
    }
  }
