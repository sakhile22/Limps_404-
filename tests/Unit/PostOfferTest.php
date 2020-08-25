<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\PostOffer;

class ExampleTest extends TestCase
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

    public function testPostOfferCreation()
    {
        $user = new PostOffer([
            'offer_title' => 'Software Development',
            'company' => 'inLocal.io',
            'location' => 'Nkomo 22B'
        ]);

        $this->assertEquals('Software Development', $user->name);
        $this->assertEquals('inLocal.io', $user->company);
        $this->assertEquals('location',$user->location);
    }
}
