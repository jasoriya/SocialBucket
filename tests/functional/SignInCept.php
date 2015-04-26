<?php 
$I = new FunctionalTester($scenario);
$I->am('a SocialBucket member');
$I->wantTo('login to my SocialBucket account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('welcome Back');
$I->assertTrue(Auth::check());
