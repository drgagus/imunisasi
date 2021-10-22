<div class="container-fluid">

	<div class="row">
      <div class="col-lg-3">
        <a href="<?= base_url('admin/detail/').$satuanak['anak_id'];?>" class="btn btn-primary">DETAIL</a>
        <a href="<?= base_url('admin/edit/').$satuanak['anak_id'] ;?>" class="btn btn-warning">EDIT</a>
        <a href="<?= base_url('admin/delete/').$satuanak['anak_id'] ;?>" data-toggle="modal" data-target="#exampleModal<?= $satuanak['anak_id'] ;?>" class="btn btn-danger" class="badge badge-danger"  data-toggle="modal" data-target="#exampleModal<?= $satuanak['anak_id'] ;?>">HAPUS</a>
      </div>
      <div class="col-lg-3">
        <a href="<?= base_url('admin/imunisasi/').$satuanak['anak_id'];?>" class="btn btn-primary">IMUNISASI</a>
      </div>
</div>
      <?= $this->session->flashdata('message'); ?>

<div class="row mb-3 mt-3">
        <div class="col-lg-3">

    <ul class="list-group list-group-flush">
		  <li class="list-group-item"><?= $satuanak['nama']; ?> / Ny. <?= $satuanak['ibu']; ?></li>
      <li class="list-group-item"><?= date('d-m-Y', strtotime($satuanak['tanggal_lahir'])); ?> / 
<?php
      $lahir = $satuanak['tanggal_lahir'] ;
      $tgl_lahir= date('d', strtotime($lahir));
      $bln_lahir= date('m', strtotime($lahir));
      $thn_lahir= date('Y', strtotime($lahir));
      $tgl_today = date('d');
      $bln_today= date('m');
      $thn_today = date('Y');
      
      if ($tgl_today >= $tgl_lahir) {
        $hari = $tgl_today - $tgl_lahir ; 
          if ($bln_today >= $bln_lahir) {
            $bulan = $bln_today - $bln_lahir ;
            $tahun = $thn_today - $thn_lahir ;
          }else if ($bln_today < $bln_lahir) {
            $bulan = ($bln_today + 12 )  - $bln_lahir ; 
            $tahun = ($thn_today - 1 ) - $thn_lahir ;
          }else{ 
          }
      }else if ($tgl_today < $tgl_lahir) {
        $hari = ($tgl_today + 30 )  - $tgl_lahir ;
          if (($bln_today-1) >= $bln_lahir) {
            $bulan = ($bln_today-1) - $bln_lahir ;
            $tahun = $thn_today - $thn_lahir ;
          }else if (($bln_today-1) < $bln_lahir) {
            $bulan = ($bln_today+11) - $bln_lahir ;
            $tahun = ($thn_today-1) - $thn_lahir ;
          }else{
          }
      }else{
      }

      echo $tahun.' Tahun '.$bulan.' Bulan '.$hari.' Hari';
       ?></li>
		  <li class="list-group-item border-bottom"><?= $satuanak['desa']; ?></li>
      <li class="list-group-item border-bottom">Sasaran Tahun <?= $satuanak['tahun']; ?></li>
		</ul>


	</div>

        <div class="col-lg-9">


<!-- ISI kunjungan --> 
<form action="<?= base_url('admin/editkunjungan/').$satuanak['anak_id'].'/'.$kunjungan['id'];?>" method="post">
<input type="hidden"  id="anak" name="anak" value="<?= $kunjungan['anak'] ;?>">

<div class="row">
  <div class="col-lg-3">
              <div class="form-group">
              <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $kunjungan['tanggal']; ?>">
              <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
            </div>
  </div>
  <div class="col-lg-3">
              <div class="form-group">
              <select class="form-control" id="imunisasi" name="imunisasi">
                <?php foreach($imunisasi as $imun): ?>
                <option <?php echo ($kunjungan['imunisasi'] == $imun['imun_id']) ? "selected": "" ?> value="<?= $imun['imun_id'];?>" ><?= $imun['imunisasi'];?></option>
                <?php endforeach ;?>
              </select>
              <?= form_error('imunisasi', '<small class="text-danger">', '</small>'); ?>
              </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3">
              <div class="form-group">
              <select class="form-control" id="posyandu" name="posyandu">
                <?php foreach($posyandu as $posy): ?>
                <option <?php echo ($kunjungan['posyandu'] == $posy['posyandu_id']) ? "selected": "" ?> value="<?= $posy['posyandu_id'];?>" ><?= $posy['posyandu'];?></option>
                <?php endforeach ;?>
                <option <?php echo ($kunjungan['posyandu'] == 0 ) ? "selected": "" ?> value="0">Bidan/Dokter Penolong Lahiran</option>
              </select>
              <?= form_error('posyandu', '<small class="text-danger">', '</small>'); ?>
              </div>
  </div>
  <div class="col-lg-3">
              <div class="form-group">
              <select class="form-control" id="nakes" name="nakes">
                <?php foreach($nakes as $ns): ?>
                <option <?php echo ($kunjungan['nakes'] == $ns['user_id']) ? "selected": "" ?> value="<?= $ns['user_id'];?>" ><?= $ns['nama'];?></option>
              <?php endforeach ;?>
              </select>
              <?= form_error('nakes', '<small class="text-danger">', '</small>'); ?>
              </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 text-right">
              <button type="submit" class="btn btn-primary mb-2">Edit Kunjungan</button>    
  </div>
</div>       
</form>      
<!-- AKHIR ISI kunjungan -->
          
          
        </div>
      </div>
</div>

