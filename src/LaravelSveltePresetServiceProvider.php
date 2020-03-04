<?php

namespace Wewowweb\LaravelSveltePreset;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

class LaravelSveltePresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        PresetCommand::macro('svelte', function ($command) {
            SveltePreset::install();
            $command->info('Svelte scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
