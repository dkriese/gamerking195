<?php
/*
Plugin Name: Display phpBB Forums
Plugin URI: http://anybuy.vn/
Description: Display phpBB Forums is a WordPress plugin that allows you to show nodes (Category, Forum, LinkForum) from your separate phpBB forum as primary menu in your WordPress site.
Version: 1.0.0
Author: anybuy.vn
Author URI: http://anybuy.vn/
*/
add_action('admin_menu', 'wpdphpbbf_admin_actions');
function wpdphpbbf_admin(){
    require('wpdphpbbf_admin.php');
    exit;
}
function wpdphpbbf_admin_actions(){
    add_options_page('Dispaly phpBB Forums', 'Dispaly phpBB Forums', 1, 'DispalyphpBBForums', 'wpdphpbbf_admin');
}
global $phpbbdb, $phpbbdb_prefix;
$phpbbdb_host = get_option('phpbbdb_host');
$phpbbdb_name = get_option('phpbbdb_name');
$phpbbdb_user = get_option('phpbbdb_user');
$phpbbdb_pass = get_option('phpbbdb_pass');
$phpbbdb_prefix = get_option('phpbbdb_prefix');
$phpbbdb = new wpdb($phpbbdb_user,$phpbbdb_pass, $phpbbdb_name, $phpbbdb_host);
$phpbbdb->show_errors();
wp_cache_flush();
add_filter( 'wp_nav_menu_items', 'phpbb_forum_display', 10, 2 );

function phpbb_forum_display($menu, $args) {
	$args = (array)$args;
	if ('primary' == $args['theme_location']){
	$forums = phpbb_get_forums(0);
	foreach ($forums as $forum) {
		$menu .= '<li><a href="'.$forum['href'].'">'.$forum['forum_name'].'</a>';
		if ($forum['children']){
			$menu .= '<ul class="sub-menu">';
			foreach ($forum['children'] as $child) {
				$menu .= '<li><a href="'.$child['href'].'">'.$child['forum_name'].'</a></li>';
			}
			$menu .= '</ul>';
		}
		$menu .= '</li>';
	}
	}
	return $menu;
}

function phpbb_get_forums($parent_id){
	global $phpbbdb, $phpbbdb_prefix;
	$forums = $phpbbdb->get_results("SELECT forum_id, parent_id, forum_name, forum_type FROM " . $phpbbdb_prefix . "forums WHERE parent_id = '" . (int)$parent_id . "' ORDER BY forum_id ASC",ARRAY_A);
	foreach ($forums as $forum){
		$data_nodes[] = array(
			'forum_name'  => $forum['forum_name'],
			'children'    => phpbb_get_forums($forum['forum_id']),
			'href'        => phpbb_get_forum_url($forum['forum_id'])
		);
		if($forum['node_id']){
			phpbb_get_forums($forum['node_id']);
		}
	}
	return($data_nodes);
}

function phpbb_get_forum_url($forum_id) {
	$phpbb_forum_url = get_option('phpbb_forum_url');
	$phpbb_seo_enabled = get_option('phpbb_seo_enabled');
	$url = $phpbb_forum_url.'viewforum.php?f='.$forum_id;
	return $url;
}
?>