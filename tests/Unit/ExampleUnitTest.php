<?php

class UserTest extends PHPUnit\Framework\TestCase{

  public function testThatWeCanGetTheFirstName(){
    $user = new \App\Models\User;

    $user->setFirstName('Billy') ;
    $this->assertEquals($user->getFirstName() , 'Billy') ;
  }

  public function testThatWeCanGetTheLastName(){

    $user = new \App\Models\User;

    $user->setLastName('Mensa') ;
    $this->assertEquals($user->getLastName() , 'Mensa') ;

  }

  public  function testThatWeCanGetTheFullName(){
    $user = new \App\Models\User;


    $user->setFirstName('Billy') ;
    $user->setLastName('Mensa') ;
    $this->assertEquals($user->getFullName() , 'Billy Mensa') ;

  }
  public function testThatFirstandLastnameareTrimmed(){

    $user = new \App\Models\User;


    $user->setFirstName('   Billy ') ;
    $user->setLastName('  Mensa ') ;
    $this->assertEquals($user->getFirstName() , 'Billy') ;
    $this->assertEquals($user->getLastName() , 'Mensa') ;
  }

  public function testEmailAddress(){

        $user = new \App\Models\User;
        $user->setEmailaddress('Billymensa@gmail.com') ;
        $this->assertEquals($user->getEmailaddress() , 'Billymensa@gmail.com') ;

  }
  public function testEmailVariableContainCorrectValues(){
    $user = new \App\Models\User;

    $user->setFirstName('Billy') ;
    $user->setLastName('Mensa') ;
    $user->setEmailaddress('Billymensa@gmail.com') ;

    $emailvariables = $user->getEmailVariables() ;

    $this->assertArrayHasKey('full_name',$emailvariables);
    $this->assertArrayHasKey('email',$emailvariables) ;

    $this->assertEquals($emailvariables['full_name'] , 'Billy Mensa');
    $this->assertEquals($emailvariables['email'] , 'Billymensa@gmail.com');


  }

}




 ?>
