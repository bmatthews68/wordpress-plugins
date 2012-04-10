<?php
/*
Plugin Name: Stack Overflow Flair for Wordpress
Plugin URI: http://btmatthews.com/soflair4wp
Description: Display your Stack Overflow Flair on your Wordpress blog
Version: v1.0.0-SNAPSHOT
Author: Brian Matthews
Author URI: http://brianmatthews.me
Author Email: brian@btmatthews.com
License: GPLv2
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
			array('description' => __('Display your Stack Overflow Flair on your Wordpress blog', 'textdomain'))
		);
	}
	
	function widget($args, $instance)
	{
  		extract($args); 
		$soflair4wp_userid = apply_filters('soflair4wp_userid', $instance['userid']);
		$soflair4wp_username = apply_filters('soflair4wp_username', $instance['username']);
		$soflair4wp_theme = apply_filters('soflair4wp_theme', $instance['theme']);
    	echo $before_widget;
    	include(WP_PLUGIN_DIR . '/SOFlair4WP/view/widget.php');
   		echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['userid'] = strip_tags($new_instance['userid']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['theme'] = strip_tags($new_instance['theme']);
		return $instance;
	}
	
	function form($instance)
	{
		if (isset($instance['userid']))
		{
			$soflair4wp_userid = $instance['userid'];
		}
		else
		{
			$soflair4wp_userid = '';
		}
		if (isset($instance['username']))
		{
			$soflair4wp_username = $instance['username'];
		}
		else
		{
			$soflair4wp_username = '';
		}
		if (isset($instance['theme']))
		{
			$soflair4wp_theme = $instance['theme'];
		}
		else
		{
			$soflair4wp_theme = 'default';
		}
		include(WP_PLUGIN_DIR . '/SOFlair4WP/view/form.php');
	}
}

add_action('widgets_init', create_function('', 'register_widget("SOFlair4WP_Widget");'));
?>