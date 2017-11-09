<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class DoneesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_create_a_donee_account()
    {
        $user = factory('App\User')->create();
        $donee = factory('App\Donee')->create(['id', $user->id]);

    }

    /** @test */
    public function a_donor_can_browse_donees()
    {
        $donee = factory('App\User')->create();

        $response = $this->get('/donees');
        $response->assertSee($donee->first_name);
    }

    /** @test */
    public function a_donor_can_view_a_single_donee()
    {
        $donee = factory('App\User')->create();

        $response = $this->get('/donees/' . $donee->slug);
        $response->assertSee($donee->first_name);
    }
}
