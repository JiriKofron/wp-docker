<?php
	/*
	Plugin Name: Email templates
	Description: Easy email template creation tool
	Author: Jiri Kofron
	Version: 1.0
	*/
	
	add_action('admin_menu', 'easy_email_templates_menu');
	add_action('admin_enqueue_scripts', 'your_scripts');
	
	function easy_email_templates_menu(){
		add_menu_page(
			'Easy email templates',  //page title
			'Easy email templates',    //menu title
			'manage_options',     //capability
			'easy_email_templates',    //menu slug
			'initialize',      //function
			'dashicons-admin-tools', //icon url
			3                     //position
		);
		
		add_submenu_page(
			'easy_email_templates',       // parent slug
			'Create template',   // page title
			'Create template',        // menu title
			'manage_options',       // capability
			'easy_email_template_create',         // menu slug
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
	
	function your_scripts() {
		// Only enqueue our script on our plugin's page
		$screen = get_current_screen();
		if ($screen->base == 'easy_email_templates' || $screen->base == 'easy-email-templates_page_easy_email_template_create') {
			wp_enqueue_script(
				'grapejs-initialize', // unique handle for your script
				plugins_url('index.js', __FILE__), // location of your script file
				array('jquery'), false, true// dependencies. this script depends on jquery which is already loaded by WordPress
			);
		}
	}

?>
