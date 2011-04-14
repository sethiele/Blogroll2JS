<?php

    /*
    Plugin Name: Blogroll Javascript Link on subpages
    Plugin URI: http://sebastian.thiele.me
    Description: Changed the normal Blogroll Link to a JS Link on subpages
    Version: 1.0
    Author: Sebastian Thiele
    Author URI: http://sebastian.thiele.me
    */
    
    /*
    
    */    

    
    /*
    function blogroll_js($content) {
        foreach ($content as $link) {
            print '<!-- Blogroll';
            print_r($link);
            print '-->';
        }
        
        return $content;
    }

    add_filter ('get_bookmarks', 'blogroll_js');
    */
    
    function widget_blogroll_js($args) {
    ?>
        <li class="widget widget_links">
            <h3>Blogroll</h3>
            <ul class="xoxo blogroll">
                <?php $bookmarks = get_bookmarks( array(
                    'orderby'        => 'name',
                    'order'          => 'ASC',
                ));
                foreach ( $bookmarks as $bm ) { 
                    if (is_home()) printf( '<li><a class="relatedlink" href="%s" target="_blank" rel="%s">%s</a></li>', $bm->link_url, $bm->link_rel, __($bm->link_name) );
                    else printf( '<li><span class="relatedlink jsklick" onclick="window.open(\'%s\')">%s</span></li>', $bm->link_url, __($bm->link_name) );
                }
                
                ?>
            </ul>
        </li>
    <?php
    }
    
    function blogroll_js_init()
    {
      register_sidebar_widget(__('JS Subpage Blogroll'), 'widget_blogroll_js');
    }
    add_action("plugins_loaded", "blogroll_js_init");
    
?>