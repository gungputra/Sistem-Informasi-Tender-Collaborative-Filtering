<section class="section-intro bg-img padding-y-lg">
	<div class="row">
  <div class="col-sm-6 mx-auto">
   <article class="white text-center mb-5">
   	<h1 class="display-3">Display hero text</h1>
    <p>This example is a quick exercise to illustrate how the navbar and its contents work. Some navbars extend the width of the viewport, others are confined within... For positioning of navbars, checkout the Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
   </article>

  </div> <!-- col.// -->
</div> <!-- row.// -->
</section>  <!-- section-intro.// -->
<section class="section-content padding-y">
<div class="container">

<header class="section-heading">
	<h2>Basic starter page</h2>
</header><!-- sect-heading -->

<div class="row">
	<?php foreach ($tender as $key): ?>
		<div class="col-md-3">
			<figure class="card card-product">
				<div class="img-wrap"><img src="<?php echo base_url('assets/image/tender/'.$key->gambar) ?>"></div>
				<figcaption class="info-wrap">
					<h4 class="title"><?php echo $key->tittle ?></h4>
				</figcaption>
				<div class="bottom-wrap">
					<p class="float-left"><span class="fa fa-calendar" style="margin-right:5px"></span><?php echo $key->deadline ?></p>
					<a onclick="detail(<?php echo $key->id_tender ?>)" class="btn btn-sm btn-primary float-right text-white">Detail</a>
				</div> <!-- bottom-wrap.// -->
			</figure>
		</div> <!-- col // -->

	<?php endforeach; ?>
</div> <!-- row.// -->

</div>
</section>
<div class="modal fade" id="modal_add_aktivitas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #367fa9;">
        <h4 id="header" class="modal-title" style="color:white"><i class="fa fa-plus"></i>    Tambah Kegiatan Latihan</h4>
        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <form id="" class="" action="<?php echo base_url('Aktivitas/add_aktivitas/LAT') ?>" method="post">
          <div class="form-group">
            <label for="nama_aktivitas">Nama Kegiatan Latihan</label>
            <input type="text" class="form-control" name="nama_aktivitas" placeholder="Kegiatan" required>
          </div>
          <div class="form-group">
            <label for="detail_aktivitas">Detail Latihan</label>
            <textarea class="form-control" name="detail_aktivitas" placeholder="Detail" required></textarea>
          </div>
          <div class="form-group">
            <label for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
            <input name='waktu_pelaksanaan' type="date" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="tempat_pelaksanaan">Lokasi</label>
            <input type="text" class="form-control" name="tempat_pelaksanaan" placeholder="Lokasi kegiatan" required>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="button"><i class="fa fa-paper-plane-o"></i>   Kirim</button>
        </form>
      </div>
      <!--Footer-->
    </div>
    <!--/.Content-->
  </div>
</div>
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


<script src="<?php echo base_url('assets/Produsen/main/js/jquery-2.0.0.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/Produsen/main/js/bootstrap.bundle.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/Produsen/main/plugins/fancybox/fancybox.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/Produsen/main/js/script.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#tittle').text('Welcome');
	});

	function detail(id_tender){
		$('#modal_add_aktivitas').modal('show');
	}
</script>
</body>
</html>
