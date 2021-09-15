<?php

use Illuminate\Database\Seeder;

class MainSitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products =
        [
            '1',
            '2',
        ];
        foreach($products as $product){
        factory(\App\MainSite::class)->create([ 'name' => $product ]);
    }
    }
}
