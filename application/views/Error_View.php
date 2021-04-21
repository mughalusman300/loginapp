 <?php if ($this->session->flashdata('error')) { ?>  
	  <div id="alerting" style=" border-left:5px solid red;margin-top:20px; background-color:#dd0d0d; color:white;"> <?= $this->session->flashdata('error') ?>
		                      </div>	
	  <script>
          setTimeout(function() {$('#alerting').fadeOut(2000);}, 2100);
		</script>							  
	  <?php } ?>
	 