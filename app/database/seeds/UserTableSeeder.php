<?php

	/**
	 * Seed the user table.
	 *
	 */
  class UserTableSeeder extends Seeder {
    public function run()
    {
      //DB::table('users')->delete();
      User::create(['username'=>'admin', 'password'=>'password', 'name'=>'Admin']);
    }
  }