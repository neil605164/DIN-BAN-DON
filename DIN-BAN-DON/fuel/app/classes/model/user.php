<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'account',
		'password',
		'created_at',
		'updated_at',
	);

	protected static $_table_name = 'users';

}
