<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Article())->insert([
            [
                'title' => Lorem::sentence(5),
                'content' => Lorem::text()
            ],
            [
                'title' => Lorem::sentence(5),
                'content' => Lorem::text()
            ]
        ]);
    }
}
