<?php

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        DB::table('taggables')->truncate();
        DB::table('tags')->insert([
            ['name' => 'Technology'],
            ['name' => 'Politics'],
            ['name' => 'Business'],
            ['name' => 'Entertainment'],
        ]);

        $tags = Tag::all();

        Post::all()->each(function (Post $post) use ($tags) {
            $tags = collect($tags->random(rand(1, $tags->count())))->pluck('id')->toArray();
            $post->tags()->sync($tags);
        });

        User::all()->each(function (User $user) use ($tags) {
            $tags = collect($tags->random(rand(1, $tags->count())))->pluck('id')->toArray();
            $user->tags()->sync($tags);
        });
    }
}
