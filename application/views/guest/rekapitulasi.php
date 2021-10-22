
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

            <ul class="nav nav-tabs" id="myTab" role="tablist">

              <li class="nav-item" role="presentation">
                <a class="nav-link active border border-info border-bottom-0" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Persentase IDL</a>
              </li>

             
              <?php foreach ($desa as $ds): ?>
              <li class="nav-item" role="presentation">
                <a class="nav-link border border-info border-bottom-0" id="desa-tab<?= $ds['desa_id']; ?>" data-toggle="tab" href="#desa<?= $ds['desa_id']; ?>" role="tab" aria-controls="desa<?= $ds['desa_id']; ?>" aria-selected="false"><?= $ds['desa']; ?></a>
              </li>
            <?php endforeach ;?>

            </ul>

            <div class="tab-content border border-info" id="myTabContent">

              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<!-- TAB HOME -->
                  <div class="container-fluid">

                    <div class="row mt-3">
                      <div class="col-lg-6">
                            <p>Menurut Kemenkes, Imunisasi Dasar Lengkap merupakan penyuntikkan vaksin tertentu yang diberikan kepada bayi sesuai dengan usianya. Berikut jadwal imunisasi dasar lengkap yang dapat diikuti oleh orangtua:</p>
                                <ul class="ml-5">
                                <li>Bayi berusia kurang dari 24 jam: imunisasi Hepatitis B (HB-0)</li>
                                <li>Bayi usia 1 bulan: BCG dan Polio 1</li>
                                <li>Bayi usia 2 bulan: DPT-HB-Hib 1, Polio 2</li>
                                <li>Bayi usia 3 bulan: DPT-HB-Hib 2 dan Polio 3</li>
                                <li>Bayi usia 4 bulan: DPT-HB-Hib 3, Polio 4</li>
                                <li>Bayi usia 9 bulan: Campak atau MR</li>
                              </ul>
                      </div>
                    </div>
 <!-- ---------------------- REKAP IDL ------------------------------ -->

                    <div class="row mt-3">
                      <div class = "col-lg-6">
<h3>Persentase IDL Kecamatan Bunguran Utara Tahun <?= $tahunsasaran;?></h3>
                      <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col" class="">No.</th>
                              <th scope="col" class="">Nama Desa</th>
                              <th scope="col" class="text-center">Jumlah IDL<br>( Anak )</th>
                              <th scope="col" class="text-center">Jumlah Sasaran<br>( Anak )</th>
                              <th scope="col" class="text-center">IDL<br>( persen )</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1 ;?>
                  <?php foreach ($desa as $ds) : ?>
                            <tr>
                              <th scope="row"><?= $no++ ;?></th>
<?php  
              $desa_id = $ds['desa_id']; 

              $queryidldesa = "    SELECT *
                                    FROM `data_anak`
                                   WHERE `data_anak`.`desa` = $desa_id
                                   AND `data_anak`.`idl` = 100
                                   AND `data_anak`.`tahun` = $tahunsasaran
                                ";
              $idldesa = $this->db->query($queryidldesa)->result_array();

              // ===================================================================
              
              $queryalldesa = "    SELECT *
                                    FROM `data_anak`
                                   WHERE `data_anak`.`desa` = $desa_id
                                   AND `data_anak`.`tahun` = $tahunsasaran
                                ";
              $alldesa = $this->db->query($queryalldesa)->result_array();

              if (count($alldesa) == 0 ){
                    $persentaseIDLDesa = " - " ;
              }else{
                    $persentaseIDLDesa = ( (count($idldesa))/(count($alldesa)) * 100);
              }
              
?>
                              <td><?= $ds['desa'];?></td>
                              <td class="text-center"><?= count($idldesa) ;?></td>
                              <td class="text-center"><?= count($alldesa) ;?></td>
                              <td class="text-center"><?= $persentaseIDLDesa;?></td>
                            </tr>
                  <?php endforeach ; ?>
                            <tr>
