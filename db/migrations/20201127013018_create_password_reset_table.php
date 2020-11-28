<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePasswordResetTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {
        $this->table('password_reset')
            ->addColumn('token', 'char', ['limit' => '20'])
            ->addColumn('ip_address', 'char', ['limit' => '40'])
            ->addColumn('user_id', 'uuid')
            ->addTimestamps()
            ->addIndex('token', ['unique' => true])
            ->create();
    }

    public function down()
    {
        $this->table('password_reset')->drop()->save();
    }
}
