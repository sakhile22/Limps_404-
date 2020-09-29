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

    public function testUserCreation() {
        $user = new User([
            'company_name' => "Test User",
            'telephone' => "0715997426",
            'email' => "test@mail.com",
            'password' => bcrypt("testpassword"),
            'vat_number' => "V62266525",
            'registration_number' => "T522335223",
            'country' => "south africa",
            'country_code' => "0826"
        ]);   

        $this->assertEquals('Test User', $user->company_name);
        $this->assertEquals('0715997426', $user->telephone);
        $this->assertEquals('test@mail.com', $user->email);
        $this->assertEquals('V62266525', $user->vat_number);
        $this->assertEquals('T522335223', $user->registration_number);
        $this->assertEquals('south africa', $user->country);
        $this->assertEquals('0826', $user->country_code);
        
    }

    public function testPostOffer() {
        $post_offer = new User(
            [
                'offer_title' => "Software Engineering"
            ]
        );

        $this.assertEquals('Software Engineering', $post_offer->offer_title);
    }

}
