<?php get_header(); ?>
  <div id="main"> <!-- in footer.php: ENDE main -->
    <div class="ym-column linearize-level-1"> <!-- in footer.php: ENDE ym-column linearize-level-1 -->
      <div class="ym-col1">
        <div class="ym-cbox"> <!-- bis hier identisch zur index.php -->         
		  
            <?php if (have_posts()) : ?>
            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php /* If this is a category archive */ if (is_category()) { ?>
            <h3><?php printf(__('Archiv für die Kategorie ‘%s’', ''), single_cat_title('', false)); ?></h3>
            <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
            <h3><?php printf(__('Alle Beiträge mit dem Tag ‘%s’', ''), single_tag_title('', false) ); ?></h3>
            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
            <h3><?php printf(__('Archiv für den %s', ''), get_the_time(__('j. F Y', ''))); ?></h3>
            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
            <h3><?php printf(__('Archiv für %s', ''), get_the_time(__('F Y', ''))); ?></h3>
            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
            <h3><?php printf(__('Archiv für das Jahr %s', ''), get_the_time(__('Y', ''))); ?></h3>
            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
            <h3><?php _e('Autor Archiv', ''); ?></h3>
            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h3><?php _e('Blog Archiv', ''); ?></h3>
            <?php } ?>
            <?php while (have_posts()) : the_post(); ?>
            <section class="box info"> <!-- YAML4-Klassen! -->
              <div id="post-<?php the_ID(); ?>">
                <h2>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanenter Link zu <?php the_title_attribute(); ?>">
                    <?php the_title(); ?>                                        
                  </a>                                        
                </h2>
                <p>
                  Geschrieben am
                  <?php the_time('j. F Y'); ?> <?php  _e('von',''); ?> <b><?php the_author_posts_link(); ?></b>
                  , abgelegt unter <?php the_category(' | '); ?><br />
                  <?php the_tags(); ?>
                </p>	
                <p><?php the_excerpt(); ?></p>
                <p>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('weiterlesen...',''); ?>
                    <?php the_title(); ?>">
                    <?php _e('<span>Weiterlesen</span>',''); ?>
                  </a>
                </p>
              </div>
            </section> <!-- YAML4-Klassen! -->  
              <?php endwhile; ?>              
              <?php else : ?>
                <h2>Nicht gefunden!</h2>
                <p>Sorry, aber du suchst gerade nach etwas, was hier nicht ist.</p>
              <?php endif; ?>
              <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
                <p> 
                    <?php
                        global $wp_query; 
                        $big = 999999999; // need an unlikely integer 
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $wp_query->max_num_pages
                        ) );
                    ?>   
                </p>
            <?php } ?> 
            
       </div> <!-- ENDE ym-cbox --> <!-- ab hier wieder identisch zur index.php -->
    </div> <!-- ENDE ym-col1 -->
<?php get_sidebar();?>    
<?php get_footer(); ?>