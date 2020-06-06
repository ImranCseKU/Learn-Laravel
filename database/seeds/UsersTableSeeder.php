<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Number 1: 
        //useing query builder to manually insert data...
        // DB::table('users')->insert([
        //     [
        //     'name'=> Str::random(10),
        //     'email'=> Str::random(10).'@gmail.com',
        //     'password'=> Hash::make('password')
        //     ],
        //     [
        //     'name'=> Str::random(5),
        //     'email'=> Str::random(5).'@gmail.com',
            // 'password'=> Hash::make('password')
        //     ]
        // ]);

        //Number 3:
        //Using Factory Model we can generate data Dictionary ... 
        factory(App\Models\User::class, 10)->create();
    }
}
