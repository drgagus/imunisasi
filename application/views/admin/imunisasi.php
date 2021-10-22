<div class="container-fluid">
  <div class="row">
      <div class="col-lg-3">
        <a href="<?= base_url('admin/detail/').$satuanak['anak_id'];?>" class="btn btn-primary">DETAIL</a>
        <a href="<?= base_url('admin/edit/').$satuanak['anak_id'] ;?>" class="btn btn-warning">EDIT</a>
        <a href="<?= base_url('admin/delete/').$satuanak['anak_id'] ;?>" data-toggle="modal" data-target="#exampleModal<?= $satuanak['anak_id'] ;?>" class="btn btn-danger" class="badge badge-danger"  data-toggle="modal" data-target="#exampleModal<?= $satuanak['anak_id'] ;?>">HAPUS</a>
        <a href="<?= base_url('admin/imunisasi/').$satuanak['anak_id'];?>" class="btn btn-primary">IMUNISASI</a>
      </div>
</div>

	<div class="row">
        <div class="col-lg-3">

<form action="<?= base_url('admin/imunisasi/').$satuanak['anak_id'] ;?>" method="post">
<input type="hidden"  id="anak" name="anak" value="<?= $satuanak['anak_id'] ;?>">

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
		  <li class="list-group-item border-bottom"><?= $satuanak['desa']; ?> / Posyandu <?= $satuanak['posyandu']; ?></li>
      <li class="list-group-item border-bottom">Sasaran Tahun <?= $satuanak['tahun']; ?></li>
		</ul>


	</div>

  <div class="col-lg-3">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <select class="form-control" id="posyandu" name="posyandu">
                <option value=""> -- pilih posyandu -- </option>
                <?php foreach($posyandu as $posy): ?>
                <option value="<?= $posy['posyandu_id'];?>"><?= $posy['posyandu'];?></option>
                <?php endforeach ;?>
                <option value="0">Bidan/Dokter Penolong Lahiran</option>
              </select>
              <?= form_error('posyandu', '<small class="text-danger">', '</small>'); ?>
      </li>
      <li class="list-group-item">
        <select class="form-control" id="nakes" name="nakes">
                <option value=""> -- pilih Petugas -- </option>
                <?php foreach($nakes as $ns): ?>
                <option value="<?= $ns['user_id'];?>"><?= $ns['nama'];?></option>
              <?php endforeach ;?>
              </select>
              <?= form_error('nakes', '<small class="text-danger">', '</small>'); ?>
      </li>
    </ul>
  </div>

</div>

      <div class="row mt-3">
        <div class="col-lg-12">

<!-- ISI TABEL -->          
<?php if ($anak) : ?>
                <table class="table table-hover table-responsive  text-center">
                    <thead>
                      <tr>
                        <?php foreach ( $imunisasi as $imun ): ?>
                        <th scope="col"><?= $imun['imunisasi']; ?></th>
                      <?php endforeach ;?>
                        <th scope="col"> </th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr class="pl-0 pr-0">

<?php $persentase = 0 ;
foreach ( $imunisasi as $imun ): ?>                    
                        <td scope="col" class="">
        <?php 
              $imunid = $imun['imun_id']; 
              $anakid = $satuanak['anak_id']; 

              $queryimunisasi = "    SELECT *
                                    FROM `kunjungan`
                                   WHERE `kunjungan`.`anak` = $anakid
                                   AND `kunjungan`.`imunisasi` = $imunid
                                ";
              $kunjungan = $this->db->query($queryimunisasi)->row_array();  
        ?>
        <?php if ($kunjungan) : ?>
        	<?= date('d-m-Y', strtotime($kunjungan['tanggal']));?>
          <br><a href="<?= base_url('admin/editkunjungan/').$satuanak['anak_id'].'/'.$kunjungan['id'] ;?>" class="badge badge-warning mr-1"> - </a>
          <a href="<?= base_url('admin/deletekunjungan/').$kunjungan['id'] ;?>" class="badge badge-danger" onclick="return confirm('Yakin hapus kunjungan imunisasi ini?');"> x </a>
        <?php else : ?> 
        				<input type="date" class="form-control" id="tanggal" name="tanggal<?= $imun['imun_id'];?>" >
                <input type="hidden" class="form-control" id="imunisasi" name="imunisasi<?= $imun['imun_id'];?>" value="<?= $imun['imun_id'];?>">
        <?php endif ;?>
                        </td>
<?php endforeach ;?>   
                       <td scope="col"><button type="submit" class="btn btn-primary mb-5">Input</button></td> 
                                      
                      </tr>
</form>
                    </tbody>
                  </table>
<?php else : ?>
  <?= 'tidak ada data anak' ;?>
<?php endif ;?>                 
<!-- AKHIR ISI TABLE -->
          
          
        </div>
      </div>
</div>

