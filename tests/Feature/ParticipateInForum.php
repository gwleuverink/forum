<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForum extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        // Arrange, act, assert

        $this->post(route('reply.store', 1), []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        // Given we have a authenticated user
        $this->signIn(); // Authenticate the user

        // And an existing thread
        $thread = create('App\Thread');

        // Wen the user adds a reply to the thread
        $reply = make('App\Reply');
        $this->post(route('reply.store', $thread), $reply->toArray());

        // Then their reply should be visible on the page
        $this->get(route('thread.show', $thread))
            ->assertSee($reply->body);
    }
}
