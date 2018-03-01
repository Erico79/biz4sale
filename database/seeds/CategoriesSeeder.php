<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::truncate();
        \App\Models\Category::create([
            'category_name'=> "Agriculture",'description'=>'Agriculture','image_path'=>""
        ]);
    }
}
