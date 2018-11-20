<section class="section-content padding-y bg2" style="margin-top:30px">
  <div class="container">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">List Lamaran Saya</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover text-center" id='tb_list_tender' >
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Tender</th>
              <th>Tanggal Dibuat</th>
              <th>Tanggal Tutup</th>
              <th>Jumlah Pelamar</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="">

          </tbody>
        </table>
      </div>
    </div>
  </div>

</section>
<div class="modal fade" id="modal_konfirmasi" tabindex="-1" role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<?php if($this->session->flashdata('success')) {?>
			<div class="modal-header" style="background-color: #28a745;">
				<h5 id="header" class="modal-title" style="color:white"><i class="fa fa-info" style="margin-right:10px"></i>Berhasil!</h5>
			<?php  }else{?>
			<div class="modal-header" style="background-color: #dc3545;">
				<h5 id="header" class="modal-title" style="color:white"><i class="fa fa-info" style="margin-right:10px"></i>Gagal!</h5>
			<?php  }?>
				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php if($this->session->flashdata('success')) {?>
					<h1 class="text-center" style="color:#28a745"><i class="fa fa-check"></i></h1>
					<h5 class="text-center">Proses Melamar Tender Berhasil Dilakukan</h5>
				<?php  }elseif($this->session->flashdata('error')){?>
					<h1 class="text-center" style="color:#dc3545"><i class="fa fa-times"></i></h1>
					<h5 class="text-center">Gagal Melakukan Proses Melamar Tender</h5>
				<?php  }?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_detail_tender" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="background-color: #007bff;">
        <h4 id="header" class="modal-title" style="color:white"><i class="fa fa-search" style="margin-right:5px"></i>Detail Tender</h4>
        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
				<div class="row no-gutters">
					<aside class="col-sm-5 border-right">
						<article class="gallery-wrap">
						<div class="img-big-wrap">
						  <div> <a id="href_gambar" href="" data-fancybox=""><img id="img_gambar" src=""></a></div>
						</div>
						</article>
					</aside>
					<aside class="col-sm-7">
						<article class="p-3">
							<h3 id="tittle_tender" class="title mb-3"></h3>
							<div class="mb-3">
								<var class="price text-primary">
									<span id="jumlah_pelamar"></span><span> orang pelamar</span>
								</var>
							</div> <!-- price-detail-wrap .// -->
							<dl>
							  <dt>Deskripsi</dt>
							  <dd id="deskripsi"></dd>
							</dl>
							<dl class="row">
							  <dt class="col-sm-6">Pendaftaran Ditutup</dt>
							  <dd class="col-sm-6" id="tanggal_tutup"></dd>

							  <dt class="col-sm-6">Deadline Pengerjaan</dt>
							  <dd class="col-sm-6" id="deadline"></dd>
							</dl>
							<hr>
							<div class="" id="tempat_formulir">
								<?php echo form_open_multipart(base_url('Produsen/lamar_tender/'));?>
									<input type="hidden" id="id_tender" name="id_tender" value="">
									<div class="form-group">
										<label for="rab">File RAB (PDF)</label>
										<input type="file" name="rab" class="form-control" id="rab" placeholder="" accept="application/pdf" required>
									</div>
									<div class="form-group">
										<label for="tawaran_harga">Tawaran Harga (Rp)</label>
										<input type="number" name="tawaran_harga" class="form-control" id="tawaran_harga" placeholder="" required>
									</div>
									<div class="form-group">
									  <button id="btn_gas" type="submit" class="btn  btn-outline-primary"><i class="fa fa-plane" style="margin-right:5px"></i>Daftar Sekarang!</button>
									</div>
								</form>
							</div>
							<button id="btn_daftar" class="btn  btn-outline-primary"><i class="fa fa-plane" style="margin-right:5px"></i>Daftar Sekarang!</button>
						</article>
					</aside>
				</div>

      </div>
      <!--Footer-->
    </div>
    <!--/.Content-->
  </div>
</div>
<footer class="section-footer bg-dark text-white" style="position:fixed;width:100%;bottom:0;overflow:hidden;">
	<div class="container ">
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
    $('#tittle').text('e-Tender | List Lamaran');
    $('#btn_lamaran').addClass('active');
		if ('<?php echo $this->session->flashdata('success')?>'!='' ||'<?php echo $this->session->flashdata('error')?>'!='' ) {
			$('#modal_konfirmasi').modal('show');
		}
	});

	function detail_tender(id_tender){
		$.ajax({
			url: '<?php echo base_url('Tender/ajax_get_detail_tender') ?>',
			type: 'POST',
			dataType: 'JSON',
			data: {id_tender: id_tender, type:'produsen'}
		})
		.success(function(data) {
			console.log(data);
			$('#btn_daftar').attr('hidden',false);
			$('#tittle_tender').html(data.tittle);
			$('#jumlah_pelamar').html(data.jumlah_pelamar);
			$('#deskripsi').html(data.deskripsi);
			$('#tanggal_tutup').html(data.tanggal_tutup);
			$('#deadline').html(data.deadline);
			$('#img_gambar').attr('src','<?php echo base_url('assets/image/tender/') ?>'+data.gambar);
			$('#href_gambar').attr('href','<?php echo base_url('assets/image/tender/') ?>'+data.gambar)
			if (data.terdaftar=='sudah') {
				$('#btn_daftar').attr('onClick','');
				$('#btn_daftar').addClass('disabled');
				$('#btn_daftar').html('<i class="fa fa-plane" style="margin-right:5px"></i>Sudah Terdaftar');
      }
			else if (data.id_status_tender!=1) {
				$('#btn_daftar').attr('onClick','');
				$('#btn_daftar').addClass('disabled');
				$('#btn_daftar').html('<i class="fa fa-plane" style="margin-right:5px"></i>Tender Telah Ditutup');
			}
      else {
				$('#btn_daftar').attr('onClick','isi_formulir('+data.id_tender+')');
				$('#btn_daftar').removeClass('disabled');
        $('#btn_daftar').html('<i class="fa fa-plane" style="margin-right:5px"></i>Daftar Sekarang!');
      }
			$('#tempat_formulir').attr('hidden',true);
			$('#modal_detail_tender').modal('show');
		})
		.fail(function() {
			alert("gagal mendapatkan detail tender");
		});
	}

	function isi_formulir(id_tender){
		$('#tempat_formulir').attr('hidden',false);
		$('#btn_daftar').attr('hidden',true);
		$('#id_tender').val(id_tender);
	}

</script>
</body>
</html>