<?php  
              

              $queryidlkec = "    SELECT *
                                    FROM `data_anak`
                                   WHERE `data_anak`.`idl` = 100
                                   AND `data_anak`.`tahun` = $tahunsasaran
                                ";
              $idlkec = $this->db->query($queryidlkec)->result_array();

              // ===================================================================
              
              $queryallkec = "    SELECT *
                                    FROM `data_anak`
                                  WHERE `data_anak`.`tahun` = $tahunsasaran
                                ";
              $allkec = $this->db->query($queryallkec)->result_array();

              if (count($allkec) == 0 ){
                    $persentaseIDLKec = " - " ;
              }else{
                    $persentaseIDLKec = ( (count($idlkec))/(count($allkec)) * 100);
              }
              
?>
                              <th scope="row"></th>
                              <td>Kecamatan Bunguran Utara</td>
                              <td class="text-center"><?= count($idlkec);?></td>
                              <td class="text-center"><?= count($allkec);?></td>
                              <td class="text-center"><?= $persentaseIDLKec ; ?></td>
                            </tr>
                          </tbody>
                        </table>

                    </div>
                  </div>
 <!-- -------------------------------AKHIR REKAP IDL-------------------------------------- -->                   
                  </div>
<!-- AKHIR TAB HOME -->
              </div>

              <?php foreach ($desa as $ds) : ?>
              <div class="tab-pane fade" id="desa<?= $ds['desa_id']; ?>" role="tabpanel" aria-labelledby="desa-tab<?= $ds['desa_id']; ?>">
<!-- ISI TABEL -->


<?php
      $desa_id =  $ds['desa_id'];
      
      $queryAnak = "    SELECT *
                        FROM `data_anak`
                       WHERE `data_anak`.`desa` = $desa_id
                       AND `data_anak`.`tahun` = $tahunsasaran
                       ORDER BY `data_anak`.`tahun` DESC
                    ";
      $anak = $this->db->query($queryAnak)->result_array();
      ?>
                <h3 class="mt-3 mb-3">Persentase IDL <?= $ds['desa'];?> Tahun <?= $tahunsasaran;?></h3>
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
                        <th><?= $ank['nama']; ?><br>
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
                echo date('d-m-Y', strtotime($kunjungan['tanggal']));
              }else{
                echo "-";
              }
              
        ?>
                        </td>
<?php endforeach ;?>   
                        <td scope="col" class="text-center"><?= $ank['idl']; ?> %</td>            
                      </tr>
<?php endforeach ;?>
                    </tbody>
                  </table>
<?php else : ?>
  <?= 'tidak ada data anak' ;?>
<?php endif ;?>                 
<!-- AKHIR ISI TABLE -->
<!-- REKAPITULASI IDL -->
<?php  
              $desa_id = $ds['desa_id']; 

              $queryidldesa = "    SELECT *
                                    FROM `data_anak`
                                   WHERE `data_anak`.`desa` = $desa_id
                                   AND `data_anak`.`idl` = 100
                                   AND `data_anak`.`tahun` = $tahunsasaran
                                ";
              $idldesa = $this->db->query($queryidldesa)->result_array();

              // ===================================================================
              
              $queryalldesa = "    SELECT *
                                    FROM `data_anak`
                                   WHERE `data_anak`.`desa` = $desa_id
                                   AND `data_anak`.`tahun` = $tahunsasaran
                                ";
              $alldesa = $this->db->query($queryalldesa)->result_array();

              if (count($alldesa) == 0 ){
                    $persentaseIDLDesa = " - " ;
              }else{
                    $persentaseIDLDesa = ( (count($idldesa))/(count($alldesa)) * 100);
              }
              
?>

<!-- AKHIR REKAPITULASI IDL -->

                </div>


            <?php endforeach ; ?>

            </div>



        </div>
      </div>
    </div>





