<?php

class SentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		Sentry::getUserProvider()->create(array(
	        'email'    => 'user@user.com',
	        'password' => '123456',
	        'prenume' => 'UserFirstName',
	        'nume' => 'UserLastName',
	        'id_organizatie' => 1,
	        'activated' => 1,
	    ));

		Sentry::getUserProvider()->create(array(
	        'email'    => 'admin@admin.com',
	        'password' => '123456',
	        'prenume' => 'AdminFirstName',
	        'nume' => 'AdminLastName',
	        'id_organizatie' => 1,
	        'activated' => 1,
	    ));

	    Sentry::getUserProvider()->create(array(
	        'email'    => 'admin',
	        'password' => '123',
	        'prenume' => 'AdminFirstName',
	        'nume' => 'AdminLastName',
	        'id_organizatie' => 1,
	        'activated' => 1,
	    ));

	    
	}

}