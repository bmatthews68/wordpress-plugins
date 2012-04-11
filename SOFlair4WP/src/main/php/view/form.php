<p>
	<label for="<?php echo $this->get_field_id( 'username' ); ?>">Userid:</label><br />
	<input 
		id="<?php echo $this->get_field_id('userid'); ?>"
		name="<?php echo $this->get_field_name('userid'); ?>"
		type="text" 
		value="<?php echo esc_attr($soflair4wp_userid); ?>"/>
</p>
<p>
	<label for="<?php echo $this->get_field_id('username'); ?>">Username:</label><br />
	<input
		id="<?php echo $this->get_field_id('username'); ?>"
		name="<?php echo $this->get_field_name('username'); ?>"
		type="text"
		value="<?php echo esc_attr($soflair4wp_username); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('theme'); ?>">Theme:</label><br />
	<select id="<?php echo $this->get_field_id('theme'); ?>" name="<?php echo $this->get_field_name('theme'); ?>">
		<option value="default" <?php if ($soflair4wp_theme == 'default') { ?>selected="selected"<?php } ?> >Default</option>
		<option value="clean" <?php if ($soflair4wp_theme == 'clean') { ?>selected="selected"<?php } ?> >Clean</option>
		<option value="dark" <?php if ($soflair4wp_theme == 'dark') { ?>selected="selected"<?php } ?> >Dark</option>
		<option value="hotdog" <?php if ($soflair4p_theme == 'hotdog') { ?>selected="selected"<?php } ?> >Hot Dog Stand</option>
	</select>
</p>
