<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
	use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testOneUser(){
    	$user = new \FilmStock\User();
    	$user->name = "Bryan";
    	$user->password = "secret";
    	$user->email = "email@gmail.com";
    	$user->save();

    	$this->assertTrue(\FilmStock\User::find(1)->id == 1);
    	$this->assertTrue(\FilmStock\User::count() == 1);
    }

    public function testMultipleUsers(){
    	$users = factory(\FilmStock\User::class,10)->create();

    	$this->assertTrue(\FilmStock\User::count() == 10);

    	$user = $users[0];
    	$user->add_friend(2);
    	$user->add_friend(3);

    	$this->assertTrue($user->friends()->count() == 2);

    	$user->remove_friend(3);

    	$this->assertTrue($user->friends()->count() == 1);
    }
}
