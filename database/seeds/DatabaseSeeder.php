<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call(TagsSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 500; ++$i) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->unique()->email;
            $user->password = Hash::make('secret');
            $user->save();
        }
    }
}

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->delete();

        $faker = Faker\Factory::create();
        $users = User::all();
        for ($i = 0; $i < 500; ++$i) {
            $post = new Post();
            $post->title = $faker->paragraph;
            $users->random(1)->posts()->save($post);
        }
    }
}
