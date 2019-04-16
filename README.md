# :sparkles::volcano: Genese  

[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/mystroken/genese/issues)
[![Tweet](https://img.shields.io/twitter/url/http/shields.io.svg?style=social)](https://twitter.com/intent/tweet?text=Have%20a%20look%20on%20this%20interesting%20WordPress%20starter%20theme%20with%20a%20modern%20front-end%20development%20workflow&url=https://github.com/mystroken/genese&via=mystroken&hashtags=wordpress,boilerplate,webpack4,browserSync,hmr,developers)
<br>

> Genese is a WordPress starter theme with a modern front-end development workflow.<br>Based on HTML5 Boilerplate, BrowserSync & WebPack (HMR).

<br>

### :tada: Features

<br>

**:pushpin: Modern front-end development workflow:**

* Hot Module Replacement for Js & Scss files.
* BrowserSync to watch changes on PHP files.

<br>

**:pushpin: WordPress development workflow enhanced:**

* Template wrapper: removes repetitive inclusions in template files.
* A nice organization of the code with some SEO snippets.

<br>

## Usage

#### 1. Clone the repository to the WordPress theme directory.

```bash
git clone https://github.com/mystroken/genese.git
```

#### 2. Remove the .git folder.

```bash
cd genese && rm -rf .git/
```

#### 3. Enjoy coding your theme with Genese.

```shell
genese/               # → Root folder for the project
├── app/
        ├── inc/      # → WordPress Hooks and miscellanous helper functions.
        └── walkers/
├── resources/
        ├── assets/   # → Frontend assets source and Configs of compiling process.
        ├── lang/
        └── scripts/  # → Do touch, scripts to compile assets.
└── template-parts/
```


## 3.1 — Customize the frontend.
First you should get Nodejs installed on your machine.
Then install npm dependencies
```bash
npm install
```
Configure the assets bundling
```./resources/assets/config.js```
Start the dev script
```bash
npm run start
```
```bash
npm run build
```
  - 3.1.1 — Customize webpack
  - 3.1.2 — Include scripts into WordPress
 
## 3.2 — Setup the theme.
  - 3.2.1 — Declare navigations
  - 3.2.2 — Declare widget areas (sidebars)
 
## 3.3 — Customize templates
  - 3.3.1 — Customize the base template
  - 3.3.2 — Customize the template parts
    - 3.3.2.1 — Index views (index.php, archive.php, search.php)
    - 3.3.2.2 — Single views (single.php, page.php)

## Inspired by

* [https://github.com/bionikspoon/webpack-hmr-wordpress/](https://github.com/bionikspoon/webpack-hmr-wordpress/)
* [https://github.com/roots/sage](https://github.com/roots/sage)
* [https://wordpress.org/themes/twentyseventeen/](https://wordpress.org/themes/twentyseventeen/)
* [http://underscores.me](http://underscores.me)
