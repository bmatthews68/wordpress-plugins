<?php
/*
Plugin Name: Stack Overflow Flair for WordPress
Plugin URI: http://btmatthews.com/soflair4wp
Description: Display your Stack Overflow Flair on your WordPress blog
Version: ${project.version}
Author: Brian Matthews
Author URI: http://brianmatthews.me
Author Email: brian@btmatthews.com
License: GPLv2 or later
*/
/*  Copyright 2012  Brian Matthews  (email : brian@btmatthews.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class SOFlair4WP_Widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'SOFlair4WP',
			'Stack Overflow Flair',
			array('description' => __('Display your Stack Overflow Flair on your WordPress blog', 'textdomain'))
		);
	}
	
	function widget($args, $instance)
	{
  		extract($args); 
		$soflair4wp_userid = apply_filters('soflair4wp_userid', get_option('soflair4wp_userid'));
		$soflair4wp_username = apply_filters('soflair4wp_username', get_option('soflair4wp_username'));
		$soflair4wp_theme = apply_filters('soflair4wp_theme', $instance['theme']);
		echo $before_widget;
		include(WP_PLUGIN_DIR . '/${project.artifactId}/view/widget.php');
   		echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['theme'] = strip_tags($new_instance['theme']);
		return $instance;
	}
	
	function form($instance)
	{
		if (isset($instance['theme']))
		{
			$soflair4wp_theme = $instance['theme'];
		}
		else
		{
			$soflair4wp_theme = 'default';
		}
		include(WP_PLUGIN_DIR . '/${project.artifactId}/view/form.php');
	}
}

function SOFlair4WP_register_settings()
{
	register_setting('SOFlair4WP', 'soflair4wp_userid');
	register_setting('SOFlair4WP', 'soflair4wp_username');	
}

function SOFlair4WP_create_menu()
{
	add_options_page('Stack Overflow Flair Settings', 'Stack Overflow Flair', 'manage_options', 'SOFlair4WP', 'SOFlair4WP_settings_page');
}

function SOFlair4WP_settings_page()
{
	include(WP_PLUGIN_DIR . '/${project.artifactId}/view/admin.php');	
}

add_action('widgets_init', create_function('', 'register_widget("SOFlair4WP_Widget");'));
if (is_admin())
{
	add_action('admin_init', 'SOFlair4WP_register_settings');
	add_action('admin_menu', 'SOFlair4WP_create_menu');
}
?>
