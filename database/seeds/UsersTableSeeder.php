<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,10)->create()->each(function ($user){
            $user->comments()
                ->create(factory(\App\Comment::class)->make()->toArray());
        });
        foreach ((range(1, 20)) as $index) {
            DB::table('imageables')->insert(
                [
                    'image_id' => rand(1, 20),
                    'imageable_id' => rand(1, 20),
                    'imageable_type' => rand(0, 1) == 1 ? \App\Comment::class : \App\User::class
                ]
            );

        }

    }
}
