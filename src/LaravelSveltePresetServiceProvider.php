<?php

namespace Wewowweb\LaravelSveltePreset;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;

class LaravelSveltePresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        UiCommand::macro('svelte', function ($command) {
            SveltePreset::install();
            $command->info('Svelte scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
