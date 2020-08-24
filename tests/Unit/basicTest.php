<?php

function testBasicTest()
{
    $this->assertTrue(true);
}

function testUserCreation()
{
    $basic = new Basic([
        'name' => "Test User",
        'email' => "test@mail.com",
        'password' => bcrypt("testpassword")
    ]);   

    $this->assertEquals('Test User', $user->name);
}