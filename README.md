# Awesome Theme

An opinionated Wordpress Theme for your next Wordpress Project.

<img src="https://raw.github.com/dmodalek/awesome-wordpress/master/public/wp-content/themes/awesome-theme/screenshot.png" width="440">

## Quickstart

Clone this repo in your project folder

```
  $ git clone git@github.com:dmodalek/Awesome-Wordpress.git .
```
Install Theme Dependencies

```
cd /public/wp-content/themes/awesome-theme

$ bower install
$ npm install
$ grunt

```

Build with Grunt
 
```
  $ grunt
```

## Whats next

* Search & replace all occurences of "awesome-textdomain" and "awesome-theme"

* Rename the Theme Folder 

```
$ mv awesome-theme my-theme
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

