<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserAvatarImageExists()
    {
    	$users = \App\User::limit(10)->get();

    	foreach ($users as $u)
    	{
	    	$photo = $u->getPhoto();

	        $this->assertTrue(\File::exists(public_path($photo)));
    	}
    }
}
