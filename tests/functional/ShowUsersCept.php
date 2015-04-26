<?php 
$I = new FunctionalTester($scenario);
$I->am('a SocialBucket member');
$I->wantTo('list all users who are registered for SocialBucket');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');

