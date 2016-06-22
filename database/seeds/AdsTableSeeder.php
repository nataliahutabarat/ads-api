<?php
use Illuminate\Database\Seeder;
use App\Ads;
class AdsTableSeeder extends Seeder{
 
	public function run(){
 
		DB::table('ads')->truncate();
 
		Ads::create(array(
			'title'=>'Agung Setiawan',
			'description'=>'The awesomeness of Laravel',
                    'location'=>'The awesomeness of Laravel',
                    'price'=>20,
                    'username'=>'natalia',
                    'useremail'=>'natalia@gmail.com',
                       'userphone'=>081377495814
		));
 
		Ads::create(array(
			'title'=>'Agus',
			'description'=>'The awesomeness of Laravel',
                    'location'=>'The awesomeness of Laravel',
                    'price'=>10,
                    'username'=>'talia',
                    'useremail'=>'talia@gmail.com',
                       'userphone'=>081377495814
		));
 
		
	
 
	}
}