<?php

namespace Wewowweb\LaravelSveltePreset\Tests;

use Orchestra\Testbench\TestCase;
use Wewowweb\LaravelSveltePreset\LaravelSveltePresetServiceProvider;

class LaravelSveltePresetInstallCommandTest extends TestCase
{
    /** Overrides the getPackageProviders
     *  to load the custom package service provider.
     *  for Orchestra Testbench */
    protected function getPackageProviders($app)
    {
        return [
            LaravelSveltePresetServiceProvider::class,
         ];
    }

    /** @test */
    public function test_console_install_command()
    {
        $this->withoutMockingConsoleOutput();

        $this->artisan('preset svelte');

        $this->assertFileExists(resource_path('js/components/App.svelte'));
    }
}
