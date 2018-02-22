<?php

use Illuminate\Database\Seeder;

class DocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        $houseBusiness =\App\Models\DocumentCategory::create(['category_icon'=>'fa-home','category_code'=>'HBS','category_name'=>'House Business','created_at'=>\Carbon\Carbon::now()]);

        \App\Models\DocumentCategory::create(['category_icon'=>'fa-users','root_category'=>$houseBusiness->id,'category_code'=>'KCA-AOP','category_name'=>'Assembly  Order Paper','created_at'=>\Carbon\Carbon::now()]);
        \App\Models\DocumentCategory::create(['category_icon'=>'fa-home','root_category'=>$houseBusiness->id,'category_code'=>'KCA-COP','category_name'=>'Committee  Order Paper','created_at'=>\Carbon\Carbon::now()]);
        \App\Models\DocumentCategory::create(['category_icon'=>'fa-home','root_category'=>$houseBusiness->id,'category_code'=>'KCA-CR','category_name'=>'Committee Report','created_at'=>\Carbon\Carbon::now()]);
        \App\Models\DocumentCategory::create(['category_icon'=>'fa-home','root_category'=>$houseBusiness->id,'category_code'=>'KCA-SP','category_name'=>'Session paper','created_at'=>\Carbon\Carbon::now()]);
        \App\Models\DocumentCategory::create(['category_icon'=>'fa-home','root_category'=>$houseBusiness->id,'category_code'=>'KCA-P','category_name'=>'Petition','created_at'=>\Carbon\Carbon::now()]);
    }
}
