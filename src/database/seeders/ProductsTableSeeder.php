<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('products')->insert([
            [
                'user_id' => 1,
                'title' => '苺のバスケット',
                'image' => 'img/IMG_1395.jpg',
                'category_id' => 1,
                'explanation' => '苺好きの心をくすぐる、かわいさ満点のバスケット。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'ぶどうのタペストリー',
                'image' => 'img/IMG_1402.jpg',
                'category_id' => 1,
                'explanation' => '実の季節を感じさせる、ぶどうのタペストリー。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'ぶどうの編みぐるみ',
                'image' => 'img/IMG_1414.jpg',
                'category_id' => 2,
                'explanation' => 'ふっくら可愛い、毛糸のぶどう編みぐるみ。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '消防車',
                'image' => 'img/IMG_1871.jpg',
                'category_id' => 1,
                'explanation' => '赤い車体やはしご、ホースなど、消防車ならではの力強いシルエットをそのまま表現。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'しめ縄',
                'image' => 'img/IMG_1929.jpg',
                'category_id' => 1,
                'explanation' => '新年を迎える空間を清らかに整える、しめ縄飾り。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '干支 巳',
                'image' => 'img/IMG_1951.jpg',
                'category_id' => 1,
                'explanation' => 'お正月飾りには欠かせない、十二支の仲間です。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'だるま',
                'image' => 'img/IMG_1960.jpg',
                'category_id' => 1,
                'explanation' => 'みんなの幸運を願う縁起物です。合格祈願などの励ましにぴったりなダルマさん。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'チンアナゴ',
                'image' => 'img/IMG_1963.jpg',
                'category_id' => 1,
                'explanation' => 'ひょっこり顔を出す姿が愛らしい、チンアナゴクラフト。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'マスカットのピアス',
                'image' => 'img/IMG_2407.jpg',
                'category_id' => 5,
                'explanation' => 'みずみずしさを耳元に添える、マスカットのピアス。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '干支 午',
                'image' => 'img/IMG_2485.jpg',
                'category_id' => 1,
                'explanation' => 'お正月飾りには欠かせない、十二支の仲間です。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'クリスマスリース',
                'image' => 'img/IMG_2543.jpg',
                'category_id' => 1,
                'explanation' => '季節の訪れを華やかに告げる、クリスマスリース。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'クリスマスリース',
                'image' => 'img/IMG_2550.jpg',
                'category_id' => 1,
                'explanation' => '季節の訪れを華やかに告げる、クリスマスリース。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'クリスマスリース',
                'image' => 'img/IMG_2578.jpg',
                'category_id' => 1,
                'explanation' => '季節の訪れを華やかに告げる、クリスマスリース。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '柴犬（茶）のリース',
                'image' => 'img/IMG_2591.jpg',
                'category_id' => 1,
                'explanation' => '優しい表情の柴犬が迎えてくれる、花飾りのリース。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '正月リース',
                'image' => 'img/IMG_2594.jpg',
                'category_id' => 1,
                'explanation' => '新年の福を呼び込む、正月リース。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => 'カエルの親子',
                'image' => 'img/IMG_2595.jpg',
                'category_id' => 1,
                'explanation' => 'みんなの幸運を願う縁起物です。「無事に帰る」の交通安全！',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '椿の羽子板',
                'image' => 'img/IMG_2618.jpg',
                'category_id' => 1,
                'explanation' => '気品のある椿が彩る、華やかな羽子板飾り。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '七福神の羽子板',
                'image' => 'img/IMG_2619.jpg',
                'category_id' => 1,
                'explanation' => '福を集めて一年を照らす、七福神の羽子板飾り。',
                'created_at' => $now->toDateTimeString(),
            ],
            [
                'user_id' => 1,
                'title' => '春うさぎのかご娘',
                'image' => 'img/667.jpg',
                'category_id' => 4,
                'explanation' => '春の訪れを告げるような、ふんわり優しい雰囲気の粘土細工の女の子。',
                'created_at' => $now->toDateTimeString(),
            ],
        ]);
    }
}