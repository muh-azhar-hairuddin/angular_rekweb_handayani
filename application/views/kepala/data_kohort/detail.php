<style>
  @media print
    {
      body * {
        visibility: hidden !important;
      }
      #print,.invoice-desc, #print * {
        visibility: visible !important;
      }
      #print {
        position: absolute !important;
        left: 0 !important;
        top: 0 !important;
      }

        @page { size: A5 landscape !important;  margin: 0mm; }
    }

</style>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
<div class="clearfix">
  <div class="pull-left">
    <h4 class="text-blue"> Detail Pemeriksaan Pasien</h4>
    <p class="mb-30 font-14"></p>
  </div>
  <div class="pull-right">
    <a href="#" class="btn btn-danger scroll-click" rel="content-y" onclick="loadPage('kepala_data_kohort');" role="button"><i class="fa fa-times-circle"></i> Close</a>
  </div>
</div>

<div class="min-height-200px" id="print">
  <div class="invoice-wrap">
    <div class="invoice-box">
      <div class="invoice-header">

      </div>
      <div class="row pb-30">
        <div class="col-md-4">
          <div class="logo">
            <input class="form-control" type="hidden" name="id_register" id="id_register" value="<?php echo $id_register; ?>" placeholder="ID register" readonly>
            <?php echo $image_show; ?>
          </div>
        </div>
        <div class="col-md-4">
          <h5 class="mb-15"><span id="nama"></span></h5>
          <p class="font-14 mb-5">No.KTP: <strong class="weight-600"><span id="no_ktp"></span></strong></p>
          <p class="font-14 mb-5">Alamat: <strong class="weight-600"><span id="Alamat"></span></strong></p>
          <p class="font-14 mb-5">ID Registrasi: <strong class="weight-600"><span><?php echo $id_register; ?></span></strong></p>
          <p class="font-14 mb-5">Tanggal: <strong class="weight-600"><span id="tanggal"></span></strong></p>
        </div>
        <div class="col-md-4">
          <div class="text-right">
            <p class="font-14 mb-5">Usia: <strong class="weight-600"><span id="usia"></span></strong></p>
            <p class="font-14 mb-5">Jamkesmas: <strong class="weight-600"><span id="jamkesmas"></span></strong></p>
            <p class="font-14 mb-5">Usia Kehamilan: <strong class="weight-600"><span id="usia_kehamilan"></span></strong></p>
            <p class="font-14 mb-5">Trimester Ke: <strong class="weight-600"><span id="trimester"></span></strong></p>
          </div>
        </div>
      </div>
      <div class="invoice-desc pb-30">
        <div class="invoice-desc-head clearfix">
          <div class="invoice-sub">Kohort Ibu Hamil</div>
        </div>
        <div class="invoice-desc-body">
          <ul>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Pemeriksaan</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Anamnesis</div>
              <div class="invoice-subtotal"><span class="weight-600" id="anamnesis"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">BB(Kg)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="bb"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Tinggi Badan(cm)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tb"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">TD(mmHg)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="td"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">TFU(cm)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tfu"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">LILA(cm)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="lila"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Status Gizi(M/N)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="status_gizi"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Refleks Patella(+/-)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="refleks_patella"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Pelayanan</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Injeksi TT</div>
              <div class="invoice-subtotal"><span class="weight-600" id="injeksi_tt"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Catat di Buku KIA</div>
              <div class="invoice-subtotal"><span class="weight-600" id="buku_kia"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Fe(Tab/Botol)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="fe"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Laboratorium</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Hb(Gr/dl)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="hb"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Pretein Urin(+/-)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="pretein_urin"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Gula Darah(+/-)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="gula_darah"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Resiko Terdeteksi Oleh</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="deteksi_resiko"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Komplikasi</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="komplikasi"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Fasilitas Kesehatan</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="fasilitas"></span></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="invoice-desc pb-30">
        <div class="invoice-desc-head clearfix">
          <div class="invoice-sub">Kohort Persalinan</div>
        </div>
        <div class="invoice-desc-body">
          <ul>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Waktu Persalinan</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Kala I Aktif</div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Tanggal</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tglk1"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Jam</div>
              <div class="invoice-subtotal"><span class="weight-600" id="jamk1"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Kala II Aktif</div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Tanggal</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tglk2"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Jam</div>
              <div class="invoice-subtotal"><span class="weight-600" id="jamk2"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Bayi Lahir</div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Tanggal</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tglbl"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Jam</div>
              <div class="invoice-subtotal"><span class="weight-600" id="jambl"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Plasenta Lahir</div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Tanggal</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tglpl"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Jam</div>
              <div class="invoice-subtotal"><span class="weight-600" id="jampl"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Persalinan</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Usia HPHT</div>
              <div class="invoice-subtotal"><span class="weight-600" id="usia_hpht"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Presentasi</div>
              <div class="invoice-subtotal"><span class="weight-600" id="presentasi"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Berat Bayi Lahir</div>
              <div class="invoice-subtotal"><span class="weight-600" id="bb"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Cara Persalinan</div>
              <div class="invoice-subtotal"><span class="weight-600" id="cara_persalinan"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Tempat</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tempat"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Keadaan</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Keadaan Ibu(M/N)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="keadaan_ibu"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Keadaan Bayi(M/N)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="keadaan_bayi"></span></div>
            </li>

            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Komplikasi</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="komplikasi_persalinan"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Fasilitas Kesehatan</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="fasilitas_persalinan"></span></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="invoice-desc pb-30">
        <div class="invoice-desc-head clearfix">
          <div class="invoice-sub">Kohort Nifas</div>
        </div>
        <div class="invoice-desc-body">
          <ul>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Tanda Fital</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">TD(mmHg)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="td_nifas"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Suhu</div>
              <div class="invoice-subtotal"><span class="weight-600" id="suhu"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Komplikasi</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="komplikasi_nifas"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Fasilitas Kesehatan</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="fasilitas_nifas"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600" id="">Keadaan</span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Tiba(H/M)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="keadaan_tiba"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Pulang(H/M)</div>
              <div class="invoice-subtotal"><span class="weight-600 text-uppercase" id="keadaan_pulang"></span></div>
            </li>
          </ul>
        </div>
      </div>
      <div class="invoice-desc pb-30">
        <div class="invoice-desc-head clearfix">
          <div class="invoice-sub">Kohort Bayi</div>
        </div>
        <div class="invoice-desc-body">
          <ul>
            <li class="clearfix">
              <div class="invoice-sub">DJJ(x/menit)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="djj"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Kepala Thd PAP(M/BM)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="pap"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">TBJ(Gr)</div>
              <div class="invoice-subtotal"><span class="weight-600" id="tbj"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub">Jumlah Janin</div>
              <div class="invoice-subtotal"><span class="weight-600" id="jumlah_janin"></span></div>
            </li>
            <li class="clearfix">
              <div class="invoice-sub"><span class="weight-600 ">Presentasi</span></div>
              <div class="invoice-subtotal"><span class="weight-600 " id="presentasi_bayi"></span></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
      cari_data();
    });

    function cari_data(){
      var id_register = $("#id_register").val();
      $.ajax({
        type    : 'POST',
        data    : {id_register:id_register},
        url     : "kepala_data_kohort/cari_kohort",
        dataType: "json",
        success : function(data) {
          $("#tanggal").html(data.tanggal);
          $("#no_ktp").html(data.no_ktp);
          $("#nama").html(data.nama);
          $("#alamat").html(data.alamat);
          $("#usia").html(data.usia);
          $("#jamkesmas").html(data.jamkesmas);
          $("#usia_kehamilan").html(data.usia_kehamilan);
          $("#trimester").html(data.trimester);

          $("#anamnesis").html(data.anamnesis);
          $("#bb").html(data.bb);
          $("#tb").html(data.tb);
          $("#td").html(data.td);
          $("#tfu").html(data.tfu);
          $("#lila").html(data.lila);
          $("#status_gizi").html(data.status_gizi);
          $("#refleks_patella").html(data.refleks_patella);
          $("#injeksi_tt").html(data.injeksi_tt);
          $("#buku_kia").html(data.buku_kia);
          $("#fa").html(data.fa);
          $("#hb").html(data.hb);
          $("#pretein_urin").html(data.pretein_urin);
          $("#gula_darah").html(data.gula_darah);
          $("#deteksi_resiko").html(data.deteksi_resiko);
          $("#komplikasi").html(data.komplikasi);
          $("#fasilitas").html(data.fasilitas);

          $("#tglk1").html(data.tglk1);
          $("#jamk1").html(data.jamk1);
          $("#tglk2").html(data.tglk2);
          $("#jamk2").html(data.jamk2);
          $("#tglbl").html(data.tglbl);
          $("#jambl").html(data.jambl);
          $("#tglpl").html(data.tglpl);
          $("#jampl").html(data.jampl);
          $("#usia_hpht").html(data.usia_hpht);
          $("#presentasi").html(data.presentasi);
          $("#berat_bayi").html(data.berat_bayi);
          $("#cara_persalinan").html(data.cara_persalinan);
          $("#tempat").html(data.tempat);
          $("#keadaan_ibu").html(data.keadaan_ibu);
          $("#keadaan_bayi").html(data.keadaan_bayi);
          $("#komplikasi_persalinan").html(data.komplikasi_persalinan);
          $("#fasilitas_persalinan").html(data.fasilitas_persalinan);

          $("#td_nifas").html(data.td_nifas);
          $("#suhu").html(data.suhu);
          $("#komplikasi_nifas").html(data.komplikasi_nifas);
          $("#fasilitas_nifas").html(data.fasilitas_nifas);
          $("#keadaan_tiba").html(data.keadaan_tiba);
          $("#keadaan_pulang").html(data.keadaan_pulang);

          $("#djj").html(data.djj);
          $("#tbj").html(data.tbj);
          $("#pap").html(data.pap);
          $("#jumlah_janin").html(data.jumlah_janin);
          $("#presentasi_bayi").html(data.presentasi_bayi);

          $("#tgl_periksa_selanjutnya").html(data.tgl_periksa_selanjutnya);

        }
      });
    }

    function printDiv()
    {
      window.print();
    }

  </script>
  <script>
   $('#loading').removeClass('loading');
  </script>
