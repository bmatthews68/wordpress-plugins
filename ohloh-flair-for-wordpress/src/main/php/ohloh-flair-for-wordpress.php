<?php
/*
Plugin Name: ${project.artifactId}
Plugin URI: http://btmatthews.com/ohlohflair4wp
Description: Display your OHLOH Flair on your WordPress blog
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

class OHLOHFlair4WP_Widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
			'OHLOHFlair4WP',
			'OHLOH Flair',
			array('description' => __('Display your OHLOH Flair on your WordPress blog', 'textdomain'))
		);
	}
	
	function widget($args, $instance)
	{
  		extract($args); 
		$ohlohflair4wp_userid = apply_filters('ohlohflair4wp_userid', get_option('ohlohflair4wp_userid'));
		$ohlohflair4wp_username = apply_filters('ohlohflair4wp_username', get_option('ohlohflair4wp_username'));
		$ohlohflair4wp_widget = apply_filters('ohlohflair4wp_widget', $instance['widget']);
		echo $before_widget;
		include(WP_PLUGIN_DIR . '/${project.artifactId}/view/widget.php');
   		echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget'] = strip_tags($new_instance['widget']);
		return $instance;
	}
	
	function form($instance)
	{
		if (isset($instance['widget']))
		{
			$ohlohflair4wp_widget = $instance['widget'];
		}
		else
		{
			$ohlohflair4wp_widget = 'Tiny';
		}
		include(WP_PLUGIN_DIR . '/${project.artifactId}/view/form.php');
	}
}

function OHLOHFlair4WP_register_settings()
{
	register_setting('OHLOHFlair4WP', 'ohlohflair4wp_userid');
	register_setting('OHLOHFlair4WP', 'ohlohflair4wp_username');	
}

function OHLOHFlair4WP_create_menu()
{
	add_options_page('OHLOH Flair Settings', 'OHLOH Flair', 'manage_options', 'OHLOHFlair4WP', 'OHLOHFlair4WP_settings_page');
}

function OHLOHFlair4WP_settings_page()
{
	include(WP_PLUGIN_DIR . '/${project.artifactId}/view/admin.php');	
}

add_action('widgets_init', create_function('', 'register_widget("OHLOHFlair4WP_Widget");'));
if (is_admin())
{
	add_action('admin_init', 'OHLOHFlair4WP_register_settings');
	add_action('admin_menu', 'OHLOHFlair4WP_create_menu');
}
?>
