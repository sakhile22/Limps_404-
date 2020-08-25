<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\PostOffer;

class PostOfferTest extends TestCase
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
        $offer = new PostOffer([
            'offer_title' => 'Software Development',
            'company' => 'inLocal.io',
            'location' => 'Nkomo 22B'
        ]);

        $this->assertEquals('Software Development', $offer->offer_title);
        $this->assertEquals('inLocal.io', $offer->company);
        $this->assertEquals('location',$offer->location);
    }
}
