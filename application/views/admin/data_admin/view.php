<div class="min-height-200px">
  <div class="page-header">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="title">
          <h4>Data Admin</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">

          </ol>
        </nav>
      </div>
      <div class="col-md-6 col-sm-12 text-right">
        <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modal-tambah" id="tambah">
          <span class="fa fa-plus-circle"></span> Tambah
        </a>
      </div>
    </div>
  </div>
  <!-- Simple Datatable start -->
  <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="clearfix mb-20">
      <div class="pull-left">
        <h5 class="text-blue">Data Admin</h5>
      </div>
    </div>
    <div class="row">
      <table class="table data-table stripe hover nowrap" id="t_admin">
        <thead>
          <tr>
            <th class="table-plus datatable-nosort text-center">No</th>
            <th class="text-center">Username</th>
            <th class="text-center">Level</th>
            <th class="text-center">Nama Lengkap</th>
            <th class="text-center">Alamat</th>
            <th class="datatable-nosort text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-gambar" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-gambar">Data Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form name="form" id="form" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="" readonly>
        <div class="form-group row">
          <label class="col-sm-12 col-md-2 col-form-label">Username</label>
          <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-md-2 col-form-label">Level</label>
          <div class="col-sm-12 col-md-10">
            <select class="form-control" id="level" name="level" required>
              <?php
              $level=array('Admin' =>'a' ,'Bidan'=>'b','Kepala Puskespas'=>'kp');
              foreach($level as $lvl => $value):
              echo '<option value="'.$value.'">'.$lvl.'</option>';
              endforeach;
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
          <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
          <div class="col-sm-12 col-md-10">
            <textarea class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat" rows="3" required></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-md-2 col-form-label">Password</label>
          <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="password" id="password" placeholder="Password" required>
          </div>
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <div class="btn-list text-center">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
        	<button type="button" class="btn btn-primary" name="simpan" id="simpan"><i class="fa fa-check-circle"></i> Simpan</button>
      	</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-account" tabindex="-1" role="dialog" aria-labelledby="modal-gambar" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-gambar">Account Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form name="form_account" id="form_account">
        <input type="hidden" id="id_account" name="id_account" value="" readonly>
        <div class="form-group row">
          <label class="col-sm-12 col-md-2 col-form-label">Username</label>
          <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="username2" id="username2" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-12 col-md-2 col-form-label">Password</label>
          <div class="col-sm-12 col-md-10">
            <input class="form-control" type="text" name="password" id="password" placeholder="Password" required>
          </div>
        </div>

        </form>
      </div>
      <div class="modal-footer">
        <div class="btn-list text-center">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
        	<button type="button" class="btn btn-primary" name="simpan_account" id="simpan_account"><i class="fa fa-check-circle"></i> Simpan</button>
      	</div>
      </div>
    </div>
  </div>
</div>
  <!-- Simple Datatable End -->
  <script>
    $('document').ready(function(){

      var table;
      table = $('#t_admin').DataTable({
          scrollCollapse: true,
          autoWidth: false,
          responsive: true,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search"
          },
          "destroy": true,
          "processing": true,
          "serverSide": true,
          "stateSave": true,
          "order": [],

          "ajax": {
              "url": "admin_data_admin/get_data_admin",
              "type": "POST"
          },
          "columnDefs": [
          {
              "targets": "datatable-nosort",
              "orderable": false,
          },
          ],

      });

      $("#simpan").click(function(e) {
        e.preventDefault();
        if($('#form').parsley().validate()){
          $('#simpan').prop('disabled', true).text('diProses...');
          var form = $('form')[0];
          var form_data = new FormData(form);
          $.ajax({
            type    : 'POST',
            data    : form_data,
            contentType : false,
            processData : false,
            cache: false,
            async:false,
            url     : "admin_data_admin/simpan",
            success : function(data) {
              $('#simpan').prop('disabled', false).html('<i class="fa fa-check-circle"></i> Simpan');
              alert(data);
              table.ajax.reload( null, false );
              $('#modal-tambah').modal('toggle');
            }
          });
        }else {
          return false();
        }

      });

      $("#simpan_account").click(function(e) {
        e.preventDefault();
        if($('#form_account').parsley().validate()){
          $('#simpan_account').prop('disabled', true).text('diProses...');
          var form = $('#form_account').serialize();
          $.ajax({
            type    : 'POST',
            data    : form,
            url     : "admin_data_admin/simpan_account",
            success : function(data) {
              $('#simpan_account').prop('disabled', false).html('<i class="fa fa-check-circle"></i> Simpan');
              alert(data);
              $('#modal-account').modal('toggle');
            }
          });
        }else {
          return false();
        }

      });

      $("#tambah").click(function() {
        $('#password').prop('readonly',false);
        $('#password').prop('required',true);
        $("#id").val('');
        $("#Username").val('');
        $("#nama_lengkap").val('');
        $("#alamat").html('');
        $("#level").val('a');
      });

      $('#t_admin').on( 'click', 'tr .edit', function () {
          var id = $(this).data("id");
          $.ajax({
            type    : 'POST',
            data    : {id:id},
            url     : "admin_data_admin/cari_admin",
            dataType: 'json',
            success : function(data) {
              $('#password').prop('readonly',true);
              $('#password').prop('required',false);
              $('#id').val(data.id);
              $("#username").val(data.username);
              $("#nama_lengkap").val(data.nama_lengkap);
              $("#alamat").html(data.alamat);
              $("#level").val(data.level);
            }
          });

        });

        $('#t_admin').on( 'click', 'tr .account', function () {
            var id = $(this).data("id");
            $.ajax({
              type    : 'POST',
              data    : {id:id},
              url     : "admin_data_admin/cari_account",
              dataType: 'json',
              success : function(data) {
                $('#id_account').val(data.id);
                $("#username2").val(data.username);
                $("#password").val('');
              }
            });

          });

      $('#t_admin').on( 'click', 'tr .hapus', function () {
          var id = $(this).data("id");
          var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
          if (r == true) {
            $.ajax({
              type    : 'POST',
              data    : {id:id},
              url     : "admin_data_admin/hapus",
              success : function(data) {
                alert(data);
                table.ajax.reload( null, false );
              }
            });
          } else {
              return false;
          }

        });

    });
  </script>
  <script>
   $('#loading').removeClass('loading');
  </script>
