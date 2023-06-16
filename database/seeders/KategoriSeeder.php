<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category' => 'Horor'
            ],
            [
                'category' => 'Sci-fi'
            ],
            [
                'category' => 'Fantasy'
            ],
            [
                'category' => 'Romance'
            ],
            [
                'category' => 'Comedy'
            ],
            [
                'category' => 'Drama'
            ],
        ];
        foreach($categories as $category){
            Category::create($category);
        }
    }
}
