# Laravel Svelte Preset

A Laravel-8 frontend Svelte-3 preset for initial Svelte scaffolding Laravel Project.

## Why Svelte-3 killer fontend framework?

* This is already the killer fontend framework in 2021, And It's going to kill Angular,Vue,React...blah blah.. blha.
*  Where Vue taken my weeks of stu4dy to just see, how a button-counter component works ! Damn It ! and the Svelte Just Took Few Hours to Create same this with less code and cleaner concept. Yeah I'm slow learner. I did some C#.net Project with Desktop Form-App with C#.net Components. So, I Was finding similar to something like that for my web projects with a minimum efforts to setup & Develop.
*  
*  Component in Svelte works like Vb.net/C#.net Desktop Application Components. This is how much crazy things happening here !!!


## Interesting new approaches in frontend family
* Svelte is an interesting new approach in the JavaScript space, created by [@Rich_Harris](https://twitter.com/Rich_Harris). 
* While traditional frontend frameworks do the bulk of their work in the browser, Svelte does this in compilation step.
* They provide a fluid syntax for writing expressive code, but compile it down to small, framework-less vanilla JavaScript.


If you don't know what Svelte is, we highly recommend starting with Rich Harris' talk [Rethinking Reactivity](https://youtu.be/AdNJ3fydeao) from YGLF Code Camp 2019, his [introductory blog post](https://svelte.dev/blog/svelte-3-rethinking-reactivity) or - if you're more of a hands-on type - Svelte's [interactive tutorial](https://svelte.dev/tutorial/).

_This package is still in active development, so you might want to [watch](https://github.com/wewowweb/laravel-svelte-preset/subscription) the repository to be notified of future changes._

# So Lets see, how we are going set this up for a brand new Laravel-8.x and Svelte-3.x Project.

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

#### The package will provide initial files needed for project base :

- `/js/app.js`
- `/js/components/App.svelte`
- `webpack.mix.js`

#### Setp-5: ### Now We need to ready up Laravel & Svelte.

### Usage 

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>The New Laravel-8 and Svelte-3 App</title>
    <!-- Include the app.css file -->
     <link rel="stylesheet" href="{{ mix('css/css.js') }}">
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

###### If you wish to use custom components, note you cannot use regular svelte components.Doing so will result in an invalid constructor error for the svelte component.

#### Creating your custom components:

- Component name must be two or more words joined by the '-' character e.g. `'my-test-component'`.
- Components can be accessed in blade file like a regular html tag e.g. `<my-test-component />`
- In some case closing tag like `<my-test-component><my-test-component/>` is necessary, like a `my-test-component.svelte` contains `<slot></slot>` tag in it.
- See The instructions below for more detail guidence.


## To register a custom component and use it in your `blade.php` :

#### Step 1: Create a New Custom Component (e.g. MyTestComponent.svelte)

```html
<script>
let count=0 
</script>

<button on:click={() => count++}>
 Button Clicked {count} Time(s)
</button>
```
{updated to here}
#### Step 2: Modify The `webpack.mix.js`file :

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

#### Step 5: Use the new component in your `blade.php`file

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
- [Aminur670](https://github.com/aminur670)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
