
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

            <ul class="nav nav-tabs p-0" id="myTab" role="tablist">

              <li class="nav-item" role="presentation">
                <a class="nav-link active border border-info border-bottom-0" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Kunjungan Posyandu</a>
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
                    <div class="row">
                      <div class="col-lg-12"></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3">
                        Kunjungan Tahun <?= date('Y');?>
                        <ul class="">
                          <li class=""><a href="<?= base_url('admin/kunjungan/01/').date('Y');?>" class="text-decoration-none">Januari <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/02/').date('Y');?>" class="text-decoration-none">Februari <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/03/').date('Y');?>" class="text-decoration-none">Maret <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/04/').date('Y');?>" class="text-decoration-none">April <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/05/').date('Y');?>" class="text-decoration-none">Mei <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/06/').date('Y');?>" class="text-decoration-none">Juni <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/07/').date('Y');?>" class="text-decoration-none">Juli <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/08/').date('Y');?>" class="text-decoration-none">Agustus <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/09/').date('Y');?>" class="text-decoration-none">September <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/10/').date('Y');?>" class="text-decoration-none">Oktober <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/11/').date('Y');?>" class="text-decoration-none">November <?= date('Y'); ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/12/').date('Y');?>" class="text-decoration-none">Desember <?= date('Y'); ?></a></li>
                        </ul>
                      </div>
                      <div class="col-lg-3">
                        Kunjungan Tahun <?= date('Y')-1;?>
                        <ul class="">
                          <li class=""><a href="<?= base_url('admin/kunjungan/01/').(date('Y')-1);?>" class="text-decoration-none">Januari <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/02/').(date('Y')-1);?>" class="text-decoration-none">Februari <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/03/').(date('Y')-1);?>" class="text-decoration-none">Maret <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/04/').(date('Y')-1);?>" class="text-decoration-none">April <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/05/').(date('Y')-1);?>" class="text-decoration-none">Mei <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/06/').(date('Y')-1);?>" class="text-decoration-none">Juni <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/07/').(date('Y')-1);?>" class="text-decoration-none">Juli <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/08/').(date('Y')-1);?>" class="text-decoration-none">Agustus <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/09/').(date('Y')-1);?>" class="text-decoration-none">September <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/10/').(date('Y')-1);?>" class="text-decoration-none">Oktober <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/11/').(date('Y')-1);?>" class="text-decoration-none">November <?= date('Y')-1; ?></a></li>
                          <li class=""><a href="<?= base_url('admin/kunjungan/12/').(date('Y')-1);?>" class="text-decoration-none">Desember <?= date('Y')-1; ?></a></li>
                        </ul>
                      </div>
                    </div>

                  </div>

              </div>

              <?php foreach ($posyandu as $posy) : ?>
              <div class="tab-pane fade" id="posyandu<?= $posy['posyandu_id']; ?>" role="tabpanel" aria-labelledby="posyandu-tab<?= $posy['posyandu_id']; ?>">
<!-- ISI TABEL -->
                <h3 class=""></h3>
<?php
$tanggalturun = $this->admin_model->thisMonth($bulan,$tahun,$posy['posyandu_id']);
?>
<?php if ($tanggalturun) : ?>

<?php foreach ($tanggalturun as $tt): ?>
<h4>Tanggal <?= date('d-m-Y',strtotime($tt['tanggal'])); ?></h4>

<?php
$anakkunjungan = $this->admin_model->getAnakByPosyanduByDate($posy['posyandu_id'],$tt['tanggal']);
?>
              
                <table class="table table-hover table-responsive ml-5">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Imunisasi</th>
                        <th scope="col">Nama Petugas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ;?>
                      <?php foreach($anakkunjungan as $ak) : ?>
                      <tr>
                        <th><?= $no++ ;?></th>
                        <td><a href="<?= base_url('admin/detail/').$ak['anak'];?>"><?php $anak = $this->admin_model->getAnakById($ak['anak']); 
                                  echo $anak['nama'];?></a></td>
                        <td><?php $imunisasi = $this->admin_model->getImunisasiById($ak['imunisasi']); 
                                  echo $imunisasi['imunisasi'];?></td>
                        <td><?php $nakes = $this->admin_model->getNakesById($ak['nakes']); 
                                  echo $nakes['nama'];?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table> 
<?php endforeach ;?>              
<!-- AKHIR ISI TABLE -->
<?php else : ?>
  Tidak ada Kunjungan
<?php endif ;?>
                </div>
            <?php endforeach ; ?>

              

            </div>



        </div>
      </div>
    </div>





