<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'エコクラフト',
            ],
            [
                'name' => '編み物',
            ],
            [
                'name' => 'ビーズ',
            ],
            [
                'name' => '粘土',
            ],
            [
                'name' => 'レジン',
            ],
            [
                'name' => '刺繍',
            ],
            [
                'name' => 'その他',
            ],
        ]);
    }
}