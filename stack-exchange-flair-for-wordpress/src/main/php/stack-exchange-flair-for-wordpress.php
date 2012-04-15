<?php
/*
Plugin Name: ${project.name}
Plugin URI: http://btmatthews.com/${project.artifactId}
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

class SEFlair4WP_Widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'SEFlair4WP',
			'Stack Exchange Flair',
			array('description' => __('Display your Stack Exchange Flair on your WordPress blog', 'textdomain'))
		);
	}
	
	function widget($args, $instance)
	{
  		extract($args); 
		$seflair4wp_userid = apply_filters('seflair4wp_userid', get_option('seflair4wp_userid'));
		$seflair4wp_username = apply_filters('seflair4wp_username', get_option('seflair4wp_username'));
		$seflair4wp_theme = apply_filters('seflair4wp_theme', $instance['theme']);
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
			$seflair4wp_theme = $instance['theme'];
		}
		else
		{
			$seflair4wp_theme = 'default';
		}
		include(WP_PLUGIN_DIR . '/${project.artifactId}/view/form.php');
	}
}

function SEFlair4WP_register_settings()
{
	register_setting('SEFlair4WP', 'seflair4wp_userid');
	register_setting('SEFlair4WP', 'seflair4wp_username');
}

function SEFlair4WP_create_menu()
{
	add_options_page('Stack Exchange Flair Settings', 'Stack Exchange Flair', 'manage_options', 'SEFlair4WP', 'SEFlair4WP_settings_page');
}

function SEFlair4WP_settings_page()
{
	include(WP_PLUGIN_DIR . '/${project.artifactId}/view/admin.php');	
}

add_action('widgets_init', create_function('', 'register_widget("SEFlair4WP_Widget");'));
if (is_admin())
{
	add_action('admin_init', 'SEFlair4WP_register_settings');
	add_action('admin_menu', 'SEFlair4WP_create_menu');
}
?>
