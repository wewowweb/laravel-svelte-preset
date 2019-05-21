# Laravel Svelte Preset

A Laravel frontend preset for initial Svelte scaffolding.

## Why?

Svelte is an interesting new approach in the JavaScript space, created by [@Rich_Harris](https://twitter.com/Rich_Harris). While traditional frontend frameworks do the bulk of their work in the browser, Svelte does this in compilation step. They provide a fluid syntax for writing expressive code, but compile it down to small, framework-less vanilla JavaScript.

If you don't know what Svelte is, we highly recommend starting with Rich Harris' talk [Rethinking Reactivity](https://youtu.be/AdNJ3fydeao) from YGLF Code Camp 2019, his [introductory blog post](https://svelte.dev/blog/svelte-3-rethinking-reactivity) or - if you're more of a hands-on type - Svelte's [interactive tutorial](https://svelte.dev/tutorial/).

*This package is still in active development, so you might want to [watch](https://github.com/wewowweb/laravel-svelte-preset/subscription) the repository to be notified of future changes.*

## Installation

You can install the package via composer:

```bash
composer require wewowweb/laravel-svelte-preset
```
After that, run the following command, which will provide you with the initial scaffolding of the project:
```bash
php artisan preset svelte
```
To install the JavaScript dependencies, run:
```bash
npm install && npm run dev
```
The package will provide you with the initial set of files:
 - `/js/app.js`
 - `/js/components/App.svelte` 
 - `webpack.mix.js` 

needed to start developing with Laravel & Svelte.

### Usage

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        ...
    </head>
    <body>
        <!-- Include your App Component -->
        <App />

        <!-- Include the app.js file -->
        <script src="/js/app.js"></script>
    </body>
</html>
```


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email **gal@wewowweb.com** instead of using the issue tracker.

## Credits

- [We Wow Web](https://github.com/wewowweb)
- [Gal Jakic](https://github.com/morpheus7CS)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.