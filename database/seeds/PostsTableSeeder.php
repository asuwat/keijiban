<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 150; $i++)
        {
            DB::table('posts')->insert([
                'title' => $faker->realText(15),
                'user_id' => $faker->numberBetween(1, 20),
                'tag_id' => $faker->numberBetween(1,3),
                'body' => $faker->realText(500),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
