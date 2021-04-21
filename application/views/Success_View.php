
	  <?php if ($this->session->flashdata('success')) { ?>
                              <div id="alert" style="background-color:#f6fff1;border-left:solid 4px green;padding:5px;" class="alerting text-success"> <?= $this->session->flashdata('success') ?>
							  </div> 
	  <script>
          setTimeout(function() {$('.alerting').fadeOut(3000);}, 3100);
		</script>				  
	  <?php } ?>
</div>