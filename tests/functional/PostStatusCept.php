<?php 
$I = new FunctionalTester($scenario);
$I->am('a SocialBucket User');
$I->wantTo('I want to post a status to my profile');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My first post!');

$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post');
