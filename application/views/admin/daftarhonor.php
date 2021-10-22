

<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <hr>
          <h3>Daftar Honor Petugas </h3>
          <h4>Dari tanggal <?= date('d-m-Y', strtotime($tanggalmulai)) ;?> sampai tanggal <?= date('d-m-Y', strtotime($tanggalakhir)) ;?> </h4>
          <hr>
        </div>
      </div>

    <div class="row">
        <div class="col-lg-6">

        	
          <?php foreach ($nakes as $ns) : ?>
          <?php   $totalhonor = 0 ;
                  $nakes_id = $ns['nakes']; 
                  $querynakes = "    SELECT *
                                      FROM `user`
                                     WHERE `user`.`user_id` = $nakes_id
                                          ";
                        $petugas = $this->db->query($querynakes)->row_array();  
          ?>
          <h4><?= $petugas['nama']; ?></h4>
          <table class="table table-hover table-responsive">
                          <thead>
                            <tr>
                              <th scope="col" class="">No.</th>
                              <th scope="col" class="">Tanggal Turun</th>
                              <th scope="col" class="text-center">Posyandu/Sweeping</th>
                              <th scope="col" class="text-center">Honor</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1 ;?>
                  <?php   $nakes_id = $ns['nakes']; 
$tanggalturun = $this->admin_model->getTanggalH($nakes_id,$tanggalmulai,$tanggalakhir);
?>
<?php foreach ($tanggalturun as $tt) : ?>
                            <tr>
                              <th ><?=$no++ ;?></th>
                              <td><?= date('d-m-Y', strtotime($tt['tanggal'])); ?></td>
                              <td class="text-center">
<?php   $nakes_id = $ns['nakes'];
        $ttt =  $tt['tanggal'] ;
$posyanduturun = $this->admin_model->getPosyanduH($nakes_id,$ttt,$tanggalmulai,$tanggalakhir);
$honor = 0 ;
foreach ($posyanduturun as $pt) :
  $namaPosyanduById = $this->admin_model->namaPosyanduById($pt['posyandu']);
          if ($pt['posyandu'] == 100 ) {
              $honor += $costsweeping ;
          }else{
              $honor += $costposyandu ;
          }
  echo $namaPosyanduById['posyandu'].'<br>';
endforeach ;
$totalhonor += $honor ;
?>
                              </td>
                              <td class="text-center">Rp. <?= number_format($honor, 0, ",", "."); ?>,-</td>

                            </tr>
                            <?php endforeach ; ?>
                            <tr><td></td><td>Total honorium</td><td></td><td>Rp. <?= number_format($totalhonor, 0, ",", "."); ?>,-</td></tr>
                          </tbody>
                        </table>
                        <br>
                        <?php endforeach ;?>
          
        </div>
      </div>
</div>

