<?php
/**
 * DokuWiki mywiki Template
 * Based on the starter template and a wordpress theme of the same name
 *
 * @link     http://dokuwiki.org/template:mywiki
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
    <link rel='stylesheet' id='google-fonts-open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans&#038;ver=5.4.4' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-lato-css'  href='//fonts.googleapis.com/css?family=Lato&#038;ver=5.4.4' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-cabin-css'  href='//fonts.googleapis.com/css?family=Cabin&#038;ver=5.4.4' type='text/css' media='all' />

</head>

<body>

    <div id="wrap" class="site <?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'hasSidebar' : ''; ?>">
<?php tpl_includeFile('header.html') ?>
<header role="banner">
  <div id="inner-header" class="clearfix">
    <div class="navbar navbar-default top-bg">
      <div class="container" id="navbarcont">
        <div class="row">

                <ul class="a11y skip">
                    <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content'] ?></a></li>
                </ul>

        <div class="nav-container col-md-9">
          <nav role="navigation">
            <div class="navbar-header navbar-brand logo">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
               <?php /* how to insert logo instead (if no CSS image replacement technique is used):
                        upload your logo into the data/media folder (root of the media manager) and replace 'logo.png' accordingly:
                        tpl_link(wl(),'<img src="'.ml('logo.png').'" alt="'.$conf['title'].'" />','id="dokuwiki__top" accesskey="h" title="[H]"') */ ?>
                 <p><span class="header-text logo"><?php tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]"') ?></span></p>
                <h4>
                    <?php if ($conf['tagline']): ?>
                    <span class="header-description-text"><?php echo $conf['tagline'] ?></span>
                    <?php endif ?>
              </a>
            </div>
            <!-- end .navbar-header -->
          </nav>
        </div>
        <div class="navbar-collapse collapse top-menu">

        <div class="menu-my-first-menu-container"><ul id="menu" class="nav navbar-nav navbar-right mywiki-header-menu">
        <h3 class="a11y"><?php echo $lang['site_tools'] ?></h3>        
        <?php tpl_toolsevent('sitetools', array(
            'recent'    => tpl_action('recent', 1, 'li', 1),
            'media'     => tpl_action('media', 1, 'li', 1),
            'index'     => tpl_action('index', 1, 'li', 1),
        )); ?>
        </ul></div>        
          <?php
            $mywiki_defaults = array(
                    'theme_location'  => 'primary',
                    'container'       => 'div',                 
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',                    
                    'items_wrap'      => '<ul id="menu" class="nav navbar-nav navbar-right mywiki-header-menu">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                    );
            //wp_nav_menu( $mywiki_defaults ); ?>
        </div>
        <!-- end .nav-container -->
        </div>  
      </div>
      <!-- end #navcont -->
    </div>
    <!-- end .navbar --> 
  </div>
  <!-- end #inner-header --> 
</header>
<!-- end header -->
<div class="searchwrap ">
  <div class="container" id="search-main">
    <div class="row">
        <div class="input-group"><?php tpl_searchform() ?></div>


      <!-- <form class="asholder search-main col-md-12 col-sm-12 col-xs-12" role="search" method="get" id="searchformtop" action="/">        
          <div class="input-group" id="suggest">
            <input name="s" id="s" type="text" onKeyUp="suggest(this.value);" onBlur="fill();" class="search-query form-control pull-right" autocomplete="off" placeholder="Have a Question? Write here and press enter" data-provide="typeahead" data-items="4" data-source=''>
            <div class="suggestionsbox" id="suggestions" style="display: none;"> <img src="/img/arrow1.png'; ?>" height="18" width="27" class="upArrow" alt="upArrow" />
              <div class="suggestionlist" id="suggestionslist"></div>
            </div>        
        </div>
      </form> -->
    </div>
  </div>
</div>
<div class="container " id="maincnot">

    <!-- begin content -->
<div id="content" class="row">
  <div id="main" class="col-sm-8 clearfix" role="main">
    <div id="home-main" class="home-main home mywiki-post">
      <article class="clearfix" role="article" itemscope>
        <header>
           <!--  <header>
              <div class="page-catheader cat-catheader">
                <h4 class="cat-title">
                  <?php //the_title(); ?>
                </h4>
              </div>
            </header>  -->           
            <article class="clearfix" role="article">
              <header>
              <div class="single-page">
                <div class="meta nopadding">
                 

                <!-- BREADCRUMBS -->
                <?php if($conf['breadcrumbs']){ ?>
                    <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
                <?php } ?>
                <?php if($conf['youarehere']){ ?>
                    <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
                <?php } ?>        
                   &nbsp;<span class="sprite amp cat-icon-small"><i class="fa fa-folder-open"></i>
                  <?php //the_category(', '); ?>                  
                  </span> 
                </div>
               </div> 
              </header>
              <!-- end article header -->
              <section class="post_content">
                <?php html_msgarea() /* occasional error and info messages on top of the page */ ?>
                <?php //the_content(); ?>
                 <!-- ********** CONTENT ********** -->
                    <?php tpl_flush() /* flush the output buffer */ ?>
                    <?php tpl_includeFile('pageheader.html') ?>

                    <div id="dokuwiki__content" class="page">
                        <!-- wikipage start -->
                        <?php tpl_content() /* the main content */ ?>
                        <!-- wikipage stop -->
                        <div class="clearer"></div>
                    </div>

                    <?php tpl_flush() ?>
                    <?php tpl_includeFile('pagefooter.html') ?>

                <figure class="single_cat_image"> <img src="" /> </figure>
                <?php //wp_link_pages(); ?>
              </section>
              <!-- end article section -->
            </article>
        </header>
      </article>
      <!-- end article -->
      <nav class="mywiki-nav">
          <span class="mywiki-nav-previous"><?php //previous_post_link( '%link', '<span>'.'<< </span> %title' ); ?></span>
          <span class="mywiki-nav-next"><?php //next_post_link( '%link', '%title <span>'.'>> </span>' ); ?></span>
          </nav>
    </div>
    <?php //comments_template( '', true ); ?>
  </div>
  <!-- end #main -->
  <?php //get_sidebar(); // sidebar 1 ?>
    <div id="sidebar1" class="fluid-sidebar sidebar col-sm-4 border-left margin-bottom" role="complementary">

        <!-- <div id="search-10" class="widget">
            <form role="search" method="get" class="search-form" action="http://localhost/wordpress/">
            <span class="screen-reader-text">Search</span>
            <input type="search" class="search-field" placeholder="Search" value="" name="s">
            <button type="submit" class="search-submit fa fa-search"><span class="screen-reader-text"></span></button>
            </form>
        </div> -->

        <div id="writtensidebar" class="widget">

         <!-- ********** ASIDE ********** -->
          <?php if ($showSidebar): ?>
          <?php tpl_includeFile('sidebarheader.html') ?>
          <?php tpl_include_page($conf['sidebar'], 1, 1) /* includes the nearest sidebar page */ ?>
          <?php tpl_includeFile('sidebarfooter.html') ?>
          <div class="clearer"></div>
          <?php endif; ?>
        </div>

        <div id="pagetools" class="widget">
        <h4 class="sidebar-heading"><span>Page Tools</span></h4>     <ul>
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
        </ul></div>

        <div id="usertools" class="widget">      
        <h4 class="sidebar-heading"><span>User Tools</span></h4>      <ul>
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
        </div>  <!-- This content shows up if there are no widgets defined in the backend. -->
    </div>
</div>
<!-- end #content -->
    <!-- end content -->
    <!-- begin footer -->

</div>
<hr /><footer role="contentinfo" id="footer">  
  <div id="inner-footer" class="clearfix container padding-top-bottom">
    <?php //$mywiki_options = get_option( 'faster_theme_options' ); ?>
    <div id="widget-footer" class="clearfix row">
        <div class="col-md-4">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
          <?php endif; ?>
         </div>
         <div class="col-md-4">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
        <?php endif; ?>
        </div>
        <div class="col-md-4">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
        <?php endif; ?>
        </div>
    </div>
        <nav class="footer-menu-nav">
        <ul class="footer-nav nav navbar-nav">
            <?php 

                $footer_social_icon_default = array(
                  array('url'=>$mywiki_options['fburl'],'icon'=>'fa-facebook'),
                  array('url'=>$mywiki_options['twitter'],'icon'=>'fa-twitter'),
                  array('url'=>$mywiki_options['googleplus'],'icon'=>'fa-google-plus'),
                  array('url'=>$mywiki_options['linkedin'],'icon'=>'fa-linkedin'),
                );?>
          <?php for($i=1; $i<=4; $i++) : ?>
                 <li><a href="/" class="socia_icon" title="" target="_blank">
                      <i class="fa footer_social_icon"></i>
                  </a></li>
        <?php endfor; ?>
      </ul>
    </nav>
    <p class="attribution">
        Powered by Dokuwiki. MyWiki theme by <a href="http://fasterthemes.com/wordpress-themes/mywiki">Faster Themes</a> and <a href="http://desbest.com">desbest</a>.
    </p>
    <p class="doc"><?php tpl_pageinfo() /* 'Last modified' etc */ ?></p>
    <?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>

</footer>
<?php tpl_includeFile('footer.html') ?>
    
  </div>
  <!-- end #inner-footer -->
<!-- end footer -->
<!-- end #maincont .container --> 
    <?php /* with these Conditional Comments you can better address IE issues in CSS files,
             precede CSS rules by #IE8 for IE8 (div closes at the bottom) */ ?>
    <!--[if lte IE 8 ]><div id="IE8"><![endif]-->

    <?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
    <?php /* tpl_classes() provides useful CSS classes; if you choose not to use it, the 'dokuwiki' class at least
             should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
    
        <!-- </div></div> --><!-- /header -->


     <script defer type="text/javascript" src="<?php echo tpl_basedir();?>/bootstrap.js"></script>
    <!-- due to the way dokuwiki buffers output, this javascript has to
            be before the </body> tag and not in the <head> -->
</body>
</html>
