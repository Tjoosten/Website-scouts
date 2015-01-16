<?php
  use Phinx\Migration\AbstractMigration;

  class PhotoGalleryTable extends AbstractMigration {
    /**
     * Migrate Up.
     */
    public function up() {
      $Table = $this->table('Photo_Gallery', ['id' => 'ID']);

      $Table->addColumn('Naam', 'string', ['limit' => 40])
        ->addcolumn('Tak', 'string', ['limit' => 40])
        ->addColumn('File_path', 'string', ['limit' => 500])
        ->addColumn('File_name', 'string', ['limit' => 250])
        ->addColumn('Web_url', 'text')
        ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
      $this->dropTable('Photo_Gallery');
    }
  }
