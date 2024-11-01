<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="vio-plugin-main">
  <div class="container">
    <?php  
    //Include Header File
    require_once VIO_PLUGIN_PATH.'/inc/header.php'; 
    //Include Dashboard File
    require_once VIO_PLUGIN_PATH.'/code/dashboard/dashboard-data.php';
    require_once VIO_PLUGIN_PATH.'/code/dashboard/dashboard.php'; 
    //Include Footer File
    require_once VIO_PLUGIN_PATH.'/inc/footer.php'; 
    ?>
  </div>
</div>