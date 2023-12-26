<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\TestResponse;
use Inertia\Testing\AssertableInertia;

class TestingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (!$this->app->runningUnitTests()) {
            return;
        }

        AssertableInertia::macro('hasResource', function ($key, JsonResource $resource) {
            $this->has($key);

            expect($this->prop($key))->toEqual($resource->response()->getData(true));

            return $this;
        });

        AssertableInertia::macro('hasPaginatedResource', function ($key, JsonResource $resource) {
            $this->hasResource("$key.data", $resource);

            expect($this->prop($key))->toHaveKeys(['data', 'meta', 'links']);

            return $this;
        });

        TestResponse::macro('assertHasResource', function ($key, JsonResource $resource) {
            $this->assertInertia(fn(AssertableInertia $interia) => $interia
                ->hasResource($key, $resource));
        });

        TestResponse::macro('assertHasPaginatedResource', function ($key, JsonResource $resource) {
            $this->assertInertia(fn(AssertableInertia $interia) => $interia
                ->hasPaginatedResource($key, $resource));
        });

        TestResponse::macro('assertComponent', function (string $component) {
            $this->assertInertia(fn(AssertableInertia $inertia) => $inertia->component($component, true));
        });
    }
}
