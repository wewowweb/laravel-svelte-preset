
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Svelte and other libraries. It is a great starting point when
 * building robust, powerful web applications using Svelte and Laravel.
 */

require('./bootstrap');

/**
 * Register your svelte components here.
 * Component name must be two or more words joined by the '-' character e.g. 'my-app'.
 * Components can be accessed in blade file like a regular html tag e.g. <my-app></my-app>
 * note: closing tag is necessary because its a web component.
 */

import App from "./components/App.svelte";

customElements.define('my-app', App);