<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

$page=$_POST['page'];
$count=$_POST['count'];
$cats=$_POST['cats'];


query_posts( array(
	"post_type" => "post",
	"paged" => ($page+1),
	"posts_per_page" => $count,
	"cat" => $cats
));

get_template_part('loop'); 

?>
