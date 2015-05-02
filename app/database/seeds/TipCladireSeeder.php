<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TipCladireSeeder extends Seeder {
 
	public function run()
	{
			DB::table('tip_cladire')->delete();
 
			DB::table('tip_cladire')->insert([
				 ['denumire' => 'Bloc nou'],
				 ['denumire' => 'Bloc vechi'],
				 ['denumire' => 'Casa'],
				 ['denumire' => 'Duplex'],
				 ['denumire' => 'Vila']
			]);
	}

}