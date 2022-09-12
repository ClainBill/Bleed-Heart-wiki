<?php
/**
 * DokuWiki Able Template
 * Based on the starter template and a wordpress theme of the same name
 *
 * @link     http://dokuwiki.org/template:able
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
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='stylesheet' id='droid-serif-css'  href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700%2C400italic%2C700italic&#038;ver=5.4.4' type='text/css' media='all' />
</head>

<body class="right-sidebar">

<div id="page" id="dokuwiki__top" class="hfeed site <?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'hasSidebar' : ''; ?>">
    <div id="site-introduction">
        <h1 class="site-title"><?php tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]"') ?></h1>
       
        <h2 class="site-description"> <?php if ($conf['tagline']): ?>
            <?php echo $conf['tagline'] ?>
        <?php endif ?></h2>
          <ul class="a11y skip">
                    <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content'] ?></a></li>
                </ul>
    </div><!-- #site-title -->
    <div id="page-liner">
        <?php tpl_includeFile('header.html') ?>
        <header id="masthead" class="site-header" role="banner">
            <div id="headimg">
                
                    <?php /* how to insert logo instead (if no CSS image replacement technique is used):
                     upload your logo into the data/media folder (root of the media manager) and replace 'logo.png' accordingly:
                    tpl_link(wl(),'<img src="'.ml('logo.png').'" alt="'.$conf['title'].'" />','id="dokuwiki__top" accesskey="h" title="[H]"') */ ?>
                
            </div><!-- #headimg -->
             <!-- // if ( ! empty( $header_image ) ) -->

            <nav role="navigation" class="site-navigation main-navigation">
                <h1 class="assistive-text">Menu</h1>
                <div class="assistive-text skip-link"><a href="#content" title="Skip to content">Skip to content</a></div>

                <div class="menu-my-first-menu-container"><ul id="menu-my-first-menu" class="menu">
                <!-- SITE TOOLS -->
                    <h3 class="a11y"><?php echo $lang['site_tools'] ?></h3>
                    

                        <?php tpl_toolsevent('sitetools', array(
                            'recent'    => tpl_action('recent', 1, 'li', 1),
                            'media'     => tpl_action('media', 1, 'li', 1),
                            'index'     => tpl_action('index', 1, 'li', 1),
                        )); ?>
              
                </ul></div>

                <?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav><!-- .site-navigation .main-navigation -->
        </header><!-- #masthead .site-header -->

        <div id="main">

            <div id="primary" class="site-content">
        <div id="content" role="main">

        
                
                        
                
<article id="post-9" class="post type-post">
    <header class="entry-header">
        <!-- <h1 class="entry-title"><a href="http://localhost/wordpress/test-post/" rel="bookmark">Test post</a></h1> -->

                <!-- <div class="entry-meta"> -->
                 <!-- Posted on <a href="http://localhost/wordpress/test-post/" title="7:11 pm" rel="bookmark"><time class="entry-date" datetime="2020-02-04T19:11:31+00:00" pubdate="">February 4, 2020</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="http://localhost/wordpress/author/desbest/" title="View all posts by desbest" rel="author">desbest</a></span></span>     </div> -->
                <!-- .entry-meta -->
            </header><!-- .entry-header -->

        <div class="entry-content">
             <!-- BREADCRUMBS -->
            <?php if($conf['breadcrumbs']){ ?>
                <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
            <?php } ?>
            <?php if($conf['youarehere']){ ?>
                <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
            <?php } ?>
         <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
        <!-- ********** CONTENT ********** -->
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
            </div><!-- .entry-content -->
    
  
</article><!-- #post-## -->
            
                
        
        </div><!-- #content -->
    </div>

    <div id="tertiary" class="widget-area" role="complementary">

        <aside class="widget"><?php tpl_searchform() ?></aside>


        <aside id="categories-11" class="widget widget_categories"><h1 class="widget-title">Page Tools</h1><ul>
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

            <?php if ($conf['useacl'] && $showTools): ?>
            <aside class="widget">       
            <h1 class="widget-title">User Tools</h1>
                    <ul>
                        <?php
                                if (!empty($_SERVER['REMOTE_USER'])) {
                                    echo '<li class="user">';
                                    tpl_userinfo(); /* 'Logged in as ...' */
                                    echo '</li>';
                                }
                            ?>
                    <?php tpl_toolsevent('usertools', array(
                            'admin'     => tpl_action('admin', 1, 'li', 1),
                            'userpage'  => _tpl_action('userpage', 1, 'li', 1),
                            'profile'   => tpl_action('profile', 1, 'li', 1),
                            'register'  => tpl_action('register', 1, 'li', 1),
                            'login'     => tpl_action('login', 1, 'li', 1),
                        )); ?>
                    </ul>
            </aside>

             <!-- ********** ASIDE ********** -->
            <?php if ($showSidebar): ?>
                <aside id="writtensidebar" class="widget">       
                    <?php tpl_includeFile('sidebarheader.html') ?>
                    <?php tpl_include_page($conf['sidebar'], 1, 1) /* includes the nearest sidebar page */ ?>
                    <?php tpl_includeFile('sidebarfooter.html') ?>
                    <div class="clearer"></div>
                </aside>
            <?php endif; ?>
            <?php endif; ?>

            </div><!-- #main -->

        <footer id="colophon" class="site-footer" role="contentinfo">
                <nav role="navigation" class="site-navigation footer-navigation">
                    <h1 class="assistive-text">
                        Menu
                    </h1>

                    <?php //wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => 1 ) ); ?>
                </nav><!-- .site-navigation -->

            <div class="site-info">
                <div class="doc"><?php tpl_pageinfo() /* 'Last modified' etc */ ?></div>
                <?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
                <a href="http://dokuwiki.org/" title="A Semantic Personal Publishing Platform" rel="generator">Powered by Dokuwiki</a>
                <span class="sep"> | </span>
                Able theme by <a href="http://automattic.com/" rel="designer">Automattic</a> and converted by <a href="http://desbest.com">desbest</a>
            </div><!-- .site-info -->
        </footer><!-- #colophon .site-footer -->
         <?php tpl_includeFile('footer.html') ?>
    </div><!-- #page-liner -->
</div><!-- #page .hfeed .site -->

    <?php /* with these Conditional Comments you can better address IE issues in CSS files,
             precede CSS rules by #IE8 for IE8 (div closes at the bottom) */ ?>
    <!--[if lte IE 8 ]><div id="IE8"><![endif]-->

    <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
    <?php /* tpl_classes() provides useful CSS classes; if you choose not to use it, the 'dokuwiki' class at least
             should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
       
      


         


    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <!--[if lte IE 8 ]></div><![endif]-->
     <script defer type="text/javascript" src="<?php echo tpl_basedir();?>/small-menu.js"></script>
    <!-- due to the way dokuwiki buffers output, this javascript has to
            be before the </body> tag and not in the <head> -->
</body>
</html>
