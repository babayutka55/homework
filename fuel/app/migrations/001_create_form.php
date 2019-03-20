<?php

namespace Fuel\Migrations;

class Create_form
{
	public function up()
	{
		\DBUtil::create_table('form', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'first_name' => array('constraint' => 10, 'null' => false, 'type' => 'varchar'),
			'last_name' => array('constraint' => 10, 'null' => false, 'type' => 'varchar'),
			'gender' => array('constraint' => 10, 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('form');
	}
}