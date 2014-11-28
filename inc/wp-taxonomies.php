<?php

namespace Theme\Taxonomy;

//
// Initialized in functions.php
// - new Theme\Taxonomy\Example();

class Example {

	public function __construct() {

		register_taxonomy(
			'examples',
			array('post'),
			array(
				'labels' => array(
					'name' => 'Examples',
					'singular_name' => 'Example',
					'add_new_item' => 'Add New Example',
					'edit_item' => 'Edit Example',
					'update_item' => 'Update Example',
				),

				// Backend
				'hierarchical' => true,
				'show_in_nav_menus' => true,

				// Fronted
				'public' => true,
				'query_var' => 'examples',
				'rewrite' => array('slug' => 'examples', 'with_front' => false),
			)
		);
	}

}
