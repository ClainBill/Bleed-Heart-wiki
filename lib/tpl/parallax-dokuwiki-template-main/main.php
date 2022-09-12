<?php
/**
 * DokuWiki Parallax Template
 * Based on the starter template and a wordpress theme of the same name
 *
 * @link     http://dokuwiki.org/template:parallax
 * @author   desbest <afaninthehouse@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
header('X-UA-Compatible: IE=edge,chrome=1');

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && !empty($_SERVER['REMOTE_USER']) );
$showSidebar = page_findnearest($conf['sidebar']) && ($ACT=='show');
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
  lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Arimo:400,700|Spinnaker">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Bitter">
</head>

<body id="dokuwiki__top" class="site <?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'hasSidebar' : ''; ?>">


<!-- ---------------- Menu --------------------- -->
<div class="container-full-width" id="navigation_menu">
    <div class="container">
        <div class="container-fluid">
            <?php tpl_includeFile('header.html') ?>
            <div class="row-fluid">
                <div id="logo_container" class="span3">
                    <?php //cyberchimps_header_logo(); ?>
                    <div id="logo">
                        <?php /* how to insert logo instead (if no CSS image replacement technique is used):
                        upload your logo into the data/media folder (root of the media manager) and replace 'logo.png' accordingly:
                        tpl_link(wl(),'<img src="'.ml('logo.png').'" alt="'.$conf['title'].'" />','id="dokuwiki__top" accesskey="h" title="[H]"') */ ?>
                    </div>
                    <div class="hgroup">
                        <h2 class="site-title"><?php tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]"') ?></h2>
                         <?php if ($conf['tagline']): ?>
                        <p class="claim"><?php echo $conf['tagline'] ?></p>
                        <?php endif ?>

                    </div>
                    <ul class="a11y skip">
                    <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content'] ?></a></li>
                    </ul>
                </div>
                <!-- span3 -->
                <div id="social_container" class="span2">
                    <?php //cyberchimps_header_social_icons(); ?>
                </div>
                <!-- span 2 -->
                <nav id="navigation" class="span7" role="navigation">
                    <div class="main-navigation navbar">
                        <div class="navbar-inner">
                            <div class="container">

                                <div class="nav-collapse collapse">
                                    
                                <div class="menu-my-first-menu-container"><ul id="menu-my-first-menu" class="nav">
                                <!-- SITE TOOLS -->
                                <h3 class="a11y"><?php echo $lang['site_tools'] ?></h3>
                                <?php tpl_toolsevent('sitetools', array(
                                    'recent'    => tpl_action('recent', 1, 'li', 1),
                                    'media'     => tpl_action('media', 1, 'li', 1),
                                    'index'     => tpl_action('index', 1, 'li', 1),
                                )); ?>
                                </ul></div>
                                    
                                </div>
                                <!-- collapse -->

                                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                                        </div>
                            <!-- container -->
                        </div>
                        <!-- .navbar-inner .row-fluid -->
                    </div>
                    <!-- main-navigation navbar -->
                </nav>
                <!-- #navigation -->
            </div>
        </div>
        <!-- .container-fluid-->
    </div>
    <!-- .container -->
</div>
<!-- #navigation_menu -->

<?php //do_action( 'cyberchimps_after_navigation' ); ?>

