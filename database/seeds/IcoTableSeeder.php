<?php

use Illuminate\Database\Seeder;

class IcoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('icos')->insert([
            'user_id' => '1',
            'name' => str_random(5). 'coin',
            'website' => str_random(5). '.com',
            'symbol' => str_random(3),
            'body' => str_random(10),
            'start' => '2012-01-01',
            'end' => NULL,
            'total_supply' => '21000000',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
