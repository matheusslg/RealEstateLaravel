<?php

use Illuminate\Database\Seeder;

class ModalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalities')->insert([
            'nome' => str_random(10)
        ]);
    }
}