<div id="cc_spacer"></div><!-- used to clear fixed navigation by the themes js -->
<!-- begin content area single.php -->
    <div id="single_page" class="container-full-width">

        <div class="container">

            <div class="container-fluid">

                <?php //do_action( 'cyberchimps_before_container' ); ?>

                <div id="container" class="row-fluid" <?php //cyberchimps_filter_container_class(); ?>>

                    <?php //do_action( 'cyberchimps_before_content_container' ); ?>

                    <div id="content" class=" span9 content-sidebar-right"<?php //cyberchimps_filter_content_class(); ?>>

                        <?php //do_action( 'cyberchimps_before_content' ); ?>

                            <?php //get_template_part( 'content', 'single' ); ?>


                            <article class="post">

                            <header class="entry-header">

                            <?php //cyberchimps_post_format_icon(); ?>

                            <!-- <h1 class="entry-title">Test post</h1> -->

                            <?php

                            // get the page title toggle option
                            // $page_title = get_post_meta( get_the_ID(), 'cyberchimps_page_title_toggle', true );


                            ?>

                            <!-- BREADCRUMBS -->
                            <?php if($conf['breadcrumbs']){ ?>
                                <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
                            <?php } ?>
                            <?php if($conf['youarehere']){ ?>
                                <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
                            <?php } ?>

                            <!-- <a href="" title="Permalink to %s" rel="bookmark">stuff here</a> -->
                            <?php
                            //( get_the_title() ) ? the_title() : the_permalink();

                            // get the post title toggle option
                            // $post_title = cyberchimps_get_option( 'single_post_title' );
                            // ( get_the_title() ) ? the_title() : the_permalink(); 
                            ?>

                            <div class="entry-meta">
                            <?php //cyberchimps_posted_on(); ?>
                            <?php //cyberchimps_posted_by(); ?>
                            </div><!-- .entry-meta -->
                            </header>
                            <!-- .entry-header -->

                            <?php //if( is_single() ) : // Only display Excerpts for Search ?>

                            <div class="entry-content">
                                 <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
                            <?php //the_content(); ?>
                            <!-- ********** CONTENT ********** -->
                            <div id="dokuwiki__content">
                                <?php tpl_flush() /* flush the output buffer */ ?>
                                <?php tpl_includeFile('pageheader.html') ?>

                                <div class="page">
                                    <!-- wikipage start -->
                                    <?php tpl_content() /* the main content */ ?>
                                    <!-- wikipage stop -->
                                    <div class="clearer"></div>
                                </div>

                                <?php tpl_flush() ?>
                                <?php tpl_includeFile('pagefooter.html') ?>
                            <?php //cyberchimps_featured_image(); ?>
                            <?php //the_content( __( 'Continue reading', 'parallax' ) . '<span class="meta-nav">&rarr;</span>' ); ?>
                            <?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'parallax' ), 'after' => '</div>' ) ); ?>
                            </div><!-- .entry-content -->

                            <?php //elseif( is_search() ): ?>

                            <div class="entry-summary">
                            <?php //cyberchimps_featured_image(); ?>
                           
                            </div><!-- /content -->
                            </div><!-- .entry-summary -->

                

                            <footer class="entry-meta">
                            <?php //if( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

                            <?php //cyberchimps_posted_in() ?>

                            <?php //cyberchimps_post_tags(); ?>

                            <?php //endif; // End if 'post' == get_post_type() ?>

                            <?php //cyberchimps_post_comments() ?>

                            <?php //edit_post_link( __( 'Edit', 'parallax' ), '<span class="edit-link">', '</span>' ); ?>

                            </footer>
                            <!-- #entry-meta -->

                            </article><!-- #post ?> -->


                            <!-- <div class="more-content">
                                <div class="row-fluid">
                                    <div class="span6 previous-post">
                                        <?php //previous_post_link(); ?>
                                    </div>
                                    <div class="span6 next-post">
                                        <?php //    next_post_link(); ?>
                                    </div>
                                </div>
                            </div> -->

                            <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            ?>

                        <?php //do_action( 'cyberchimps_after_content' ); ?>

                    </div>
                    <!-- #content -->

                    <div id="secondary" class="widget-area span3">

    
                    <div id="sidebar">
                        <aside id="searchhere" class="widget-container">
                        <!-- <h3 class="widget-title">Search</h3> -->
                        <?php tpl_searchform() ?>
                        </aside>

                        <aside id="writtensidebar" class="widget-container">
                            <!-- ********** ASIDE ********** -->
                            <?php if ($showSidebar): ?>
                                <?php tpl_includeFile('sidebarheader.html') ?>
                                <?php tpl_include_page($conf['sidebar'], 1, 1) /* includes the nearest sidebar page */ ?>
                                <?php tpl_includeFile('sidebarfooter.html') ?>
                                <div class="clearer"></div>
                            <?php endif; ?>
                        </aside>

                        <aside id="pagetools" class="widget-container"><h3 class="widget-title">Page Tools</h3>      <ul>
                        <!-- PAGE ACTIONS -->
                        <?php if ($showTools): ?>
                            <h3 class="a11y"><?php echo $lang['page_tools'] ?></h3>
                            <?php tpl_toolsevent('pagetools', array(
                                'edit'      => tpl_action('edit', 1, 'li', 1),
                                'discussion'=> _tpl_action('discussion', 1, 'li', 1),
                                'revisions' => tpl_action('revisions', 1, 'li', 1),
                                'backlink'  => tpl_action('backlink', 1, 'li', 1),
                                'subscribe' => tpl_action('subscribe', 1, 'li', 1),
                                'revert'    => tpl_action('revert', 1, 'li', 1),
                                'top'       => tpl_action('top', 1, 'li', 1),
                            )); ?>
                        <?php endif; ?>
                        </ul>
                        </aside>        

                        <aside id="usertools" class="widget-container">      <h3 class="widget-title">User Tools</h3>      <ul>
                        <!-- USER TOOLS -->
                <?php if ($conf['useacl'] && $showTools): ?>
                        <h3 class="a11y"><?php echo $lang['user_tools'] ?></h3>
                            <?php
                                if (!empty($_SERVER['REMOTE_USER'])) {
                                    echo '<li class="user">';
                                    tpl_userinfo(); /* 'Logged in as ...' */
                                    echo '</li>';
                                }
                            ?>
                            <?php /* the optional second parameter of tpl_action() switches between a link and a button,
                                     e.g. a button inside a <li> would be: tpl_action('edit', 0, 'li') */
                            ?>
                            <?php tpl_toolsevent('usertools', array(
                                'admin'     => tpl_action('admin', 1, 'li', 1),
                                'userpage'  => _tpl_action('userpage', 1, 'li', 1),
                                'profile'   => tpl_action('profile', 1, 'li', 1),
                                'register'  => tpl_action('register', 1, 'li', 1),
                                'login'     => tpl_action('login', 1, 'li', 1),
                            )); ?>
                        <?php endif ?>
                        
                        </ul>
                        </aside>    
                    </div>
                    <!-- #sidebar -->


                    </div>

                    <?php //do_action( 'cyberchimps_after_content_container' ); ?>

                </div>
                <!-- #container .row-fluid-->

                <?php //do_action( 'cyberchimps_after_container' ); ?>

            </div>
            <!--container fluid -->

        </div>
        <!-- container -->

    </div><!-- container full width -->

    <!-- footer.php -->

    <div class="container-full-width" id="after_footer">
        <div class="container">
        <div class="container-fluid">
        
            <footer class="site-footer row-fluid">
            <div class="span6">
            <div id="credit">
            <div class="doc"><?php tpl_pageinfo() /* 'Last modified' etc */ ?></div>
            <?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
            
            <h4 class="cc-credit-text">Parallax theme by <a href="http://cyberchimps.com/" target="_blank" title="CyberChimps Themes">Cyberchimps</a> and <a href="http://desbest.com" target="_blank">desbest</a></h4>

 <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>

            </div>
            </div>
            <!-- Adds the afterfooter copyright area -->
            <div class="span6">
            <div id="copyright">
            <!-- © --> <?php echo $conf['title']; ?>                      </div>
            </div>
            </footer>
            <?php tpl_includeFile('footer.html') ?>
        <!-- row-fluid -->
        </div>
        <!-- .container-fluid-->
        </div>
        <!-- .container -->
    </div>

    <?php //do_action( 'cyberchimps_after_footer_widgets' ); ?>

<?php //} ?>
<?php //do_action( 'cyberchimps_before_footer_container' ); ?>
<?php //do_action( 'cyberchimps_footer' ); ?>
<?php //do_action( 'cyberchimps_after_footer_container' ); ?>

</div><!-- #wrapper .container-fluid -->

<?php //do_action( 'cyberchimps_after_wrapper' ); ?>

</div><!-- container -->

   

    <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
    <?php /* tpl_classes() provides useful CSS classes; if you choose not to use it, the 'dokuwiki' class at least
             should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>

   <script defer type="text/javascript" src="<?php echo tpl_basedir();?>/core.js"></script>
   <script defer type="text/javascript" src="<?php echo tpl_basedir();?>/lib/bootstrap/js/bootstrap.js"></script>
    <!-- due to the way dokuwiki buffers output, this javascript has to
            be before the </body> tag and not in the <head> -->
</body>
</html>
