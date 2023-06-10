<!-- ab hier: sidebar.php -->
<div class="ym-col3">
    <div class="ym-cbox">                    
        <?php
            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
            <ul>   
                <li>Sidebar</li>
            </ul>	  
        <?php endif ?>
    </div>    
</div> <!-- ENDE Sidebar --> 
<!-- bis hier: sidebar.php -->