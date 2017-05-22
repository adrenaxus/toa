<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //init faker
    	$faker = Faker\Factory::create();
        
        //USERS
    	foreach (range(1,10) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
	        ]);
        } 
        
        //CHARACTERS
    	foreach (range(1,50) as $index) {
	        DB::table('characters')->insert([
	            'name' => $faker->name,
                'description' => $faker->text,
                'hp' => $faker->randomDigit,
                'mana' => $faker->randomDigit,
                'strength' => $faker->randomDigit,
                'intelligence' => $faker->randomDigit,
                'wisdom' => $faker->randomDigit,
                'charisma' => $faker->randomDigit,
                'dexterity' => $faker->randomDigit,
                'constitution' => $faker->randomDigit,
                'user_id' => $faker->randomElement(\App\User::lists('id')->toArray())
	        ]);
        }        
               
        
        //ITEM_CATEGORIES
        DB::table('item_categories')->insert([
            'name' => 'weapon' 
        ]);
        DB::table('item_categories')->insert([
            'name' => 'armor' 
        ]);
        DB::table('item_categories')->insert([
            'name' => 'food' 
        ]);        
        
        //ITEMS
    	foreach (range(1,50) as $index) {
	        DB::table('items')->insert([
	            'name' => $faker->name,
                'description' => $faker->text,
                'icon' => $faker->randomElement($array = array ('lorc/originals/png/acorn.png','lorc/originals/bomb.png','c')),
                'item_category_id' => $faker->randomElement(\App\ItemCategory::lists('id')->toArray())
	        ]);
        } 
        
        //ASSIGN ITEMS TO RANDOM CHARACTER
        //ITEMS
    	foreach (range(1,500) as $index) {
	        DB::table('character_item')->insert([
	            'character_id' => $faker->randomElement(\App\Character::lists('id')->toArray()),
                'item_id' => $faker->randomElement(\App\Item::lists('id')->toArray())
	        ]);
        }                 
                      
    }
}