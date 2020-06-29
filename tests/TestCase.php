<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /**
     * @return TestCase
     */
    protected function login(): TestCase
    {
        return $this->actingAs(create(User::class));
    }

    /**
     * @return TestCase
     */
    protected function loginAdmin(): TestCase
    {
        return $this->actingAs(create(User::class, ['is_admin' => true]));
    }
}
