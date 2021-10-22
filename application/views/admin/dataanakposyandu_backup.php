
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

            <ul class="nav nav-tabs p-0" id="myTab" role="tablist">

              <li class="nav-item" role="presentation">
                <a class="nav-link active border border-info border-bottom-0" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Beranda</a>
              </li>

             
              <?php foreach ($posyandu as $posy): ?>
              <li class="nav-item" role="presentation">
                <a class="nav-link border border-info border-bottom-0" id="posyandu-tab<?= $posy['posyandu_id']; ?>" data-toggle="tab" href="#posyandu<?= $posy['posyandu_id']; ?>" role="tab" aria-controls="posyandu<?= $posy['posyandu_id']; ?>" aria-selected="false"><?= $posy['posyandu']; ?></a>
              </li>
            <?php endforeach ;?>

            </ul>

            <div class="tab-content border border-info " id="myTabContent">

              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                  <div class="container-fluid">
                    <div class="row"><h3>Posyandu yang ada di Puskesmas Kelarik :</h3></div>
                    <div class="row">
<ul class="list-group list-group-flush">
  <?php foreach ($posyandu as $posy): ?>
      <li class="list-group-item"><?= $posy['posyandu']; ?></li>
  <?php endforeach ; ?>
</ul>
                    </div>
                  </div>

              </div>

              <?php foreach ($posyandu as $posy) : ?>
              <div class="tab-pane fade" id="posyandu<?= $posy['posyandu_id']; ?>" role="tabpanel" aria-labelledby="posyandu-tab<?= $posy['posyandu_id']; ?>">
<!-- ISI TABEL -->


<?php
      $posy_id =  $posy['posyandu_id'];
      
      $queryAnak = "    SELECT *
                        FROM `data_anak`
                       WHERE `data_anak`.`posyandu` = $posy_id
                    ";
      $anak = $this->db->query($queryAnak)->result_array();
      ?>
                <h3 class="">Data Anak dan Imunisasi</h3>
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
<?php
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

                </div>
            <?php endforeach ; ?>
              

            </div>
<!-- PENDATANG -->




<!-- AKHIR PENDATANG -->


        </div>
      </div>
    </div>





