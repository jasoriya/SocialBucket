<?php

use SocialBucket\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;
class UserRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    /**
     * @var User Repository
     */
    protected $repo;

    /**
     * Before each test, do...
     */

    protected function _before()
    {
        $this->repo = new UserRepository();
    }

    /** @test */
    public function it_paginates_all_users()
    {
        TestDummy::times(4)->create('SocialBucket\Users\User');
        $results = $this->repo->getPaginated(2);
        $this->assertCount(2, $results);
    }
    /** @test */
     public function it_finds_a_user_with_statuses_by_their_username()
    {
        //given
        $statuses = TestDummy::times(3)->create('SocialBucket\Statuses\Status');
        $username = $statuses[0]->user->username;
        //when
        $user = $this->repo->findByUsername($username);
        //then
        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);
    }
    /** @test */
    public function it_follows_another_user()
    {
        // given I have two users
        list($john, $susan) = TestDummy::times(2)->create('SocialBucket\Users\User');
        // and one user follows another user
        $this->repo->follow($susan->id, $john);
        // then I should see that user in the list of those that $john follows...
        $this->tester->seeRecord('follows', [
            'follower_id' => $john->id,
            'followed_id' => $susan->id
        ]);
    }
    /** @test */
    public function it_unfollows_another_user()
    {
        // given I have two users
        list($john, $susan) = TestDummy::times(2)->create('SocialBucket\Users\User');
        // and one user follows another user
        $this->repo->follow($susan->id, $john);
        // when I unfollow that same user
        $this->repo->unfollow($susan->id, $john);
        // then I should NOT see that user in the list of those that $john follows...
        $this->tester->dontSeeRecord('follows', [
            'follower_id' => $john->id,
            'followed_id' => $susan->id
        ]);
    }
}
