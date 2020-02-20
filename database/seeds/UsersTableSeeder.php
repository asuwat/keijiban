<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        $faker_en = Faker\Factory::create('en_US');
        for ($i = 0; $i < 20; $i++)
        {
            
            DB::table('users')->insert([
                'name' => $faker_en->unique()->firstName(),
                'body' => $faker->realText(200),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('1234'),
                'email_verified_at' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
