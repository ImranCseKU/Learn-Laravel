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

        // manually seed data using Query Builder
        // DB::table('categories')->insert([
        //     [
        //         'name' =>Str::random(8),
        //         'slag' =>str_slug(Str::random(8))
        //     ],
        //     [
        //         'name' =>Str::random(5),
        //         'slag' =>str_slug(Str::random(5))
        //     ]
        // ]);

        //Using Factory Model we can generate data Dictionary ... 

        factory(\App\Models\category::class , 10)->create();
    }
}
