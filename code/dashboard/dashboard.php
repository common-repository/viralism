<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="row">
  <div class="col-md-12">
    <div class="top-heading">      
      <h2><?php _e('Dashboard');?></h2>
    </div>    
    <div class="nopad-lr dashboard-boxes">
      <div class="col-md-3 nopad-lr stats-boxes ">
        <div class="col-xs-12 inner-box text" style="padding:0px;">
          <div class="col-md-12 box-content">    
            <div class="col-md-3 col-sm-3 col-xs-3 icon"><i class="fa fa-file-text-o"></i></div>                   
            <div class="col-md-9 col-sm-9 col-xs-9 right"><span class="txtblue col"><?php _e($content_campaign);?></span>
            <h2 class="bgblue col"><?php _e('Your Image Campaigns');?></h2>
            </div>
          </div>          
        </div>
        <div class="col-xs-12 inner-box text" style="padding:0px;">
          <div class="col-md-12 box-content">  
            <div class="col-md-3 col-sm-3 col-xs-3 icon"><i class="fa fa-file-text-o"></i></div>         
            <div class="col-md-9 col-sm-9 col-xs-9 right"><span class="txtgreen col"><?php _e($content_campaign7);?></span>
            <h2 class="bggreen col"><?php _e('7 Days Image Campaigns');?></h2></div>
          </div>         
        </div>
        <div class=" col-xs-12 inner-box text" style="padding:0px;">
          <div class="col-md-12 box-content"> 
            <div class="col-md-3 col-sm-3 col-xs-3 icon"><i class="fa fa-file-text-o"></i></div>   
            <div class="col-md-9 col-sm-9 col-xs-9 right">   
            <span class="txtgreen col-for"><?php _e($content_campaign30);?></span>
            <h2 class="bggreen col-for"><?php _e('30 Days Image Campaigns');?></h2>
            </div>
          </div>          
        </div>
      </div>
      <div class="col-md-3 nopad-lr stats-boxes">
        <div class="col-xs-12 inner-box file" style="padding:0px;">
          <div class="col-md-12 box-content">    
          <div class="col-md-3 col-sm-3 col-xs-3 icon"><i class="fa fa-file-video-o"></i></div>                    
            <div class="col-md-9 col-sm-9 col-xs-9 right"><span class="txtoranges col"><?php _e($video_campaign); ?></span>
            <h2 class="bgorange col-2"> <?php _e('Your Video Campaigns');?></h2>
          </div>
          </div>
        </div>
        <div class="col-xs-12 inner-box file" style="padding:0px;">
          <div class="col-md-12 box-content">   
            <div class="col-md-3 col-sm-3 col-xs-3 icon"><i class="fa fa-file-video-o"></i></div>  
            <div class="col-md-9 col-sm-9 col-xs-9 right">           
            <span class="txtoranges col-for"><?php _e($video_campaign7); ?></span>
            <h2 class="bgred col-two"><?php _e('7 Days Video Campaigns');?></h2>
            </div>
          </div>          
        </div>                
        <div class="col-xs-12 inner-box file" style="padding:0px;">
          <div class="col-md-12 box-content">     
            <div class="col-md-3 col-sm-3 col-xs-3 icon"><i class="fa fa-file-video-o"></i></div>  
             <div class="col-md-9 col-sm-9 col-xs-9 right">          
            <span class="txtoranges col-for-two"><?php _e($video_campaign30); ?></span>
            <h2 class="bgred col-three"><?php _e('30 Days Video Campaigns');?></h2>
          </div>
          </div>
        </div>
      </div>
      <?php 
      if(!empty($recent_five_post)){
        ?>
        <div class="col-md-6 nopad-lr graph-box stats-boxes">        
          <div id="jqChart" style="width:95%; height: 200px;">    
          </div>          
        </div>  
        <?php 
      }?>          
    </div>
  </div>  
</div>
<!--  -->
<script lang="javascript" type="text/javascript">
  jQuery(document).ready(function () {
    jQuery('#jqChart').jqChart({
      title: { text: '' },
      tooltips: { type: 'individual' },
      animation: { duration: 5 },
      axes: [
        {
          location: 'bottom',
          type: 'dateTime',
          labels: {
            stringFormat: 'd/m/yy'
          }
        }
      ],
      series: [
        {
          type: 'line',
          title: 'Image',
          strokeStyle: '#6bcac8',
          lineWidth: 2,
          data: [<?php _e($content_file); ?>]
        },
        {
          type: 'line',
          title: 'Video',
          strokeStyle: '#ff6a64',
          lineWidth: 2,
          data: [<?php _e($video_file); ?>]
        }
      ]
    });
  });
</script>