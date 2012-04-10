<p>
	<label for="<?php echo $this->get_field_id( 'username' ); ?>">Userid:</label>
	<input 
		id="<?php echo $this->get_field_id('userid'); ?>"
		name="<?php echo $this->get_field_name('userid'); ?>"
		type="text" 
		value="<?php echo esc_attr($soflair4wp_userid); ?>"/>
</p>
<p>
	<label for="<?php echo $this->get_field_id('username'); ?>">Username:</label>
	<input
		id="<?php echo $this->get_field_id('username'); ?>"
		name="<?php echo $this->get_field_name('username'); ?>"
		type="text"
		value="<?php echo esc_attr($soflair4wp_username); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('theme'); ?>">Theme:</label>
	<select id="<?php echo $this->get_field_id('theme'); ?>" name="<?php echo $this->get_field_name('theme'); ?>">
		<option value="default">Default</option>
		<option value="clean">Clean</option>
		<option value="dark">Dark</option>
		<option value="hotdog">Hot Dog Stand</option>
	</select>
</p>
