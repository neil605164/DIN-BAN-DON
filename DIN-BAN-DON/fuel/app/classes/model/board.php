<?php

class Model_Board extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'end_time',
		'store_id',
		'created_at',
		'updated_at',
	);

	protected static $_table_name = 'boards';

}
