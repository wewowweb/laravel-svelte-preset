# Laravel Svelte Preset

A Laravel frontend preset for initial Svelte scaffolding.

## Why?

Svelte is an interesting new approach in the JavaScript space, created by [@Rich_Harris](https://twitter.com/Rich_Harris). While traditional frontend frameworks do the bulk of their work in the browser, Svelte does this in compilation step. They provide a fluid syntax for writing expressive code, but compile it down to small, framework-less vanilla JavaScript.

If you don't know what Svelte is, we highly recommend starting with Rich Harris' talk [Rethinking Reactivity](https://youtu.be/AdNJ3fydeao) from YGLF Code Camp 2019, his [introductory blog post](https://svelte.dev/blog/svelte-3-rethinking-reactivity) or - if you're more of a hands-on type - Svelte's [interactive tutorial](https://svelte.dev/tutorial/).

_This package is still in active development, so you might want to [watch](https://github.com/wewowweb/laravel-svelte-preset/subscription) the repository to be notified of future changes._

## Installation

You can install the package via composer:

```bash
composer require wewowweb/laravel-svelte-preset
```

After that, run the following command, which will provide you with the initial scaffolding of the project:

```bash
php artisan ui svelte
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
    <!-- Include the app.js file -->
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>
  <body>
    <!-- Include your App Component -->
    <App />
  </body>
</html>
```

### Registering Custom Svelte Components

If you wish to use custom components, note you cannot use regular svelte components. Doing so will result in an invalid constructor error for the svelte component.

Please follow these general conventions when creating your custom components:

- Component name must be two or more words joined by the '-' character e.g. 'my-test-component'.
- Components can be accessed in blade file like a regular html tag e.g. `<my-test-component></my-test-component>`
- Closing tag is necessary because its a web component.

If you wish to register a custom component and use it within your `blade.php` files, you can do it like so:

#### Step 1: Create a New Custom Component

Let's create a new Svelte Component (e.g. MyTestComponent.svelte)

```html
<script></script>

<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">My Test Component</div>
          <div class="card-body">
            I'm a test component.
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
```

#### Step 2: Modify The `webpack.mix.js`file

Modifiy the `webpack.mix.js` file like so:

```diff
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
-   .svelte();
+   .svelte({
+       customElement: true,
+       tag: null // to get rid of "no custom element tag name" warning because we are defining components tag name it in app.js file. otherwise you would have to put "<svelte:options tag={null} />" in all of your custom elements.
+   });
```

#### Step 3: Import the component to your app.js

Then within your `àpp.js` file, import the MyTestComponent like so:

```diff
require('./bootstrap');

import App from "./components/App.svelte";
+ import MyTestComponent from "./components/MyTestComponent.svelte";

const app = new App({
  target: document.body
});

window.app = app;

+ customElements.define('my-test-component', MyTestComponent);
export default app;
```

#### Step 4: Convert your App component to a custom component

```diff
require('./bootstrap');

import App from './components/App.svelte';
import MyTestComponent from './components/MyTestComponent.svelte';

+ customElements.define('my-app', App);
customElements.define('my-test-component', MyTestComponent);

- const app = new App({
-     target: document.body,
- });

- window.app = app;
- export default app;
```

#### Step 4: Use the new component in your `blade.php`file

```diff
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        ...
        <!-- Include the app.js file -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <!-- Include your App Component -->
-       <App />
+       <my-app></my-app>
+       <my-test-component></my-test-component>
    </body>
</html>
```

Additionally, you may also define the tag within your svelte component instead of with `customElement.define` as so:

`<svelte:options tag="my-test-component" />`

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
