<?php
  use Phinx\Migration\AbstractMigration;

  class InschrijvingenOntbijtTable extends AbstractMigration {

    /**
     * Migrate Up.
     */
    public function up() {
      $Table = $this->table('Inschrijvingen_ontbijt', ['id' => 'ID']);

      $Table->addColumn('Naam', 'string', ['limit' => 120])
        ->addColumn('Voornaam', 'string', ['limit' => 120])
        ->addColumn('Email', 'string', ['limit' => 120])
        ->addColumn('Maand', 'integer', ['limit' => 2])
        ->addColumn('Aantal_personen', 'integer', ['limit' => 10])
        ->addColumn('Te_betalen', 'integer', ['limit' => 10])
        ->save();
    }

    /**
     * Migrate Down.
     */
    public function down() {
      $this->dropTable('Inschrijvingen_ontbijt');
    }
  }
