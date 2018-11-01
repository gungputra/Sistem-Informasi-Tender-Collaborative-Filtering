<footer class="section-footer bg2">
	<div class="container">
		<section class="footer-bottom row">
			<div class="col-sm-6">
				<p> Made with <3 <br>  by Vosidiy M.</p>
			</div>
			<div class="col-sm-6">
				<p class="text-sm-right">
Copyright &copy 2018 <br>
<a href="http://bootstrap-ecommerce.com">Bootstrap-ecommerce UI kit</a>
				</p>
			</div>
		</section> <!-- //footer-top -->
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->


<script src="<?php echo base_url('assets/Pengerajin/main/js/jquery-2.0.0.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/Pengerajin/main/js/bootstrap.bundle.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/Pengerajin/main/plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/Pengerajin/main/js/script.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#tittle').text('<?php echo $tittle ?>');
	});

	function detail(id_tender){
		$('#modal_add_aktivitas').modal('show');
	}
</script>
</body>
</html>
