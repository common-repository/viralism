<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="row">
  	<div class="col-md-12 vio-navigation">
	    <ul>
	    	<?php $currPage = (isset($_GET['page']))?$_GET['page']:''; ?>
	    	<li <?php if($currPage=='viralism'){ _e('class="active"'); }?>><a href="<?php _e(get_admin_url().'admin.php?page=viralism');?>"><?php _e('Dashboard');?></a></li>
	    </ul>
  	</div>  
</div>