<?php get_header(); ?>
<!-- ab hier: index.php -->
        <div id="main"> <!-- in footer.php: ENDE main -->
            <div class=""> <!-- in footer.php: ENDE ym-column linearize-level-1 -->                                       
            <?php if (have_posts()) : ?>
                <p>
                    <span><?php echo $wp_query->found_posts; ?> Treffer f&uuml;r: </span><b><?php the_search_query(); ?></b>
                </p>
                <?php while (have_posts()) : the_post(); ?>
                    <section class="info box">
                    <?php
                        $titel = get_the_title();
                        $auszug = get_the_excerpt();
                        $autor = get_the_author ();
                        $suchwort = get_search_query();
                        $wert = explode(" ",$suchwort);
                        $titel = preg_replace('/('.implode('|', $wert) .')/iu','
                        <strong style="background-color: #ffff00;">\0</strong>',$titel);
                        $auszug = preg_replace('/('.implode('|', $wert) .')/iu','
                        <strong style="background-color: #ffff00;">\0</strong>', $auszug);
                        $autor = preg_replace('/('.implode('|', $wert) .')/iu','
                        <strong style="background-color: #ffff00;">\0</strong>', $autor);
                    ?>
                    <h2>
                        <a href="<?php the_permalink() ?>"><?php echo $titel; ?></a>
                    </h2>
                    <div>
                        <?php echo $auszug; ?>
                        <div>Geschrieben von <b><?php echo $autor; ?></b> am <?php the_time('j. F Y'); ?> um <?php the_time('G:i'); ?> Uhr</div>
                    </div>
                    </section>
                <?php endwhile; ?>
                <?php else : ?>
                    <h2>
                        Leider nichts gefunden!
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
<!-- bis hier: index.php -->
<?php get_footer(); ?>