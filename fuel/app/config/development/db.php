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
);*/

return array(
   'default' => array(
      'connection'  => array(
         'hostname' => '127.0.0.1',
         'port'     => '3306',
         'database' => 'fuel_dev',
         'username' => 'root',
         'password' => 'root',
      ),
        'profiling' => true,
   ),
);

/*
oil generate migration create_form first_name:string[10] last_name:string[10] gender:string[10] created_at:int updated_at:int
*/
