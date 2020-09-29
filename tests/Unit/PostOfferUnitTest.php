<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class PostOfferTest extends TestCase
{

    public function testPostOffer() {
        $user = new User([
            'offer_title' => "Test Offer Title",
            'location' => "Nkomo 22B",
            'vacancy_details' => "Developer office work",
            'candidate_skills' => "Description of candidate required skills"
        ]);   

        $this->assertEquals('Test Offer Title', $user->offer_title);
        $this->assertEquals('Nkomo 22B', $user->location);
        $this->assertEquals('Developer office work', $user->vacancy_details);
        $this->assertEquals('Description of candidate required skills', $user->candidate_skills);
    }

}
