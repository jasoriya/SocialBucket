<?php 
$I = new FunctionalTester($scenario);

$I->am('a SocialBucket user.');
$I->wantTo('follow other SocialBucket users.');

//setup
$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

//action
$I->click('Browse Users');
$I->click('OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

//when I Follow a user..
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
//expectation
//$I->see('You are following OtherUser. ');
$I->see('Unfollow OtherUser');
//$I->dontSee('Follow OtherUser');


//when I unfollow that user...
$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');