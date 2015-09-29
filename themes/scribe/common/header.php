<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php echo head_css(); ?>
    <!-- Le styles -->
    <?php
    queue_css_url('http://fonts.googleapis.com/css?family=Oxygen');
    queue_css_url('http://fonts.googleapis.com/css?family=Inconsolata');
    queue_css_file(array(
        'bootstrap',
        'font-awesome',
        'style',
	'scripto-transcribe'

    ));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    // jQuery is enabled by default in Omeka and in most themes.
    // queue_js_url('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    // queue_js_url('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
    queue_js_file(array(
        'bootstrap.min',
        'jquery.bxSlider.min',
    ));
    echo head_js();
    ?>
</head>

<?php
    echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass));
    require_once getcwd().'/plugins/Scripto/libraries/Scripto.php';
    $scripto = ScriptoPlugin::getScripto();
?>

    <div id="wrap" class="container">

        <header id="header" role="banner">

            <div id="sublinks" class="masthead clearfix">

                <ul class="nav nav-pills pull-right">

                    <?php if ($scripto->isLoggedIn()): ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white" ><?php echo $scripto->getUserName(); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo WEB_ROOT; ?>/scripto">Your Contributions</a></li>
                            <li><a href="<?php echo WEB_ROOT; ?>/scripto/watchlist">Your Watchlist</a></li>
                            <li><a href="<?php echo WEB_ROOT; ?>/scripto/recent-changes">Recent Changes</a></li>
                            <li><a href="<?php echo WEB_ROOT; ?>/scripto/logout">Logout</a></li>
                        </ul>
                    </li>

                    <?php else: ?>

                    <li>
                    <a href="<?php echo WEB_ROOT; ?>/scripto/login">Sign in or register</a>
                    </li>

                    <?php endif; ?>
                </ul>
		<div class="navbar-header">
                                <h2><a href="http://ds.haverford.edu/tichadocs_scribe/home/">Ticha</a></h2>
                                <h4>transcribing Colonial Zapotec</h4>

                        </div>

               <!-- <a href="<?php echo WEB_ROOT; ?>"><img src="<?php echo img('ticha.jpg'); ?>" alt="Scribe: an Omeka theme" title="Scribe: an Omeka theme" height="142px" width="377px" border="0" class="header-image" ></a>-->
            </div>
	    <div class="navbar-inverse">
	    </div>
	 </header><!-- end header -->
	 <nav id="test-nav">	
                <?php echo public_nav_main(); ?>
	    </nav>
	
        <article id="content">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
