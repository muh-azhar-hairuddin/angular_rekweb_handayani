<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
<div class="clearfix">
  <div class="pull-left">
    <h4 class="text-blue">Registrasi Pasien</h4>
    <p class="mb-30 font-14"></p>
  </div>
  <div class="pull-right">
    <a href="#" class="btn btn-danger scroll-click" rel="content-y" onclick="loadPage('kepala_data_kohort');" role="button"><i class="fa fa-times-circle"></i> Close</a>
  </div>
</div>
<form name="form" id="form" enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control" type="text" name="tanggal" id="tanggal" value="<?php echo date('d-m-Y'); ?>" placeholder="Tgl" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">ID Registrasi</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control" type="text" name="id_register" id="id_register" value="<?php echo $id_register; ?>" placeholder="ID register" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">No. KTP</label>
    <div class="col-sm-12 col-md-9">
      <div class="row">
        <input class="ml-3 form-control col-md-5 col-sm-12" type="text" name="no_ktp" id="no_ktp" value="" placeholder="No. KTP" required>
        <button type="button" class="ml-3 btn btn-primary col-md-3 pull-right" name="cari" id="cari"><i class="fa fa-search"></i> Cari</button>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control" type="text" name="nama" id="nama" value="" placeholder="Nama" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
    <div class="col-sm-12 col-md-10">
      <textarea class="form-control" type="text" name="alamat" id="alamat" value="" placeholder="Alamat" readonly></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Usia (tahun)</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control" type="text" name="usia" id="usia" value="" placeholder="Usia" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Jamkesmas</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control" type="text" name="jamkesmas" id="jamkesmas" value="" placeholder="Jamkesmas">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Usia Kehamilan (hari)</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control" type="number" name="usia_kehamilan" id="usia_kehamilan" value="" placeholder="Usia Kehamilan" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-12 col-md-2 col-form-label">Trimester Ke</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control" type="number" name="trimester" id="trimester" value="" placeholder="Trimester" required>
    </div>
  </div>

  <div class="clearfix mt-5">
    <div class="pull-left">
      <h4 class="text-blue">Pengisian Kohort </h4>
      <p class="mb-30 font-14"></p>
    </div>
    <div class="pull-right">
    </div>
  </div>

  <div class="tab">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active text-blue" data-toggle="tab" href="#ibu_hamil" role="tab" aria-selected="true">Ibu Hamil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-blue" data-toggle="tab" href="#persalinan" role="tab" aria-selected="false">Persalinan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-blue" data-toggle="tab" href="#nifas" role="tab" aria-selected="false">Nifas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-blue" data-toggle="tab" href="#bayi" role="tab" aria-selected="false">Bayi</a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade show active" id="ibu_hamil" role="tabpanel">
        <div class="pd-20">
          <label class="weight-600 mt-4 mb-4">Pemeriksaan</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Anamnesis</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="anamnesis" id="anamnesis" value="" placeholder="Anamnesis">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">BB(Kg)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="bb" id="bb" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tinggi Badan(cm)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="tb" id="tb" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">TD(mmHg)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="td" id="td" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">TFU(cm)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="tfu" id="tfu" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">LILA(cm)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="lila" id="lila" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Status Gizi(M/N)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="status_gizi1" name="status_gizi" value="m" class="custom-control-input">
                <label class="custom-control-label" for="status_gizi1">M</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="status_gizi2" name="status_gizi" value="n" class="custom-control-input">
                <label class="custom-control-label" for="status_gizi2">N</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Refleks Patella(+/-)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="refleks_patella1" name="refleks_patella" value="+" class="custom-control-input">
                <label class="custom-control-label" for="refleks_patella1">+</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="refleks_patella2" name="refleks_patella" value="-" class="custom-control-input">
                <label class="custom-control-label" for="refleks_patella2">-</label>
              </div>
            </div>
          </div>

          <label class="weight-600 mt-4 mb-4">Pelayanan</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Injeksi TT</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="injeksi_tt" id="injeksi_tt" value="" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Catat di Buku KIA</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="buku_kia" id="buku_kia" value="" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Fe(Tab/Botol)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="fe" id="fe" value="" placeholder="0">
            </div>
          </div>

          <label class="weight-600 mt-4 mb-4">Laboratorium</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Hb(Gr/dl)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="hb" id="hb" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Pretein Urin(+/-)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="pretein_urin1" name="pretein_urin" value="+" class="custom-control-input">
                <label class="custom-control-label" for="pretein_urin1">+</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="pretein_urin2" name="pretein_urin" value="-" class="custom-control-input">
                <label class="custom-control-label" for="pretein_urin2">-</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Gula Darah(+/-)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="gula_darah1" name="gula_darah" value="+" class="custom-control-input">
                <label class="custom-control-label" for="gula_darah1">+</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="gula_darah2" name="gula_darah" value="-" class="custom-control-input">
                <label class="custom-control-label" for="gula_darah2">-</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Resiko Terdeteksi Oleh</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="deteksi_resiko" id="deteksi_resiko" value="" placeholder="Nakes/Non Nakes">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Komplikasi</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="komplikasi" id="komplikasi" value="" placeholder="Komplikasi">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Fasilitas Kesehatan</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="fasilitas" id="fasilitas" value="" placeholder="Fasilitas Kesehatan">
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="persalinan" role="tabpanel">
        <div class="pd-20">
          <label class="weight-700 mt-4">Waktu Persalinan</label><br>
          <label class="weight-600 mb-4">Kala I Aktif</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control date-picker" type="text" name="tglk1" id="tglk1" value="" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control time-picker" type="text" name="jamk1" id="jamk1" value="" placeholder="">
            </div>
          </div>
          <label class="weight-600 mb-4">Kala II Aktif</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control date-picker" type="text" name="tglk2" id="tglk2" value="" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control time-picker" type="text" name="jamk2" id="jamk2" value="" placeholder="">
            </div>
          </div>
          <label class="weight-600 mb-4">Bayi Lahir</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control date-picker" type="text" name="tglbl" id="tglbl" value="" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control time-picker" type="text" name="jambl" id="jambl" value="" placeholder="">
            </div>
          </div>
          <label class="weight-600 mb-4">Plasenta Lahir</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control date-picker" type="text" name="tglpl" id="tglpl" value="" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jam</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control time-picker" type="text" name="jampl" id="jampl" value="" placeholder="">
            </div>
          </div>

          <label class="weight-700 mt-4">Persalinan</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Usia HPHT</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="usia_hpht" id="usia_hpht" value="" placeholder="Usia HPHT" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Presentasi</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="presentasi" id="presentasi" value="" placeholder="Presentasi" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Berat Bayi Lahir</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="berat_bayi" id="berat_bayi" value="" placeholder="0" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Cara Persalinan</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="cara_persalinan" id="cara_persalinan" value="" placeholder="" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tempat</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="tempat" id="tempat" value="" placeholder="" >
            </div>
          </div>

          <label class="weight-700 mt-4">Keadaan</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Keadaan Ibu(M/N)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_ibu1" name="keadaan_ibu" value="m" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_ibu1">M</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_ibu2" name="keadaan_ibu" value="n" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_ibu2">N</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Keadaan Bayi(M/N)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_bayi1" name="keadaan_bayi" value="m" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_bayi1">M</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_bayi2" name="keadaan_bayi" value="n" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_bayi2">N</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Komplikasi</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="komplikasi_persalinan" id="komplikasi_persalinan" value="" placeholder="Komplikasi" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Fasilitas</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="fasilitas_persalinan" id="fasilitas_persalinan" value="" placeholder="Fasilitas" >
            </div>
          </div>




        </div>
      </div>
      <div class="tab-pane fade" id="nifas" role="tabpanel">
        <div class="pd-20">
          <label class="weight-700 mt-4">Tanda Fital</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">TD(mmHg)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="td_nifas" id="td_nifas" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Suhu</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="suhu" id="suhu" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Komplikasi</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="komplikasi_nifas" id="komplikasi_nifas" value="" placeholder="Komplikasi">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Fasilitas Kesehatan</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="fasilitas_nifas" id="fasilitas_nifas" value="" placeholder="Fasilitas Kesehatan">
            </div>
          </div>
          <label class="weight-700 mt-4">Keadaan</label>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Tiba(H/M)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_tiba1" name="keadaan_tiba" value="m" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_tiba1">M</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_tiba2" name="keadaan_tiba" value="n" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_tiba2">N</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Pulang(H/M)</label>
            <div class="col-sm-12 col-md-10">
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_pulang1" name="keadaan_pulang" value="m" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_pulang1">M</label>
              </div>
              <div class="custom-control custom-radio mb-5">
                <input type="radio" id="keadaan_pulang2" name="keadaan_pulang" value="n" class="custom-control-input">
                <label class="custom-control-label" for="keadaan_pulang2">N</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="bayi" role="tabpanel">
        <div class="pd-20">
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">DJJ(x/menit)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="djj" id="djj" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Kepala Thd PAP(M/BM)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="pap" id="pap" value="" placeholder="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">TBJ(Gr)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="tbj" id="tbj" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Jumlah Janin(T/G)</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="number" name="jumlah_janin" id="jumlah_janin" value="" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Presentasi</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" name="presentasi_bayi" id="presentasi_bayi" value="" placeholder="">
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="clearfix mt-5">
    <div class="pull-left">
      <h4 class="text-blue">Tgl Periksa Selanjutnya </h4>
      <p class="mb-30 font-14"></p>
    </div>
    <div class="pull-right">
    </div>
  </div>
  <div class="form-group row ">
    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
    <div class="col-sm-12 col-md-10">
      <input class="form-control date-picker" type="text" name="tgl_periksa_selanjutnya" id="tgl_periksa_selanjutnya" value="" placeholder="Tgl Periksa Selanjutnya" required>
    </div>
  </div>
  <div class="btn-list text-center">
    <button type="button" class="btn btn-success" onclick="loadPage('kepala_data_kohort/add');" ><i class="fa fa-plus-circle"></i> Baru</button>
		<button type="button" class="btn btn-danger" onclick="loadPage('kepala_data_kohort');"><i class="fa fa-times-circle"></i> Close</button>
		<button type="reset" class="btn btn-info"><i class="fa fa-circle-o"></i> Reset</button>
  	<button type="button" class="btn btn-primary" name="simpan" id="simpan"><i class="fa fa-check-circle"></i> Simpan</button>
	</div>
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

      $("#jamk1").click(function(e) {
        $( "#jamk1" ).timeDropper({
      		mousewheel: true,
      		meridians: false,
      		init_animation: 'dropdown',
      		setCurrentTime: true
      	});
      });

      $("#jamk2").click(function(e) {
        $( "#jamk2" ).timeDropper({
      		mousewheel: true,
      		meridians: false,
      		init_animation: 'dropdown',
      		setCurrentTime: true
      	});
      });

      $("#jambl").click(function(e) {
        $( "#jambl" ).timeDropper({
      		mousewheel: true,
      		meridians: false,
      		init_animation: 'dropdown',
      		setCurrentTime: true
      	});
      });

      $("#jampl").click(function(e) {
        $( "#jampl" ).timeDropper({
      		mousewheel: true,
      		meridians: false,
      		init_animation: 'dropdown',
      		setCurrentTime: true
      	});
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
            url     : "kepala_data_kohort/simpan",
            success : function(data) {
              $('#simpan').prop('disabled', false).html('<i class="fa fa-check-circle"></i> Simpan');
              alert(data);
              loadPage('kepala_data_kohort');
            }
          });
        }else {
          return false();
        }

      });

      $("#cari").click(function(e) {
        var no_ktp = $('#no_ktp').val();
        e.preventDefault();
          $('#cari').prop('disabled', true).text('diProses...');
          $.ajax({
            type    : 'POST',
            data    : {no_ktp:no_ktp},
            url     : "kepala_data_kohort/cari_no_ktp",
            dataType: "json",
            success : function(data) {
              $('#cari').prop('disabled', false).html('<i class="fa fa-search"></i> Cari');
              $('#nama').val(data.nama);
              $('#alamat').html(data.alamat);
              $('#usia').val(data.usia);
            }
          });

      });

    });
  </script>
  <script>
   $('#loading').removeClass('loading');
  </script>
