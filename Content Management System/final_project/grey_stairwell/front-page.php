<?php get_header(); ?>

   
               <?php if (have_posts()) : ?>
                  <?php while (have_posts()) : ?>
                     <?php the_post(); ?>
                        <?php
                           /* the_title('<h2>', '</h2>', true); */
                           the_content();
                        ?>
                     <?php endwhile; ?>
                  <?php else : ?>
                     <h2>Not found</h2>
                     <p>You are looking for something that can't be found.</p>
               <?php endif; ?> 
   
</div> <!-- added this instead of the sidebar because (1) i don't want the sidebar here (2) a div in sidebar is closed that is opened in header -->
<?php get_footer(); ?>