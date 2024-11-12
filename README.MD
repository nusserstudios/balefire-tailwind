# Introduction

balefire is a minimal boilerplate theme for WordPress using [Tailwind CSS](https://tailwindcss.com/).

## Getting started

### Using the installer

This theme uses the ESBuild version of balefire-tailwind.

Once your theme is ready, don't forget to cd into the directory.

You will be asked if you would like to have WordPress installed as well. Keep in mind that you still need a local development environment for PHP and MySQL.

### Regular method

* Clone repo `git clone git@github.com:nusserstudios/balefire-tailwind.git && cd balefire`
* Install Bun `curl -fsSL https://bun.sh/install | bash` more info [here](https://bun.sh/)
* Run `rm -rf .git` to remove git (or `rmdir .git` for Windows)
* Run `bun i` to install dependencies
* Run `bun run sync` to start developing
* Run `bun run build` to run production build

### General

Production files are located in the `/src` folder.

You will find the editable CSS and Javascript files within the `/assets` folder. SRC is where the build files are output to, if you change these, then the when you run `bun build` these files are recompiled, and your changes will be overwritten.

Before you use your theme in production, make sure you run `bun build`.

## Bun (NPM) Scripts

There are several NPM scripts available. You'll find the full list in the `package.json` file under "scripts". A script is executed through the terminal by running `bun script-name`.

| Script     | Description                                                                    |
|------------|--------------------------------------------------------------------------------|
| build      | Creates a production (minified) build of app.js, app.css and editor-style.css. |
| dev        | Creates a development build of app.js, app.css and editor-style.css.           |
| watch      | Runs several watch scripts concurrently.                                       |
| sync       | Browsersync via localhost, and reloads the page when changes are detected.     |

## Block editor support

balefire-tailwind comes with support for the [block editor](https://wordpress.org/support/article/wordpress-editor/).

A basic setup for `theme.json` is included. This also means that you need to at least use WordPress 5.8. If you wan't to support earlier WordPress versions, you can use an [older version](https://github.com/balefireitc/balefire-tailwind/tree/0.1.1) of balefire instead.

CSS-classes for alignment (full, wide etc.) are generated automatically. You can opt-out on this by removing the plugin from the `tailwind.config.js` file.

To make the editing experience within the block editor more in line with the front end styling, a `editor-style.css` is generated.

### Define theme colors and font sizes

Several colors and font sizes are defined from the beginning. You can modify them in `theme.json`.

## Links

* [balefire website](https://balefireagency.com)
* [Tailwind CSS Documentation](https://tailwindcss.com/docs)
* [Laravel Mix Documentation](https://laravel-mix.com)
* [Esbuild Documentation](https://esbuild.github.io)

## License

MIT. Please see the [License File](/license) for more information.
