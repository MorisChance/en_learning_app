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
            'name' => 'speaking',
        ],
        [
            'name' => 'writting',
        ],
        [
            'name' => 'reading',
        ],
        [
            'name' => 'listening',
        ]];
        DB::table('categories')->insert($param);
    }
}
