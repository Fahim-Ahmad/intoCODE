<div class="sidebar_container">

<div class="sidebar">
  <div class="sidebar_item">
    <h2>Blog posts by month</h2>
    <ul>
        <?php wp_get_archives('type=monthly'); ?>
    </ul>
  </div><!--close sidebar_item-->

  <div class="sidebar_item">
    <h2>Blog posts by week</h2>
    <ul>
        <?php wp_get_archives('type=weekly'); ?>
    </ul>
  </div><!--close sidebar_item-->

  <div class="sidebar_item">
    <h2>Blog posts by day</h2>
    <ul>
        <?php wp_get_archives('type=daily'); ?>
    </ul>
  </div><!--close sidebar_item-->

</div><!--close sidebar-->


</div><!--close sidebar_container-->

</div><!--close site_content--> <!-- opened in header / incude the images in all pages -->

