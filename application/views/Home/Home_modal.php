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
