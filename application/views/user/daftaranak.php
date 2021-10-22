
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

            <ul class="nav nav-tabs" id="myTab" role="tablist">

              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Imunisasi</a>
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
                      <div class="col-lg-6">
                  
                  <h3 class="mt-3 mb-3">Daftar Kunjungan</h3>

                

                      </div>
                    </div>
                  </div>

              </div>

              <?php foreach ($desa as $ds) : ?>
              <div class="tab-pane fade" id="desa<?= $ds['desa_id']; ?>" role="tabpanel" aria-labelledby="desa-tab<?= $ds['desa_id']; ?>">
<!-- ISI TABEL -->

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
                        <th scope="col"><?= $imun['imunisasi']; ?></th>
                      <?php endforeach ;?>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1 ;?>
<?php foreach($anak as $ank): ?>
                      <tr>
                        <th><?= $no++ ?></th>
                        <th><?= $ank['nama']; ?></a></th>

<?php
foreach ( $imunisasi as $imun ): ?>                    
                        <td scope="col">
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
                        <td scope="col">
                          <a href="<?= base_url('user/posyandu').'/'.$ank['desa'].'/'.$ank['anak_id'];?>" class="badge badge-info">posyandu</a>
                          <a href="<?= base_url('user/sweeping').'/'.$ank['desa'].'/'.$ank['anak_id'];?>" class="badge badge-info">sweeping</a></td>               
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



        </div>
      </div>
    </div>