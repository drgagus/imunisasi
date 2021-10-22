
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

            <ul class="nav nav-tabs" id="myTab" role="tablist">

              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Anak</a>
              </li>

             
              <?php foreach ($desa as $ds): ?>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="desa-tab<?= $ds['desa_id']; ?>" data-toggle="tab" href="#desa<?= $ds['desa_id']; ?>" role="tab" aria-controls="desa<?= $ds['desa_id']; ?>" aria-selected="false"><?= $ds['desa']; ?></a>
              </li>
            <?php endforeach ;?>

            </ul>
            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                  <div class="container-fluid">
                    <div class="row mt-3">

<?php foreach ($desa as $ds) : ?>
                      <div class="col-lg-4">
                  <h3 class="mt-3 mb-3"><?= $ds['desa'];?></h3>
<?php
      $desa_id =  $ds['desa_id'];
      
      $queryAnakByDesa = "    SELECT *
                        FROM `data_anak`
                       WHERE `data_anak`.`desa` = $desa_id
                    ";
      $anakByDesa = $this->db->query($queryAnakByDesa)->result_array();
      ?>
                  
                  <table class="table table-hover table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Anak</th>
                        <th scope="col">Nama Ibu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1 ;?>
                      <?php foreach($anakByDesa as $anakDesa): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <th scope="col"><a href="<?= base_url('admin/detail/').$anakDesa['anak_id'];?>"><?= $anakDesa['nama']; ?></a></th>
                        <td scope="col">Ny. <?= $anakDesa['ibu']; ?></td>
                      </tr>
                    <?php endforeach ;?>
                    </tbody>
                  </table>
                      </div>
<?php endforeach ;?>


                    </div>
                  </div>

              </div>

              <?php foreach ($desa as $ds) : ?>
              <div class="tab-pane fade" id="desa<?= $ds['desa_id']; ?>" role="tabpanel" aria-labelledby="desa-tab<?= $ds['desa_id']; ?>">
<!-- ISI TABEL -->


<?php
      $desa_id =  $ds['desa_id'];
      
      $queryAnak = "    SELECT *
                        FROM `data_anak`
                       WHERE `data_anak`.`desa` = $desa_id
                    ";
      $anak = $this->db->query($queryAnak)->result_array();
      ?>
                <h3 class="mt-3 mb-3">Data Anak dan Imunisasi</h3>
<?php if ($anak) : ?>
                <table class="table table-hover table-responsive">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Anak</th>

                      <?php foreach ( $imunisasi as $imun ): ?>
                        <th scope="col" class="text-center"><?= $imun['imunisasi']; ?><br><?= $imun['batas_usia']; ?></th>
                      <?php endforeach ;?>
                        <th scope="col" class="text-center">Persentase<br>IDL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1 ;?>
<?php foreach($anak as $ank): ?>
                      <tr>
                        <th><?= $no++ ?></th>
                        <th><a href="<?= base_url('admin/detail/').$ank['anak_id'];?>"><?= $ank['nama']; ?></a><br>
    <?php
      $lahir = $ank['tanggal_lahir'] ;
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
    ?>
                        </th>
<?php $persentase = 0 ;
foreach ( $imunisasi as $imun ): ?>                    
                        <td scope="col" class="text-center">
        <?php 
              $imunid = $imun['imun_id']; 
              $anakid = $ank['anak_id']; 

              $queryimunisasi = "    SELECT *
                                    FROM `kunjungan`
                                   WHERE `kunjungan`.`anak` = $anakid
                                   AND `kunjungan`.`imunisasi` = $imunid
                                ";
              $kunjungan = $this->db->query($queryimunisasi)->row_array();
              if ($kunjungan){
                                  if ($imunid == 1 OR $imunid == 2 OR $imunid == 3 OR $imunid == 4 OR $imunid == 5 OR $imunid == 6 OR $imunid == 7 OR $imunid == 8 OR $imunid == 9 OR $imunid == 11){
                                    $persentase++ ;
                                  }
                
                echo date('d-m-Y', strtotime($kunjungan['tanggal']));
              }else{
                echo "-";
              }
              
        ?>
                        </td>
<?php endforeach ;?>   
                        <td scope="col" class="text-center">
                          <?php 
                              echo $idl = ($persentase/10)*100 ; 
                              $queryIdl = "    UPDATE `data_anak`
                                                  SET `data_anak`.`idl` = $idl
                                                 WHERE `data_anak`.`anak_id` = $anakid
                                              "; 
                            $persenIdl = $this->db->query($queryIdl);

                          ?> %</td>               
                      </tr>
<?php endforeach ;?>
                    </tbody>
                  </table>
<?php else : ?>
  <?= 'tidak ada data anak' ;?>
<?php endif ;?>                 
<!-- AKHIR ISI TABLE -->

                </div>
            <?php endforeach ; ?>
              

            </div>
<!-- PENDATANG -->




<!-- AKHIR PENDATANG -->


        </div>
      </div>
    </div>





