
<div id="horizontalTab">
<ul class="resp-tabs-list">


  <?php
    $args = array(
          'orderby' => 'name',
          'capability_type' => 'neighborhood',
          'taxonomy'=>'neighborhood_cat',
          'hide_empty'               => 0,
          'order' => 'ASC'
      );
      $categories = get_categories($args);
      $k=0;
      foreach($categories as $category) {
        $k=$k+1;
        $selected="";
        $tabname = $category->name;
        $tabname = str_replace('', '_', $tabname);
        $tabname = str_replace('/', '_', $tabname);
        $tabname = strtolower($tabname);
        if($k ==1 ){
            $selected='class="active"';
      }
      echo '<li class="tab-nav-'.$k.'" >' . $category->name.'</li> ';
    }
    ?>
  </ul>
<!--/.resp-tabs-list-->
<div class="resp-tabs-container">




<?php
    $args = array(
          'orderby' => 'name',
          'capability_type' => 'neighborhood',
          'taxonomy'=>'neighborhood_cat',
          'hide_empty'               => 0,
          'order' => 'ASC'
      );
      $categories = get_categories($args);
      $k=0;
      foreach($categories as $category) {
        $k=$k+1;
        $selected="";
        $tabname = $category->name;
        $tabname = str_replace('', '_', $tabname);
        $tabname = str_replace('/', '_', $tabname);
        $tabname = strtolower($tabname);
        if($k ==1 ){
            $selected=' in active';
      }
      ?>


<div class="tab-ct-<?php echo $k;?>">
<div class="tab-row">
	

	
	
<?php 

query_posts(array('post_type' => 'neighborhood','post_status' => 'publish',
  'tax_query' => array(
          array(
            'taxonomy' => 'neighborhood_cat',
            'field' => 'id',
            'terms' => $category->term_id
          )
        ),
  'orderby' => 'date', 'order' => 'DESC' , 'posts_per_page' => -1));
   $return_string ='';
   if (have_posts()) :
      while (have_posts()) : the_post();
         //$return_string = '<a href="'.get_permalink().'">'.get_the_title().'</a>';
        $content = apply_filters( 'the_content', get_the_content() );
         $return_string = $return_string.'<div class="tab-grid" href="#"><a target="_blank" href="'.get_field('location_link').'">';
         $return_string = $return_string.'<h4>'.get_the_title().'</h4>'.$content.'
                </a></div>';
      endwhile;
   endif;
   wp_reset_query();
   
   echo  $return_string;


?>


</div>
</div>
<!--/.tab-ct-01-->

<?php }?>






</div>
<!--/.resp-tabs-container-->
</div>
<!--/#horizontalTab-->





<script>
jQuery(document).ready(function () {
jQuery('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
});
});
</script>
