<?php $this->load->view('includes/inner_head'); ?>
        
	<?php if(!empty($main_content)) { ?>	
	<div class="container">
		<div class="textblock"> 
			<?php  print_r($main_content); ?> 
		</div>
	</div>	
	<?php } ?>
 
       <?php
    if ( isset($main_view) )
	 	$this->load->view($main_view); ?>
		
    <?php $this->load->view('includes/foot'); ?> 
	  <?php
    if ( isset($js_view) )
	 	$this->load->view($js_view); ?>
  