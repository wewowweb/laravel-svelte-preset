<?php

namespace Wewowweb\LaravelSveltePreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset;

class SveltePreset extends Preset
{
    public static function install()
    {
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
    }

    public static function updatePackageArray($packages)
    {
        return array_merge([
            'svelte' => '^3.1.0',
            'laravel-mix-svelte' => '^0.1.0',
            'svelte-loader' => '^2.13.4', ],
        Arr::except($packages, [
            '@babel/preset-react',
            'react',
            'react-dom',
            'vue',
            'vue-template-compiler',
        ]));
    }

    public static function updateMix()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        File::cleanDirectory(resource_path('js/components'));
        copy(__DIR__.'/stubs/App.svelte', resource_path('js/components/App.svelte'));
    }
}
