<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $category_names = [
            '和食', '中華料理', 'イタリア料理', '韓国料理', 'そば', 'うどん', 'やきとり',
            'ステーキ', 'ハンバーグ', '焼肉', '鍋', 'お好み焼き', 'ハンバーガー',
            '寿司', 'ステーキ', 'ハンバーグ', 'ハンバーガー', '魚料理', 'もんじゃ焼き',
            'たこ焼き'
        ];

        foreach ($category_names as $category_name) {
            $category = new Category();
            $category->name = $category_name;
            $category->save();
        }
    }
}
