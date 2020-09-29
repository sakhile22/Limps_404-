<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\PostOffer;

class PostOfferTest extends TestCase
{

    public function testPostOffer() {
        $post_offer = new User(
            [
                'offer_title' => "Software Engineering"
            ]
        );

        $this.assertEquals('Software Engineering', $post_offer->offer_title);
    }

}
