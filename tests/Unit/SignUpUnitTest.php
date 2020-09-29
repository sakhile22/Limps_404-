<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class SignUpTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testUserCreation()
    {
        $user = new User([
            'company_name' => "Test User",
            'telephone' => "0715997426",
            'email' => "test@mail.com",
            'password' => bcrypt("testpassword")
        ]);   

        $this->assertEquals('Test User', $user->company_name);
        $this->assertEquals('0715997426', $user->telephone);
        $this->assertEquals('test@mail.com', $user->email);
        // $this->assertEquals('password', $user->password);
    }

}
