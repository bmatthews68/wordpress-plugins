<?php
	function OHLOHFlair4WP_Draw($userid, $username, $widget, $height, $width, $image)
	{
?>
<a href="https://www.ohloh.net/accounts/<?php echo esc_attr($userid); ?>?ref=<?php echo esc_attr($widget); ?>" target="_top">
<img
	alt="Ohloh profile for <?php echo esc_attr($username); ?>" 
	border="0" 
	height="<?php echo $height; ?>"
	src="https://www.ohloh.net/accounts/<?php echo esc_attr($userid); ?>/widgets/<?php echo $image; ?>" 
	width="<?php echo $width; ?>" />
</a>
<?php
	}

	switch ($ohlohflair4wp_widget) {
	case 'Tiny':
		OHLOHFlair4WP_Draw($ohlohflair4wp_userid, $ohlohflair4wp_username, 'Tiny', 15, 80, 'account_tiny.gif');
		break;
	case 'Rank':
		OHLOHFlair4WP_Draw($ohlohflair4wp_userid, $ohlohflair4wp_username, 'Rank', 24, 32, 'account_rank.gif');
		break;
        case 'Detailed':
		OHLOHFlair4WP_Draw($ohlohflair4wp_userid, $ohlohflair4wp_username, 'Detailed', 34, 191, 'account_detailed.gif');
		break;
	}
?>
