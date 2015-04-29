# Awesome Theme

An opinionated Wordpress Theme for your next Wordpress Project. Ready for use with Yeoman, the Wordpress Yeoman Generator.

<img src="https://raw.github.com/dmodalek/awesome-wordpress/master/public/wp-content/themes/awesome-theme/screenshot.png" width="440">

## Setup

Clone this repo in your project themes folder

```
  $ git clone git@github.com:dmodalek/Awesome-Theme.git .
```

Install Theme Dependencies

```
cd public/wp-content/themes/awesome-theme;

$ npm install
$ bower install
```


## Rename

* Search & replace all occurences of "awesome-textdomain", "awesome-theme" and "Awesome Theme"

* Replace the Theme Screenshot

* Rename the Theme Folder

```
$ mv awesome-theme my-theme
```


## Run

Build with Grunt

```
  $ grunt
```

Build minified assets with the min option

```
  $ grunt min
```



## Features

* __Live Reloading__ Reloads the Browser and inject changes from CSS, JS and Markup
* __Sourcemaps__ Generates Sourcemaps for LESS and Javascript Files for easier debugging
* __Other Developer Tools__ Grunt Build Process, Automatic CSS Vendor prefixes via Grunt, .editorconfig for consistent coding style, .gitignore to ignore standard ignorables such as .DS_Store, .jshintrc file for JavaScript linting


### Deployment

Run _grunt min_ to generate minified assets. Then commit everything and merge it into your _production_ branch.
