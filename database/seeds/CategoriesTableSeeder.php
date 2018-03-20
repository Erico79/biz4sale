<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // main category for food
        $main_category = Category::create(['name' => 'Food']);

        // sub category
        $subcat = Category::create([
            'name' => 'Cafes',
            'level' => 2,
            'parent_category_id' => $main_category->id
        ]);

        // category
        Category::create([
            'name' => 'Bagel Shops',
            'level' => 3,
            'parent_category_id' => $subcat->id
        ]);

        // main category for agriculture
        $main_category = Category::create(['name' => 'Agriculture']);

        // subcategory
        Category::create([
            'name' => 'Agricultural Supplies',
            'level' => 2,
            'parent_category_id' => $main_category->id
        ]);
    }
}
