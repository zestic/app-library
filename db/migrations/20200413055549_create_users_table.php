<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Util\Literal;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('users', ['id' => false, 'primary_key' => 'id']);
        $table
            ->addColumn('email', 'char', ['limit' => 255])
            ->addColumn('id', 'uuid')
            ->addColumn('password', 'char', ['limit' => 255])
            ->addColumn('person_id', 'char', ['limit' => 8])
            ->addColumn('username', 'char', ['limit' => 50])
            ->addTimestamps()
            ->addIndex('email', ['unique' => true])
            ->addIndex('username', ['unique' => true])
            ->create();
    }
}
