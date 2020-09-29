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

    public function testPostOffer() {
        $user = new User([
            'offer_title' => "Test Offer Title",
        ]);   

        $this->assertEquals('Test Offer Title', $user->offer_title);
        
    }

}
