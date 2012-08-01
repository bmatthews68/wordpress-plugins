<p>
	<label for="<?php echo $this->get_field_id('widget'); ?>">Widget:</label><br />
	<select id="<?php echo $this->get_field_id('widget'); ?>" name="<?php echo $this->get_field_name('widget'); ?>">
		<option value="Tiny" <?php if ($ohlohflair4wp_widget == 'Tiny') { ?>selected="selected"<?php } ?> >Tiny</option>
		<option value="Rank" <?php if ($ohlohflair4wp_widget == 'Rank') { ?>selected="selected"<?php } ?> >Rank</option>
		<option value="Detailed" <?php if ($ohlohflair4wp_widget == 'Detailed') { ?>selected="selected"<?php } ?> >Detailed</option>
	</select>
</p>
