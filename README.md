# Laravel-8.x and Svelte-3.x frontend Preset

Follow this guide to create Laravel-8 and Svelte-3 frontend preset scaffolded Laravel-8.x Project.

## Why Svelte, the killer fontend framework?

_It's even Faster than React,Vue,Angular etc.. Even if you consider Jquery as a Framework, well it's even faster than JQuery !!!_

- This is already the killer fontend framework in 2021, And It's going to kill Angular,Vue,React...etc by 2025.
- Component in Svelte works like `Vb.net/C#.net` Desktop Application Components.
- So We are getting a compiled version of our Web Site/App !
- This is how much fast things happening here like a Fast Desktop App in Web Formation !

## Interesting new approaches in frontend family

- Svelte is an interesting new approach in the JavaScript space, created by [@Rich_Harris](https://twitter.com/Rich_Harris).
- While traditional frontend frameworks do the bulk of their work in the browser, Svelte does this in compilation step.
- They provide a fluid syntax for writing expressive code, but compile it down to small, framework-less vanilla JavaScript.

<br>

If you don't know what Svelte is, we highly recommend starting with Rich Harris' talk [Rethinking Reactivity](https://youtu.be/AdNJ3fydeao) from YGLF Code Camp 2019, his [introductory blog post](https://svelte.dev/blog/svelte-3-rethinking-reactivity) or - if you're more of a hands-on type - Svelte's [interactive tutorial](https://svelte.dev/tutorial/).

_This package is still in active development, so you might want to [watch](https://github.com/wewowweb/laravel-svelte-preset/subscription) the repository to be notified of future changes._

<br>

> ## Creating new Laravel-8.x and Svelte-3.x Project.

<br>

#### Setp-1: Create New Laravel-8.x Or Skip to Next Step

```bash
composer create-project laravel/laravel laravel-svelte-app

cd laravel-svelte

```

#### Setp-2: Install the package via composer:

```bash
composer require wewowweb/laravel-svelte-preset

```

#### Setp-3: Scaffolding Svelte Preset in the project:

```bash
php artisan ui svelte

```

#### Setp-4: Install the JavaScript dependencies, run:

```bash
npm install && npm run dev

```

#### Setp-5: Now start the watch task to auto compile our assets

```bash
npm run watch

```

#### Setp-6: Run artisan commands to serve this app with development server.

```bash
php artisan serve

```

> #### The package will create initial files needed for project base :

- `/js/app.js`
- `/js/components/App.svelte`
- `webpack.mix.js`

#### Setp-5: ### Ready up Laravel View `index.blade.php`.

> Create File: `resources\views\index.blade.php`

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>The New laravel-8 And Svelte-3 App</title>

    {{-- Bootstrap 5 Vapor from Bootswatch --}}
    <link
      rel="stylesheet"
      href="https://bootswatch.com/5/vapor/bootstrap.min.css"
    />

    {{-- App.css --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    {{-- App.js --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>
  <body>
    <div class="container">
      {{-- Svelte App Component --}}
      <App />
    </div>
  </body>
</html>
```

#### Setp-6: ### Ready up Svelte App Component `App.svelte`.

> Create File: `resources\js\components\App.svelte`

```html
<script>
  import { onMount } from 'svelte';

  onMount(() => {
    console.log('The App is Mounted');
  });
</script>

<main>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Svelte App Component</div>
        <div class="card-body">This is the App Component</div>
      </div>
    </div>
  </div>
</main>
```

<br>

> ## Registering Custom Svelte Components
>
> <br>

If you wish to use custom components, note you cannot use regular svelte components. Doing so will result in an invalid constructor error for the svelte component.

<br>

### Creating your custom components:

- Component name must be two or more words joined by the '-' character e.g. `'my-test-component'`.
- Components can be accessed in blade file like a regular html tag e.g. `<my-test-component />`
- In some case closing tag like `<my-test-component><my-test-component/>` is necessary, like a `my-test-component.svelte` contains `<slot></slot>` tag in it.
- See The instructions below for more detail guidence.

<br>

## Register custom component and use it in your Svelte App

#### Step 1: Create a New Custom Btn Component

> Create File: `resources\js\components\ui-kits\Btn.svelte`

```html
<script>
let count=0
</script>

<button class="btn btn-success" on:click={() => count++}>
 Button Clicked {count} Time(s)
</button>
```

#### Step 2: Import that Custom `Btn` Component in `App` Component for Local Scope Only

> _Note: This is how the `Btn` Component Will abe abailable only in the `App` component_

```html
<script>
  import Btn from './ui-kits/Btn.svelte';
  // Other Codes
</script>

<!-- Other Codes -->
<Btn />

<!-- Other Codes -->
```

**_Now your `App.svelte` file will look like this_**
`App` Component : `resources\js\components\App.svelte`

```html
<script>
  import Btn from './ui-kits/Btn.svelte';
  import { onMount } from 'svelte';

  onMount(() => {
    console.log('The App is Mounted');
  });
</script>

<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Svelte App Component</div>
          <div class="card-body">

            This is the App Component

            <!-- This is Local Scopeed Btn Component -->
            <Btn />

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
```


#### Step 3: Modify The `webpack` configurations for using Component :

Update File : `webpack.mix.js`

```diff
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .svelte();
```

> #### or Use This For Custome Component

```diff
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
   .svelte({
       customElement: true,
      tag: null // to get rid of "no custom element tag name" warning because we are defining components tag name it in app.js file. otherwise you would have to put "<svelte:options tag={null} />" in all of your custom elements.
   });
```

#### Step 4: Import the component to your `app.js` for globally use in app

Then within your `app.js` file, import the MyTestComponent like so:

> Update File : `resources\js\app.js`

```diff
require('./bootstrap');

import App from "./components/App.svelte";
import Btn from "./components/ui-kits/Btn.svelte";

const app = new App({
  target: document.body
});

window.app = app;

customElements.define('my-test-btn', Btn);
export default app;

```

#### Step 4: Convert your App component to a custom component

> Update File : `resources\js\app.js`

```diff
require("./bootstrap");

import App from "./components/App.svelte";
import Btn from "./components/ui-kits/Btn.svelte";

customElements.define("my-app", App);
customElements.define("my-test-btn", Btn);

const app = new App({
    target: document.body
});

window.app = app;
export default app;

```

#### Step 5: Use the new component in your `index` blade view.

> Update File : `resources\views\index.blade.php`

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The New laravel-8 And Svelte-3 App</title>

    {{-- Bootstrap 5 Vapor --}}
    <link rel="stylesheet" href="https://bootswatch.com/5/vapor/bootstrap.min.css">

    {{--  App.css --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{--  App.js --}}
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body>
	<div class="container">
     {{-- Svelte App Component --}}
     {{-- <App /> --}}

    <!-- Include your custom App Component defiened in app.js -->
    <my-app></my-app>

    <!-- Include your custom Btn Component defiened in app.js -->
    <my-test-btn></my-test-btn>

  </div>
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
- [Aminur670](https://github.com/aminur670)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
