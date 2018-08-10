<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
    	for ($i=0; $i < 10000; $i++) { 
    		 DB::table('records')->insert([

         	'temp'=>rand(28, 40),
         	'humidity'=>rand(31, 70),
         	'co2'=>rand(10, 18),                              //1533747980
         	'created_at'=>date('Y-m-d H:i:s',mt_rand(1522602380,1533747980)),
         	'updated_at'=>date('Y-m-d H:i:s',mt_rand(1522602380,1533747980)),


         ]);
    	}
        
    }
}
