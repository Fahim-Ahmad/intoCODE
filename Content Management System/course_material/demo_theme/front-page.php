<?php get_header(); ?>
<!-- ab hier: index.php -->
        <div id="main"> <!-- in footer.php: ENDE main -->
            <div class=""> <!-- in footer.php: ENDE ym-column linearize-level-1 -->                                       
               <?php if (have_posts()) : ?>
                  <?php while (have_posts()) : ?>
                     <?php the_post(); ?>
                        <?php the_title('<h2>', '</h2>', true); ?>
                        <?php the_content(); ?>
                  <?php endwhile; ?>
                  <?php else : ?>
                     <h2>Nichts gefunden</h2>
                     <p>Sorry, aber du suchst gerade nach etwas, was hier nicht ist.</p>
               <?php endif; ?>                        

<!-- bis hier: index.php -->
<?php get_footer(); ?>