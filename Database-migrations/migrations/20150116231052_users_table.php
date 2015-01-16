<?php
use Phinx\Migration\AbstractMigration;

class UsersTable extends AbstractMigration {

  /**
  * Migrate Up.
  */
  public function up() {
    $Table = $this->table('users');

    $Table->addColumn('username', 'string', ['limit' => 255])
      ->addColumn('password', 'string', ['limit' => 100])
      ->addColumn('Mail', 'string', ['limit' => 255])
      ->addColumn('Admin_role', 'string', ['limit' => 2])
      ->addColumn('Tak', 'string', ['limit' => 60])
      ->addColumn('Blocked', 'string', ['limit' => 5])
      ->addColumn('GSM', 'string', ['limit' => 255])
      ->addColumn('Theme', 'integer', ['limit' => 2])
      ->save();
  }

  /**
  * Migrate Down.
  */
  public function down()
  {
    $this->dropTable('users');
  }
}
