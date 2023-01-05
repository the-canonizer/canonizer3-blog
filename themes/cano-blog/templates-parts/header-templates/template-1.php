<?php

if (!defined('ABSPATH')) exit;  // if direct access

$bug_blog_logo = get_theme_mod('bug_blog_logo');

$liveURL = 'https://canonizer.com/';

$siteURL = $_SERVER['HTTP_HOST'];

function get_domain($url)
{
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
    }
    return false;
}

function pritnURL($st, $lv)
{
    if (get_domain($st)) {
        $schem = parse_url($st);
        if ($schem) {
            return $schem['scheme'] . '://' . get_domain($st);
        } else {
            return $lv;
        }
    } else {
        return $lv;
    }
}

?>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-3 col-sm-3 mob-menu">
            <?php
            if (!empty($bug_blog_logo)) :
            ?>
                <div class="main-logo">
                    <a href="<?php print pritnURL($siteURL, $liveURL) ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" class="img-fluid" style="max-width:199px;" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    </a>
                </div><!-- /Logo -->
            <?php
            else :
            ?>
                <div class="main-logo">
                    <h1><a href="<?php print pritnURL($siteURL, $liveURL) ?>" target="_blank">><?php echo esc_attr(get_bloginfo('name')); ?></a></h1>
                </div><!-- /Logo -->
            <?php

            endif;
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="true">
                <span><img src="<?php echo get_template_directory_uri() ?>/assets/images/menu-2-line.png"></span>
            </button>
        </div>

        <div class="col-md-9 col-sm-9 header-1-navigation">
            <nav class="navbar navbar-expand-lg w-100">
                <div class="container-fluid pl-0-mob">

                    <div class="navbar-collapse Menus collapse" id="collapsibleNavbar" style="">
                        <?php

                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'menu_class' => 'navbar-nav'
                        ));
                        ?>
                        <!-- <ul class="navbar-nav ml-auto">
                           <li><a href="#" class="nav-link">Browse</a></li>
                           <li><a href="#" class="nav-link">Upload Files</a></li>
                           <li><a href="#" class="nav-link">Help</a></li>
                           <li><a href="#" class="nav-link">White Paper</a></li>
                           <li><a href="#" class="nav-link">Blog </a></li>
                           <li><a href="#" class="nav-link">Jobs </a></li>
                           <li><a href="#" class="nav-link">Services </a></li>
                        </ul> -->
                    </div>
                </div>
            </nav>
            <!--   <?php // echo get_search_form(); 
                    ?> -->
        </div>

        <!-- <div class="col-md-3">
                <div id="" class="navigation">
                    <?php // wp_nav_menu( array('container' => false, 'theme_location' => 'header-menu', 'menu_class' => 'menu float-right')); 
                    ?>
                </div>

                <div class="menu-mobile"></div>
            </div> -->

    </div>
</div>