<!doctype html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
<?php
echo '<title>'.get_the_title().' | '.get_bloginfo('name').'</title>';
echo '<meta name="description" content="" />';
wp_head();
?>
</head>
<body <?php body_class(); ?>>
