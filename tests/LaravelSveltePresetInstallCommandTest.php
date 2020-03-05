<?php

namespace Wewowweb\LaravelSveltePreset\Tests;

use Laravel\Ui\UiServiceProvider;
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
            UiServiceProvider::class,
            LaravelSveltePresetServiceProvider::class,
        ];
    }

    /** @test */
    public function test_console_install_command()
    {
        $this->withoutMockingConsoleOutput();

        $this->artisan('ui svelte');

        $this->assertFileExists(resource_path('js/components/App.svelte'));
    }
}
