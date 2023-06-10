<!-- ab hier: footer.php -->
</div> <!-- ENDE ym-column linearize-level-1 -->              
        </div> <!-- ENDE main -->      
        <footer>
            <?php wp_nav_menu( array('menu' => 'Footer Navigation Menu', 'theme_location' => 'Footer Navigation Menu' )); ?>
            <div id=""><a href="#top" title="Zum Seitenanfang springen">nach oben</a></div>
            <div id="">&copy; MeinTemplate <?php echo date("Y"); ?> &ndash; Layout based on <a href="http://www.yaml.de">YAML</a></div>
            <!--<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds -->
        </footer>        
    </div>  <!-- ENDE ym-wbox -->
</div> <!-- ENDE ym-wrapper -->
<!-- full skip link functionality in webkit browsers -->
<script src="<?php bloginfo('template_url'); ?>/yaml/core/js/yaml-focusfix.js"></script>
<?php wp_footer(); ?>
</body>
</html>