<?php
	/*
	Plugin Name: Grape email templates
	Description: Email template creation tool with grapejs
	Author: Jiri Kofron
	Version: 1.0
	*/
	
	add_action('admin_menu', 'grape_email_templates_menu');
	
	function grape_email_templates_menu(){
		add_menu_page(
			'Grape email templates',  //page title
			'Grape email templates',    //menu title
			'manage_options',     //capability
			'grape_email_templates',    //menu slug
			'initialize',      //function
			'dashicons-admin-tools', //icon url
			3                     //position
		);
		
		add_submenu_page(
			'grape_email_templates',       // parent slug
			'Create template',   // page title
			'Create template',        // menu title
			'manage_options',       // capability
			'grape_email_template_create',         // menu slug
			'create_template'      // function that will display this submenu
		);
	}
	
	function initialize(){
		// Your function content
		echo "<h1>Hello, This is custom menu</h1>";
	}
	
	function create_template(){
		// Your submenu function content
		echo file_get_contents(plugin_dir_path(__FILE__) . 'index.html');
	}
	
	function your_scripts()
	{
		// Only enqueue our script on our plugin's page
		wp_enqueue_script(
			'my-custom-script', // unique handle for your script
			plugins_url('/dist/main.js', __FILE__), // location of your script file
			[], // dependencies. let's assume there's no dependencies for now.
			filemtime(__DIR__ . '/dist/main.js'), // version number
			true // load in footer
		);
	}
	
	function add_my_stylesheet() {
		// Use plugins_url to get the correct URL to the CSS file
		$plugin_url = plugins_url( 'dist/main.css', __FILE__ );
		
		// Register and enqueue the stylesheet
		wp_register_style( 'my_styles', $plugin_url );
		wp_enqueue_style( 'my_styles' );
	}
	
	add_action('admin_enqueue_scripts', 'your_scripts');
	add_action( 'admin_enqueue_scripts', 'add_my_stylesheet' );

?>
