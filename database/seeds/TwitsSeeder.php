<?php

use Illuminate\Database\Seeder;

class TwitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 3; $i <= 20; $i++)
        {
            for($a = 1; $a <= 3;$a++){
                DB::table('twits')->insert([
                    'user_id' => $i,
                    'body' => $faker->realText(50),
                    'created_at' => $faker->dateTime(),
                    'updated_at' => $faker->dateTime(),
                ]);
            }
        }
    }
}
