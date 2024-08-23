<?php

namespace Tests;

use App\Models\RiderLocation;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: $this->createUser();
        Sanctum::actingAs($user);

        return $user;
    }

    // register a new user
    public function createUser($override = [])
    {
        return create(User::class, $override);
    }

    // create a new rider location
    public function createRiderLocation($override = [])
    {
        return create(RiderLocation::class, $override);
    }
}
