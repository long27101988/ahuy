<?php

namespace Fuel\Migrations;

class Create_news_2
{
	public function up()
	{
		\DBUtil::create_table('news_2', array(
			'id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('news_2');
	}
}