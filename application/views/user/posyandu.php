

<div class="container-fluid">
	<div class="row">
        <div class="col-lg-5">

       <ul class="list-group list-group-flush">
		  <li class="list-group-item"><?= $satuanak['nama']." / ".date('d-m-Y', strtotime($satuanak['tanggal_lahir'])); ?></li>
		  <li class="list-group-item">Ny. <?= $satuanak['ibu']; ?></li>
		  <li class="list-group-item"><?= $satuanak['desa']; ?></li>
		  <li class="list-group-item"></li>
		</ul>


	</div>
</div>

      <div class="row">
        <div class="col-lg-12">

<!-- ISI TABEL -->          
<?php if ($anak) : ?>
                <table class="table table-hover table-responsive  text-center">
                    <thead>
                      <tr>
                        <th scope="col">Nama Anak</th>

                      <?php foreach ( $imunisasi as $imun ): ?>
                        <th scope="col"><?= $imun['imunisasi']; ?></th>
                      <?php endforeach ;?>
                        <th scope="col"> </th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <th><?= $satuanak['nama']; ?></a></th>

<?php $persentase = 0 ;
foreach ( $imunisasi as $imun ): ?>                    
                        <td scope="col" class="p-0">
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
        <?php else : ?> 
        				<input type="date" class="form-control" id="tanggal" name="tanggal<?= $imun['imun_id'];?>" placeholder="Tanggal Imunisasi">
        <?php endif ;?>
                        </td>
<?php endforeach ;?>   
                       <td scope="col"><button type="submit" class="btn btn-primary mb-2">Input</button></td> 
                                      
                      </tr>

                    </tbody>
                  </table>
<?php else : ?>
  <?= 'tidak ada data anak' ;?>
<?php endif ;?>                 
<!-- AKHIR ISI TABLE -->
          
          
        </div>
      </div>
</div>

