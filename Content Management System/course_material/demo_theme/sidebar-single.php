<div class="ym-col3">
   <div class="ym-cbox">
        <h2>Beiträge</h2>
        nach Monaten:
        <ul>
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
        nach Wochen:
        <ul>
            <?php wp_get_archives('type=weekly'); ?>
        </ul>
        nach Tagen:	   
        <ul>
            <?php wp_get_archives('type=daily'); ?>
        </ul>                      
   </div>
</div>
