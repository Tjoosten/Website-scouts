<?php
  use Phinx\Migration\AbstractMigration;

  class OntbijtDatumsTable extends AbstractMigration {


    /**
     * Migrate Up.
     */
    public function up() {
      $Table = $this->table('Ontbijt_datums', ['id' => 'ID']);

      $Table->addColumn('Month', 'string', ['limit' => 20])
        ->addColumn('Month_nr', 'string', ['limit' => 4])
        ->addColumn('Status', 'integer', ['limit' => 1])
        ->addColumn('Deathline', 'integer', ['limit' => 11])
        ->save();
    }

    /**
     * Migrate Down.
     */
    public function down() {
      $this->dropTable('Ontbijt_datums');
    }
  }
