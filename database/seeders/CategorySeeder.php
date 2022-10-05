<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [[
            'name' => 'Speaking',
        ],
        [
            'name' => 'Writting',
        ],
        [
            'name' => 'Reading',
        ],
        [
            'name' => 'Listening',
        ]];
        DB::table('categories')->insert($param);
    }
}
