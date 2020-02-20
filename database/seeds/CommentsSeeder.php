<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 50; $i++)
        {
            DB::table('comments')->insert([
                'user_id' => $faker->numberBetween(1, 20),
                'post_id' => $faker->numberBetween(1, 25),
                'body' => $faker->realText(100),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                
            ]);
        }
    }
}
