<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
        [
            'Plakaty',
            'Spodnie',
            'Buty',
            'Czapki',
            'Skarpetki',

        ];
        foreach($categories as $category){
        factory(\App\Category::class)->create([ 'name' => $category ]);
    }
    }
}
