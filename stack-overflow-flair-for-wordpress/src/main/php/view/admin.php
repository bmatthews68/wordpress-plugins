<div class="wrap">
	<h2><?php _e('Stack Overflow Flair Settings') ?></h2>
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>
		<?php settings_fields('SOFlair4WP'); ?>
 		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e('User ID') ?></th>
				<td><input type="text" name="soflair4wp_userid" value="<?php echo get_option('soflair4wp_userid'); ?>" /></td>
			</tr> 
			<tr valign="top">
				<th scope="row"><?php _e('Display Name') ?></th>
				<td><input type="text" name="soflair4wp_username" value="<?php echo get_option('soflair4wp_username'); ?>" /></td>
			</tr> 
		</table>
		<input type="hidden" name="action" value="update" />
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>
