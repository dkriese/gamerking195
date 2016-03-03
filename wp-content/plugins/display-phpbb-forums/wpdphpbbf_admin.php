<?php
/*
Admin options form
Author: anybuy.vn
Version: 1.0.0
*/
if($_POST['wpdphpbbf_hidden'] == 'Y') {
    //Form data sent
    $phpbbdb_host = $_POST['phpbbdb_host'];
    update_option('phpbbdb_host', $phpbbdb_host);
    $phpbbdb_name = $_POST['phpbbdb_name'];
    update_option('phpbbdb_name', $phpbbdb_name);
    $phpbbdb_user = $_POST['phpbbdb_user'];
    update_option('phpbbdb_user', $phpbbdb_user);
    $phpbbdb_dbpwd = $_POST['phpbbdb_pass'];
    update_option('phpbbdb_pass', $phpbbdb_pass);
    $phpbbdb_prefix = $_POST['phpbbdb_prefix'];
    update_option('phpbbdb_prefix', $phpbbdb_prefix);
    $phpbb_forum_url = $_POST['phpbb_forum_url'];
    update_option('phpbb_forum_url', $phpbb_forum_url);
    $phpbb_seo_enabled= $_POST['phpbb_seo_enabled'][0];
    update_option('phpbb_seo_enabled', $phpbb_seo_enabled);
?>
<div class="updated" xmlns="http://www.w3.org/1999/html"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php
} else {
    //Normal page display
    $phpbbdb_host = get_option('phpbbdb_host');
    $phpbbdb_name = get_option('phpbbdb_name');
    $phpbbdb_user = get_option('phpbbdb_user');
    $phpbbdb_pass = get_option('phpbbdb_pass');
	$phpbbdb_prefix = get_option('phpbbdb_prefix');
    $phpbb_forum_url = get_option('phpbb_forum_url');
    $phpbb_seo_enabled = get_option('phpbb_seo_enabled');
}
?>
<div class="wrap">
<?php    echo "<h2>" . __( 'Display phpBB Node Options', 'wpdphpbbf_trdom' ) . "</h2>"; ?>
<form name="wpdphpbbf_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="wpdphpbbf_hidden" value="Y">
    <?php    echo "<h4>" . __( 'phpBB Forum Settings', 'wpdphpbbf_trdom' ) . "</h4>"; ?>
    <p><?php _e("Database host: " ); ?><input type="text" name="phpbbdb_host" value="<?php echo $phpbbdb_host; ?>" size="20"><?php _e(" ex: localhost" ); ?></p>
    <p><?php _e("Database name: " ); ?><input type="text" name="phpbbdb_name" value="<?php echo $phpbbdb_name; ?>" size="20"><?php _e(" ex: phpBB_forum" ); ?></p>
    <p><?php _e("Database user: " ); ?><input type="text" name="phpbbdb_user" value="<?php echo $phpbbdb_user; ?>" size="20"><?php _e(" ex: root" ); ?></p>
    <p><?php _e("Database password: " ); ?><input type="text" name="phpbbdb_pass" value="<?php echo $phpbbdb_pass; ?>" size="20"><?php _e(" ex: secretpassword" ); ?></p>
    <p><?php _e("Database prefix: " ); ?><input type="text" name="phpbbdb_prefix" value="<?php echo $phpbbdb_prefix; ?>" size="20"><?php _e(" ex: phpbb_" ); ?></p>
    <hr />
    <?php    echo "<h4>" . __( 'phpBB Forum Settings', 'phpbbdb_trdom' ) . "</h4>"; ?>
    <p><?php _e("Forum URL: " ); ?><input type="text" name="phpbb_forum_url" value="<?php echo $phpbb_forum_url; ?>" size="20"><?php _e(" ex: http://www.yourforum.com/" ); ?></p>
    <p><?php _e("Use Full Friendly URLs: " ); ?><input type=radio name="phpbb_seo_enabled[]" value="Yes" <?php if($phpbb_seo_enabled=='Yes')echo "checked=checked";?>> Yes &nbsp;&nbsp;&nbsp;<input type=radio name="phpbb_seo_enabled[]" value="No" <?php if($phpbb_seo_enabled=='No')echo "checked=checked";?>> No    </p>
	<p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'wpdphpbbf_trdom' ) ?>" />
    </p>
</form>
</div>