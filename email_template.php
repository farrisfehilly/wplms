<?php
/**
 * Template Name: Email Page
 */


get_header();

$vars = json_decode(stripslashes(urldecode($_GET['vars'])));

$template = get_option('wplms_email_template');
if(isset($vars->to) && $vars->subject){
	$args = get_object_vars($vars->args);
	$template = bp_course_process_mail($vars->to,$vars->subject,$vars->message,$args);
	echo $template;
}else{
	wp_redirect(home_url(),'302');	
}
get_footer();
?>
