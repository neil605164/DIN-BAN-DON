<?php

class Model_Store extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'tel',
		'addr',
		'photo',
		'type',
		'created_at',
		'updated_at',
	);

	protected static $_table_name = 'stores';

}
