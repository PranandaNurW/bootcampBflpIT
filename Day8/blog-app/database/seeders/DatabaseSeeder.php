<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);

        Category::create([
            'name'=>'Programming',
            'slug'=>'programming'
        ]);

        Blog::factory(15)->create();
        Comment::factory(15)->create();
    }
}
