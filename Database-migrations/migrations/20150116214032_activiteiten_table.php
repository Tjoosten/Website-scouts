<?php
  use Phinx\Migration\AbstractMigration;

  class ActiviteitenTable extends AbstractMigration {

    /**
     * Migrate Up.
     */
    public function up() {
      $Activiteiten = $this->table('Activiteiten', ['id' => 'ID']);

      $Activiteiten->addColumn('Tak', 'string', ['limit' => 60])
        ->addColumn('Datum', 'string', ['limit' => 60])
        ->addColumn('Naam', 'string', ['limit' => 60])
        ->addColumn('Beschrijving', 'text')
        ->save();
    }

    /**
     * Migrate Down.
     */
    public function down() {
      $this->dropTable('Activiteiten');
    }
  }
