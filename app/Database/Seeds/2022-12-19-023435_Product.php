<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'price' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'    => 'TIMESTAMP',
        		'default' => new RawSql('CURRENT_TIMESTAMP'),
			],
			'updated_at' => [
				'type'    => 'TIMESTAMP',
        		'default' => new RawSql('CURRENT_TIMESTAMP'),
			]
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
