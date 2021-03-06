<?php

class Model_News extends Model
{
	protected static $_properties = array(

		'id',
		"title",
		"alias",
		"short_content",
		"content",
		"avartar",
		"meta_key",
		"meta_desc"
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'news';

}
