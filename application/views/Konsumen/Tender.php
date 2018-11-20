<div class="content-wrapper">
  <section class="content-header">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="callout callout-success lead">
        <h4>Berhasil !</h4>
        <p><?php echo $this->session->flashdata('success')?></p>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="callout callout-success lead">
        <h4>Gagal !</h4>
        <p><?php echo $this->session->flashdata('error')?></p>
      </div>
    <?php endif; ?>
    <h1>
      <i class="fa fa-pencil" style="margin-right:5px"></i>Kelola Tender Saya
      <button class="pull-right btn btn-success" type="button" name="btn_tambah_tender" id='btn_tambah_tender'><i class="fa fa-plus" style="margin-right:5px"></i>Buat Tender</button>
    </h1>
  </section>
  <section class="content">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">List Tender Saya</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover text-center" id='tb_list_tender'>
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
            <?php $counter=1 ?>
            <?php foreach ($tender as $key): ?>
              <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $key->tittle ?></td>
                <td><?php echo $key->tanggal_buka ?></td>
                <td><?php echo $key->tanggal_tutup ?></td>
                <td>
                  <?php if ($key->jumlah_pelamar>0){ ?>
                    <button onclick="list_pelamar('<?php echo $key->id_tender ?>')" class="btn btn-primary"><i class="fa fa-list" style="margin-right:5px"></i><?php echo $key->jumlah_pelamar ?> orang</button>  <?php } else{?>
                    <button class="btn btn-primary disabled"><i class="fa fa-list" style="margin-right:5px"></i><?php echo $key->jumlah_pelamar ?> orang</button> <?php }?>
                </td>
                <?php if ($key->id_status_tender==1){ ?>
                  <td><button class="btn btn-success" onclick="ganti_status(<?php echo $key->id_tender ?>,<?php echo $key->id_status_tender ?>)"><i class="fa fa-check" style="margin-right:5px"></i><?php echo $key->status_tender ?></button></td>
                <?php }else{?>
                  <td><button class="btn btn-danger" onclick="ganti_status(<?php echo $key->id_tender ?>,<?php echo $key->id_status_tender ?>)"><i class="fa fa-close" style="margin-right:5px"></i><?php echo $key->status_tender ?></button></td>
                <?php }?>
                <td>
                  <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-success" onclick="detail_tender('<?php echo $key->id_tender ?>')">
                      <i class="fa fa-search"></i>
                    </button>
                    <button type="button" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
              </td>
              </tr>
              <?php $counter++ ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <div class="modal fade" id="modal_konfirmasi" tabindex="-1" role="dialog" aria-hidden="true" >
  	<div class="modal-dialog modal-md" role="document">
  		<div class="modal-content">
  			<div class="modal-header" style="background-color: #f39c12;">
  				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
          <h4 class="modal-title" style="color:white"><i class="fa fa-question" style="margin-right:5px"></i>Konfirmasi</h4>
  			</div>
  			<div class="modal-body">
					<div class="text-center">
            <i class="fa fa-question fa-4x" class="" style="color:#f39c12"></i>
          </div>
          <div class="text-center">
            <h4 id="kata_konfirmasi_aktifasi" class=""></h4>
            <a href="" id="btn_konfirmasi_aktifasi" type="button" class="btn btn-warning"></a>
          </div>
  			</div>
			</div>
		</div>
	</div>
