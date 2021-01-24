<?php

require get_template_directory() . '/inc/classes/class_wp_manifest_walker_comment.php';

require get_template_directory() . '/inc/classes/class_wp_manifest_walker_nav.php';

require get_template_directory() . '/inc/setup.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/block-pattern.php';

/**
 * Load TGMPA file
 */
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/tgmpa-config.php';

/**
 * Load Merlin files
 */
require_once get_template_directory() . '/inc/merlin/vendor/autoload.php';
require_once get_template_directory() . '/inc/merlin/class-merlin.php';
require_once get_template_directory() . '/inc/merlin-config.php';
