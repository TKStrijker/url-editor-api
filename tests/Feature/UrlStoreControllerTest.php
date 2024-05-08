<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UrlStoreControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * Assert a request with missing attributes is declined by the validation
     */
    public function test_validation(): void
    {
        $response = $this->post(
            '/api/url/',
        );

        $errors = session('errors');

        $response->assertSessionHasErrors();
        $this->assertEquals($errors->get('user_id')[0], "The user id field is required.");
    }

    /**
     * Assert that a model was created and returned.
     */
    public function test_success(): void
    {
        $response = $this->post(
            '/api/url/',
            [
                'user_id' => $this->user->id,
                'original_url' => 'https://fake-url.com',
                'shortened_url' => 'https://fake.com',
                'redirect_url' => 'https://real.com',
            ]
        );

        /**
         * Check if all attributes are present to assert that
         * a model was returned, and that it is a Url
         */
        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('id', 1)
                ->where('user_id', $this->user->id)
                ->where('original_url', 'https://fake-url.com')
                ->where('shortened_url', 'https://fake.com')
                ->where('redirect_url', 'https://real.com')
                ->etc()
        );
    }
}
