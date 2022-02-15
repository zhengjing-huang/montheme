<?php
opcache_reset();
require_once('options/apparence.php');
require_once('wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php');
require_once("utils/pagination.php");
require_once("utils/after_setup_theme.php");
require_once("utils/wp_enqueue_scripts.php");
require_once('utils/init.php');
require_once('utils/add_filter.php');
require_once('utils/custom_logo_setup.php');
require_once('metaboxes/sponso.php');

SponsoMetaBox::register();
?>