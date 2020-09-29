<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class PlaceEventsTest extends TestCase
{

    public function testPlaceEvent() {
        $user = new User([
            'name_contact_person' => "Test Person",
            'phone_number' => "0715396564",
            'event_title' => "Test Title",
            'event_description' => "Description of an event"
        ]);   

        $this->assertEquals('Test Person', $user->name_contact_person);
        $this->assertEquals('0715396564', $user->phone_number);
        $this->assertEquals('Test Title', $user->event_title);
        $this->assertEquals('Description of an even', $user->event_description);
    }

}
