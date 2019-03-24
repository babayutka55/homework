<?php
/**
 * The development database settings. These get merged with the global settings.
 */

/*return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel_dev',
			'username'   => 'root',
			'password'   => 'password',
		),
	),
  create user 'gennsuruh'@'localhost' identified by 'bomber';
);*/

return array(
   'default' => array(
      'connection'  => array(
         //'hostname' => '127.0.0.1',
         'hostname' => getenv('HOST_NAME'),
         'port'     => '3306',
         'database' => getenv('DATABASE'),
         //'username' => 'root',
         //'password' => 'root',
         'username' => getenv('USER_NAME'),
         'password' => getenv('PASSWORD'),
      ),
        'profiling' => true,
   ),
);

/*
oil generate migration create_form first_name:string[10] last_name:string[10] gender:string[10] created_at:int updated_at:int
*/
