<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1st reset the database table
        App\Models\post::truncate(); 

        //Number 1: 
        //useing query builder to manually insert data...
        // DB::table('posts')->insert([
        //     [
        //         'user_id'=> 1,
        //         'category_id'=>1,
        //         'title'=>'New Feture',
        //         'content'=>'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony',
        //         'thumbnail_path'=>'photo_5e79d4c9f3b255.337533666plJXjBV5m.jpg',
        //     ],
        //     [
        //         'user_id'=> 2,
        //         'category_id'=>2,
        //         'title'=>'Novel-Corona',
        //         'content'=>'Coronavirus disease (COVID-19) is an infectious disease caused by a new virus.',
        //         'thumbnail_path'=>'photo_5e79d4c9f3b255.337533666plJXjBV5m.jpg',
        //     ]
        // ]);

        //Number 2:
        // manually seed data using Model
        // $data =[
        //     [
        //         'user_id'=> 1,
        //         'category_id'=>1,
        //         'title'=>'New Feture',
        //         'content'=>'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony',
        //         'thumbnail_path'=>'photo_5e79d4c9f3b255.337533666plJXjBV5m.jpg',
        //     ],
        //     [
        //         'user_id'=> 2,
        //         'category_id'=>2,
        //         'title'=>'Novel-Corona',
        //         'content'=>'Coronavirus disease (COVID-19) is an infectious disease caused by a new virus.',
        //         'thumbnail_path'=>'photo_5e79d4c9f3b255.337533666plJXjBV5m.jpg',
        //     ]
        // ];

        // App\Models\post::insert($data);


        //Number 3:
        //Using Factory Model we can generate data Dinamically ...
        factory(\App\Models\post::class, 10)->create();
    }
}
