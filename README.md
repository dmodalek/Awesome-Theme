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




## Documentation

### Picturefill

**Responsive and high-res images for Wordpress**

- A modified version of Picturefill v1 is used. For more Infos see bower.json
- Version 1.x instead of 2.x is used. Version 2.x is still in Beta,
and high-res images do not work across mayor browsers. For no-js degradation, Picturefill 2.x only shows ALT text, where 1.x shows an image fallback

Configure: Define image sizes and media queries in inc/wp-theme.php. The filter in inc/wp-hooks.php does the rest.


### Live Reloading

**Reload the Browser and inject changes from CSS, JS and Markup**

tbd

### Sourcemaps

**Debug your LESS and Javascript Files using Sourcemaps**

tbd


### Development

**Various Developer Tools for debugging and building your assets**

* Build your assets with Grunt or Gulp
* Automatic CSS Vendor prefixes
* Debug Helper for the Grid System
* .editorconfig for consistent coding styles in IDEs
* .gitignore to ignore standard ignorables such as .DS_Store
* .jshintrc file for configuring JavaScript linting


### Deploy

Run _grunt min_ to generate minified assets. Then commit everything and merge it into your _production_ branch.
