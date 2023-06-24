<?php get_header(); ?>
  
<div id="content">

                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : ?>
                                <?php the_post(); ?>
                                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <div class="content_item">
                                            <section class="blog-box">
                                                <p>
                                                    written by <b><?php the_author(); ?></b> on <?php the_time('j. F Y'); ?> at
                                                    <?php the_time('G:i'); ?> under <?php the_category(' | '); ?> categories.
                                                </p>
                                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanenter Link zu diesem 
                                                Artikel">
                                                    <?php the_title('<h2>', '</h2>', true); ?>
                                                </a>
                                                <div>
                                                    <?php comments_popup_link('No comments', '1 Comment', '% Comments', '', 
                                                    'Comments are turned off.'); ?> 
                                                    <?php edit_post_link('Edit',' | ',''); ?>
                                                </div>
                                                <?php the_content('<br /><span class="blog-btn blog-next">Read more...</span>'); ?>
                                                <div>
                                                   <?php comments_template(); ?> 
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <h2>Not found</h2>
                            <p>You are looking for something that can't be found.</p>
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

    
</div><!--close content-->

<?php get_template_part('sidebar-single'); ?> 
<?php get_footer(); ?>