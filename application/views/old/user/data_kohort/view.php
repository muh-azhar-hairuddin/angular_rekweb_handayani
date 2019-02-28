<div class="min-height-200px">
  <div class="page-header">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="title">
          <h4>Data Registrasi Ibu Hamil</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
          <div>
            <h5 class="">Notifikasi : Pemeriksaan Selanjutnya adalah
            <?php
              $no_ktp=$this->session->userdata('no_ktp');
              $tgl=$this->db->select('tgl_periksa_selanjutnya')->where('no_ktp',$no_ktp)->get('pasien')->row()->tgl_periksa_selanjutnya;
              echo '<span style="color: #aa0f1f;font-weight: bold;">'.tosql($tgl).'</span>';
            ?>
            </h5>
          </div>


          </ol>
        </nav>
      </div>
      <div class="col-md-6 col-sm-12 text-right">

      </div>
    </div>
  </div>
  <!-- Simple Datatable start -->
  <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="clearfix mb-20">
      <div class="pull-left">
        <h5 class="text-blue">Data Registrasi Ibu Hamil</h5>
      </div>
    </div>
    <div class="row">
      <table class="table data-table stripe hover nowrap" id="t_register">
        <thead>
          <tr>
            <th class="table-plus text-center">ID Registrasi</th>
              <th class="table-plus text-center">Tgl</th>
            <th class="text-center">No. KTP</th>
            <th class="text-center">Nama</th>
            <th class="">Alamat</th>
            <th class="text-center">Usia</th>
            <th class="text-center">Jamkesmas</th>
            <th class="text-center">Usia Kehamilan</th>
            <th class="text-center">Trimester Ke</th>
            <th class="text-center">Bidan</th>
            <th class="datatable-nosort text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
  <!-- Simple Datatable End -->
  <script>
    $('document').ready(function(){
      var table;
      table = $('#t_register').DataTable({
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
              "url": "kepala_data_kohort/get_data_kohort",
              "type": "POST"
          },
          "columnDefs": [
          {
              "targets": "datatable-nosort",
              "orderable": false,
          },
          ],

      });

      $('#t_register').on( 'click', 'tr .hapus', function () {
          var id = $(this).data("id");
          var r = confirm("Anda Yakin Ingin menghapus Data Ini?");
          if (r == true) {
            $.ajax({
              type    : 'POST',
              data    : {id:id},
              url     : "kepala_data_kohort/hapus",
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
