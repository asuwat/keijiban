<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'body'=>'雑談'
            ],
            [
                'body'=>'プログラミング'
            ],
            [
                'body'=>'お料理'
            ],
            

        ]);
    }
}
