<?php
   add_action( 'init', 'register_menus' );
   function register_menus() {
     register_nav_menus(
        array (
         'menu-main' => __( 'Main Navigation Menu', 'demo_theme' ),
            'menu-footer' => __( 'Footer Navigation Menu', 'demo_theme' )
            )
       );
      }
  
 add_action( 'widgets_init', 'theme_slug_widgets_init' );
   function theme_slug_widgets_init() {
     register_sidebar( array(
        'name' => __( 'Main Sidebar', 'demo_theme' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'demo_theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
      ) );
   }

   function nav_breadcrumb() {
 
      $delimiter = '»';
      $home = 'Home'; 
      $before = '<span class="current-page">'; 
      $after = '</span>'; 
      
      if ( !is_home() && !is_front_page() || is_paged() ) {
      
      echo '<p class="breadcrumb">Sie sind hier: ';
      
      global $post;
      $homeLink = get_home_url();
      echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
      
      if ( is_category()) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . single_cat_title('', false) . $after;
      
      } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
      
      } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
      
      } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
      
      } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
      $post_type = get_post_type_object(get_post_type());
      $slug = $post_type->rewrite;
      echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
      } else {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $before . get_the_title() . $after;
      }
      
      } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after; 
     
      } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
      
      } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
      
      } elseif ( is_page() && $post->post_parent ) {
      $parent_id = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
      $page = get_page($parent_id);
      $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
      $parent_id = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
      
      } elseif ( is_search() ) {
      echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;
      
      } elseif ( is_tag() ) {
      echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;
     
      } elseif ( is_404() ) {
      echo $before . 'Fehler 404' . $after;
      }
      
      if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo ': ' . ('Seite') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
      }
      
      echo '</p>';
      
      } 
     }
?>