<?php

class Model_Member extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'board_id',
		'menu_id',
		'store_id',
		'created_at',
		'updated_at',
	);


	protected static $_table_name = 'members';

}
