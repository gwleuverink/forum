<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateTreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_may_not_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post(route('thread.store'), factory('App\Thread')->raw());
    }

    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
        // Given we have a signed in user
        $this->be($user = factory('App\User')->create()); // Authenticate the user

        // When we hit the endpoint to create a new thread
        $thread = factory('App\Thread')->make();
        $this->post(route('thread.store'), $thread->toArray());

        // Then, when we visit the thread page
        // We should see the new thread
        $this->get(route('thread.show', 1))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
