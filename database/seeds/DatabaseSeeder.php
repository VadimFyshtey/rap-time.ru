<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);

        $this->call(ArtistsSeeder::class);

        $this->call(NewsSeeder::class);
        $this->call(NewsArtistsSeeder::class);
        $this->call(NewsTagsSeeder::class);

        $this->call(InterviewsSeeder::class);
        $this->call(InterviewsArtistsSeeder::class);

        $this->call(ArticlesSeeder::class);
        $this->call(ArticlesArtistsSeeder::class);
        $this->call(ArticlesTagsSeeder::class);

        $this->call(AlbumsSeeder::class);
        $this->call(AlbumsArtistsSeeder::class);

        $this->call(LyricsSeeder::class);
        $this->call(LyricsArtistsSeeder::class);

        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);

    }

}
