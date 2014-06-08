<?php

	/**
	 * Seed the user table.
	 *
	 */
  class PostTableSeeder extends Seeder {
    public function run()
    {
      Post::create(['post_title'=>'Welcome to GrieferVal', 
                    'post_body'=>'This post is auto generated when the database is seeded', 'post_author'=>'1']);
    }
  }