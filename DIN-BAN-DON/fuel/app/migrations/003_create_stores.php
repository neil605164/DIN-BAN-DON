<?php

namespace Fuel\Migrations;

class Create_stores
{
	public function up()
	{
		\DBUtil::create_table('stores', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'tel' => array('constraint' => 20, 'type' => 'varchar'),
			'addr' => array('constraint' => 255, 'type' => 'varchar'),
			'photo' => array('constraint' => 255, 'type' => 'varchar'),
			'type' => array('constraint' => 100, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),


		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stores');
	}
}