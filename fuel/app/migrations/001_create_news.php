<?php

namespace Fuel\Migrations;

class Create_news
{
	public static $_table_name = 'news';

	public function up()
	{
		\DBUtil::create_table(self::$_table_name, [
			'id' => ['constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true],
			'title' => ['constraint' => 255, 'type' => 'varchar', 'null' => true, 'null' => true],
			'alias' => ['constraint' => 255, 'type' => 'varchar', 'null' => true],
			'short_content' => ['constraint' => 255, 'type' => 'varchar', 'null' => true],
			'content' => ['type' => 'text', 'null' => true],
			'avartar' => ['constraint' => 100, 'type' => 'varchar', 'null' => true],
			'meta_key' => ['constraint' => 300, 'type' => 'varchar', 'null' => true],
			'meta_desc' => ['constraint' => 300, 'type' => 'varchar', 'null' => true],
			'hits' => ['constraint' => 11, 'type' => 'int'],
			'region_show' => ['constraint' => 11, 'type' => 'int'],
			'tags' => ['constraint' => 255, 'type' => 'varchar', 'null' => true],
			'tags' => ['constraint' => 255, 'type' => 'varchar', 'null' => true],
			'created' => ['type' => 'datetime', 'null' => true],
			'modified' => ['type' => 'datetime', 'null' => true],
			'status' => ['constraint' => 4, 'type' => 'tinyint']

		], ['id'], false, 'InnoDB', 'utf8_unicode_ci');
	}

	public function down()
	{
		\DBUtil::drop_table( self::$_table_name);
	}
}