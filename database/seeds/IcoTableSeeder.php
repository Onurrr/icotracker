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
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae tortor augue. Suspendisse molestie, ligula convallis rhoncus pharetra, nunc eros dictum arcu, at molestie nibh lectus non elit. Nulla dapibus consectetur consequat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc quis dictum libero. Donec augue ipsum, scelerisque ut metus eget, iaculis eleifend metus.',
            'start' => '2012-01-01',
            'end' => NULL,
            'total_supply' => '21000000',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }
}
