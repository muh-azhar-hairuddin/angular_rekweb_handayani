<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
<div class="clearfix">
  <div class="pull-left">
    <h4 class="text-blue">Laporan Kohort Ibu Hamil</h4>
    <p class="mb-30 font-14"></p>
  </div>
  <div class="pull-right">
    <a href="#" class="btn btn-danger scroll-click" rel="content-y" onclick="loadPage('kepala_data_kohort');" role="button"><i class="fa fa-times-circle"></i> Close</a>
  </div>
</div>
<form name="form" id="form" enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Dari Tanggal</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control date-picker" type="text" name="tgl_awal" id="tgl_awal" value="<?php echo date('d-m-Y'); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Sampai Tanggal</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control date-picker" type="text" name="tgl_akhir" id="tgl_akhir" value="<?php echo date('d-m-Y'); ?>">
    </div>
  </div>
  <div class="btn-list text-center">
  	<button type="button" class="btn btn-primary" name="cetak" id="cetak"><i class="fa fa-print"></i> Cetak</button>
	</div>
</form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('.date-picker').datepicker({
    		language: 'en',
    		autoClose: true,
    		dateFormat: 'dd-mm-yyyy',
    	});

      $("#cetak").click(function(e) {
        e.preventDefault();
        var tgl_awal=$('#tgl_awal').val();
        var tgl_akhir=$('#tgl_akhir').val();
        window.open("kepala_lap_kohort_ibu_hamil/cetak?tgl_awal="+tgl_awal+'&tgl_akhir='+tgl_akhir);
      });

    });
  </script>
  <script>
   $('#loading').removeClass('loading');
  </script>
