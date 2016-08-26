<?php

namespace Fuel\Migrations;

class Create_menus
{
	public function up()
	{
		\DBUtil::create_table('menus', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'store_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'price' => array('constraint' => 5, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('menus');
	}
}