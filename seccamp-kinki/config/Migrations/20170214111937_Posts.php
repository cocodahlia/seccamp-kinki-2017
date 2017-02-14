<?php
use Migrations\AbstractMigration;

class Posts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('posts');
        $table->addColumn('postId', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('resId', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('content', 'text', [
            'default' => null,
            'limit' => 500,
            'null' => false,
        ]);
        $table->addColumn('img_name', 'string', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('img_ext', 'string', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('img_size', 'integer', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'null' => false,
        ]);

        $table->addColumn('modified', 'datetime', [
            'null' => false,
        ]);
        $table->create();
    }
}
