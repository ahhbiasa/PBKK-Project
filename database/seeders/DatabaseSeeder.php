<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // --- Creating 10 Users into User Table in the Database ---
        //User::factory(10)->create();

        // --- Creating 1 User into User Table in the Database ---
        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        // --- Creating 1 User with all fields into User Table in the Database ---
        //User::create([
        //    'name' => 'Muhammad Abhyasa Santoso',
        //    'username' => 'ahh.biasa',
        //    'email' => 'example@gamil.com',
        //    'email_verified_at' => now(),
        //    'password' => Hash::make('password'),
        //    'remember_token' => Str::random(10)
        //]);
    
        // --- Creating 1 Category Type into Category Table in the Database ---
        //Category::create([
        //    'name' => 'Web Design',
        //    'slug' => 'web-design'
        //]);

        // --- Creating 1 Post into Post Table in the Database ---
        //Post::create([
        //    'title' => 'Judul Artikel 1',
        //    'author_id' => 1,
        //    'category_id' => 1,
        //    'slug' => 'judul-artikel-1',
        //    'body' => 'lorem ipsum blbalablddfskfmksmdfk mkasmfksmafkm askfmakfmsafa slfmakmfs k'
        //]);

        // --- Creating 100 Posts with Only 5 Categories & 5 Users Into their Respective Tables in the Database ---
        //Post::factory(100)->recycle([
        //    Category::factory(3)->create(),
        //    User::factory(5)->create()
        //])->create();

        // --- 1. Creating a User and Saving it into a Variable ($abhy) ---
        //$abhy = User::create([
        //    'name' => 'Muhammad Abhyasa Santoso',
        //    'username' => 'ahh.biasa',
        //    'email' => 'example@gamil.com',
        //    'email_verified_at' => now(),
        //    'password' => Hash::make('password'),
        //    'remember_token' => Str::random(10)
        //]);

        // --- 2. Calling the User in the Variable ($abhy) to be included as a User in the 100s of Users ---
        //Post::factory(100)->recycle([
        //    Category::factory(3)->create(),
        //    $abhy,
        //    User::factory(5)->create()
        //])->create();
        
        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
