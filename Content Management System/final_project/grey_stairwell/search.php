<?php get_header(); ?>


            <?php if (have_posts()) : ?>
                <p>
                    <br><br>
                    <span><?php echo $wp_query->found_posts; ?> hit for: </span><b><?php the_search_query(); ?></b>
                </p>
                <?php while (have_posts()) : the_post(); ?>
                    <section class="blog-box">
                    <?php
                        $titel = get_the_title();
                        $auszug = get_the_excerpt();
                        $autor = get_the_author ();
                        $suchwort = get_search_query();
                        $wert = explode(" ",$suchwort);
                        $titel = preg_replace('/('.implode('|', $wert) .')/iu','
                        <strong style="background-color: skyblue;">\0</strong>',$titel);
                        $auszug = preg_replace('/('.implode('|', $wert) .')/iu','
                        <strong style="background-color: skyblue;">\0</strong>', $auszug);
                        $autor = preg_replace('/('.implode('|', $wert) .')/iu','
                        <strong style="background-color: skyblue;">\0</strong>', $autor);
                    ?>
                    <h2>
                        <a href="<?php the_permalink() ?>"><?php echo $titel; ?></a>
                        <br><br>
                    </h2>
                    <div>
                        <?php echo $auszug; ?>
                        <br><br>
                        <div>Written by <b><?php echo $autor; ?></b> on <?php the_time('j. F Y'); ?> at <?php the_time('G:i'); ?> Uhr</div>
                    </div>
                    </section>
                <?php endwhile; ?>
                <?php else : ?>
                    <h2>
                        Unfortunately not found.
                    </h2>
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

            
</div> <!-- added this instead of the sidebar because (1) i don't want the sidebar here (2) a div in sidebar is closed that is opened in header -->

<?php get_footer(); ?>