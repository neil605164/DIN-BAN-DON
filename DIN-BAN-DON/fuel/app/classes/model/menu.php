<?php

class Model_Menu extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'store_id',
		'name',
		'price',
		'created_at',
		'updated_at',
	);

	protected static $_table_name = 'menus';

}