</div>

  <div class="modal fade" id="modal_add_tender" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color: #367fa9;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 id="header" class="modal-title" style="color:white"><i class="fa fa-plus" style="margin-right:5px"></i>Tambah Tender Saya</h4>
        </div>

        <!--Body-->
        <div class="modal-body">
          <?php echo form_open_multipart(base_url('Tender/add_tender/'));?>
            <div class="form-group">
              <label for="tittle">Nama Tender Baru</label>
              <input type="text" class="form-control" name="tittle" placeholder="Berikan judul tender anda di sini" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Tender</label>
              <textarea class="form-control textarea" name="deskripsi" placeholder="Deskripsikan tender anda di sini" required></textarea>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="deadline">Deadline Pengerjaan</label>
                <input name='deadline' type="date" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal_tutup">Tanggal Tutup Tender</label>
                <input name='tanggal_tutup' type="date" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label for="gambar">Gambar Ilustrasi (Opsional)</label>
              <input name='gambar' type="file" class="form-control" accept="image/*">
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="button"><i class="fa fa-paper-plane-o"></i>   Kirim</button>
          </form>
        </div>
        <!--Footer-->
      </div>
      <!--/.Content-->
    </div>
  </div>

  <div class="modal fade" id="modal_detail_tender" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color: #367fa9;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 id="header" class="modal-title" style="color:white"><i class="fa fa-plus" style="margin-right:5px"></i>Detail Tender Saya</h4>
        </div>

        <!--Body-->
        <div class="modal-body">
          <?php echo form_open_multipart(base_url('Konsumen/edit_tender/'));?>
            <div class="form-group">
              <label for="tittle">Nama Tender</label>
              <input type="text" class="form-control" name="tittle" id="tittle" placeholder="Berikan judul tender anda di sini" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Tender</label>
              <textarea class="form-control textarea" name="deskripsi" id="deskripsi" placeholder="Deskripsikan tender anda di sini" required></textarea>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="deadline">Deadline Pengerjaan</label>
                <input name='deadline' id="deadline" type="date" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label for="tanggal_tutup">Tanggal Tutup Tender</label>
                <input name='tanggal_tutup' id="tanggal_tutup" type="date" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label for="gambar">Gambar Ilustrasi (Opsional)</label>
              <input name='gambar' id="gambar" type="file" class="form-control" accept="image/*">
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="button"><i class="fa fa-paper-plane-o"></i>Kirim</button>
          </form>
        </div>
        <!--Footer-->
      </div>
      <!--/.Content-->
    </div>
  </div>

  <div class="modal fade" id="modal_list_pelamar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header" style="background-color: #367fa9;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 id="header" class="modal-title" style="color:white"><i class="fa fa-list" style="margin-right:5px"></i>List Pelamar</h4>
        </div>

        <!--Body-->
        <div class="modal-body">
          <table class="table table-striped table-bordered table-hover text-center" id='tb_list_pelamar'>
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tawaran Harga</th>
                <th>RAB</th>
              </tr>
            </thead>
            <tbody class="" id="tbody_list_pelamar">

            </tbody>
          </table>
        </div>
        <!--Footer-->
      </div>
      <!--/.Content-->
    </div>
  </div>

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.8
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/Konsumen/plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/Konsumen/plugins/dataTables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/Konsumen/plugins/dataTables/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/Konsumen/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#judul').text('Konsumen | Tender Saya');
    $('#btn_tender').addClass('active');
    $('.table').DataTable();
  });

  $('#btn_tambah_tender').click(function(event) {
    $('.wysihtml5-sandbox').contents().find('.wysihtml5-editor').html('');
    $('#modal_add_tender').modal('show');
  });

  function list_pelamar(id_tender){
    $.ajax({
      url: '<?php echo base_url('Konsumen/ajax_get_list_pelamar') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {id_tender: id_tender}
    })
    .success(function(data) {
      $('#tbody_list_pelamar').empty();
      var tbody_list_pelamar = '';
      for (var i = 0; i < data.length; i++) {
        var lokasi = '<?php echo base_url('assets/file/rab/') ?>'+data[i].rab;
        var pelamar =''+
        '<tr>'+
          '<td>'+(i+1)+'</td>'+
          '<td>'+data[i].nama+'</td>'+
          '<td>Rp. '+data[i].tawaran_harga+'</td>'+
          '<td><a class="btn btn-primary" href="'+lokasi+'" target="_blank"><i class="fa fa-search" style="margin-right:5px"></i>Lihat RAB</a></td>'+
        '<tr>';
        tbody_list_pelamar = tbody_list_pelamar + pelamar;
      }
      $('#tbody_list_pelamar').append(tbody_list_pelamar);
      $('#modal_list_pelamar').modal('show');
    })
    .fail(function() {
      alert("error mendapatkan list pelamar");
    })
  }

  function detail_tender(id_tender){
    $.ajax({
      url: '<?php echo base_url('Tender/ajax_get_detail_tender') ?>',
      type: 'POST',
      dataType: 'JSON',
      data: {id_tender: id_tender, type:'komsumen'}
    })
    .success(function(data) {
      console.log(data);
      $('#tittle').val(data.tittle);

      $('#deadline').val(data.deadline);
      $('#tanggal_tutup').val(data.tanggal_tutup);
      $('.wysihtml5-sandbox').contents().find('.wysihtml5-editor').html(data.deskripsi);
      $('#modal_detail_tender').modal('show');
    })
    .fail(function() {
      alert("error mendapatkan detail tender");
    })
  }

  function ganti_status(id_tender, id_status_tender){
    if (id_status_tender==1) {
      $('#kata_konfirmasi_aktifasi').html('Yakin ingin menonaktifkan tender?');
      $('#btn_konfirmasi_aktifasi').html('<i class="fa fa-exchange" style="margin-right:5px"></i>Nonaktifkan')
      var controller = '<?php echo base_url("Tender/ganti_status_tender/") ?>'+id_tender+'/'+2;
    }
    else {
      $('#kata_konfirmasi_aktifasi').html('Yakin ingin mengaktifkan tender?');
      $('#btn_konfirmasi_aktifasi').html('<i class="fa fa-exchange" style="margin-right:5px"></i>Aktifkan')
      var controller = '<?php echo base_url("Tender/ganti_status_tender/") ?>'+id_tender+'/'+1;
    }
    $('#btn_konfirmasi_aktifasi').attr('href',controller);
    $('#modal_konfirmasi').modal('show');
  }

</script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/Konsumen/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/Konsumen/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/Konsumen/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/Konsumen/plugins/morris/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/Konsumen/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/Konsumen/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/Konsumen/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/Konsumen/plugins/knob/jquery.knob.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/Konsumen/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/Konsumen/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/Konsumen/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/Konsumen/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/Konsumen/plugins/fastclick/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/Konsumen/dist/js/app.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/Konsumen/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/Konsumen/dist/js/demo.js') ?>"></script>
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>

</body>
</html>
