

<div class="container-fluid">

  <div class="row">
      <div class="col-lg-3">
        <a href="<?= base_url('admin/detail/').$satuanak['anak_id'];?>" class="btn btn-primary">DETAIL</a>
        <a href="<?= base_url('admin/edit/').$satuanak['anak_id'] ;?>" class="btn btn-warning">EDIT</a>
        <a href="<?= base_url('admin/delete/').$satuanak['anak_id'] ;?>" data-toggle="modal" data-target="#exampleModal<?= $satuanak['anak_id'] ;?>" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $satuanak['anak_id'] ;?>">HAPUS</a>
        <a href="<?= base_url('admin/imunisasi/').$satuanak['anak_id'];?>" class="btn btn-primary">IMUNISASI</a>
      </div>
</div>

      <div class="row">
        <div class="col-lg-3">   
          <form action="<?= base_url('admin/edit/').$satuanak['anak_id']; ?>" method="post" >

            <div class="row">
              <div class="col-lg-6">

                <div class="form-group">
                  <label for="nama"></label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anak" value="<?= $satuanak['nama']; ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>

              </div>
              <div class="col-lg-6">

            <label for="ibu"></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Ny. </span>
              </div>
              <input type="text" class="form-control" name="ibu" placeholder="Nama Ibu" aria-label="ibu" aria-describedby="basic-addon1" value="<?= $satuanak['ibu']; ?>"><br>
            </div>
              <?= form_error('ibu', '<small class="text-danger">', '</small>'); ?>

          </div>
        </div>

        <div class="row">

              <div class="col-lg-6">
            <div class="form-group">
              <label for="tanggal_lahir"></label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir Anak" value="<?= $satuanak['tanggal_lahir']; ?>">
              <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
            </div>
              </div>

              <div class="col-lg-6">
            <div class="form-group">
              <label for="jenis_kelamin"></label>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option <?php echo ($satuanak['jenis_kelamin'] == 'Laki-laki') ? "selected": "" ?> value="Laki-laki">Laki-laki</option>
                <option <?php echo ($satuanak['jenis_kelamin'] == 'Perempuan') ? "selected": "" ?> value="Laki-laki">Perempuan</option>
              </select>
              <?= form_error('jeniskelamin', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6">
          <div class="form-group">
              <label for="desa"></label>
              <select class="form-control" id="desa" name="desa" onload ="posyanduAnak()" onchange="posyanduAnak()">
                <?php foreach($desa as $ds): ?>
                <option <?php echo ($satuanak['desa'] == $ds['desa_id']) ? "selected": "" ?> value="<?= $ds['desa_id'];?>" > <?= $ds['desa'];?> </option>
              <?php endforeach ;?>
              </select>
              <?= form_error('desa', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="posyandu"></label>
              <select class="form-control" id="posyandu" name="posyandu">
                <?php foreach($posyanduanak as $posyank): ?>
                <option <?php echo ($satuanak['posyandu'] == $posyank['posyandu_id']) ? "selected": "" ?> value="<?= $posyank['posyandu_id'];?>" > <?= $posyank['posyandu'];?> </option>
              <?php endforeach ;?>
              </select>
              <?= form_error('posyandu', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
              
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="form-group">
              <label for="tahun"></label>
              <select class="form-control" id="tahun" name="tahun">
                <option <?php echo ($satuanak['tahun'] == 2020 ) ? "selected": "" ?> value="2020">Tahun 2020</option>
                <option <?php echo ($satuanak['tahun'] == 2021 ) ? "selected": "" ?> value="2021">Tahun 2021</option>
                <option <?php echo ($satuanak['tahun'] == 2022 ) ? "selected": "" ?> value="2022">Tahun 2022</option>
                <option <?php echo ($satuanak['tahun'] == 2023 ) ? "selected": "" ?> value="2023">Tahun 2023</option>
                <option <?php echo ($satuanak['tahun'] == 0 ) ? "selected": "" ?> value="0">Tahun - </option>
              </select>
              <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="col-lg-6 text-right">
        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              </div>
        </div>

          </form>
        </div>
      </div>
<div class="row">
<div class="col-lg-12">
        
      

<!-- ISI TABEL -->          
<?php if ($anak) : ?>
  <h3>Kunjungan imunisasi</h3>
                <table class="table table-hover table-responsive  text-center">
                    <thead>
                      <tr>
                        <?php foreach ( $imunisasi as $imun ): ?>
                        <th scope="col"><?= $imun['imunisasi']; ?><br><?= $imun['batas_usia']; ?></th>
                      <?php endforeach ;?>
                      <th scope="col">Persentase<br>IDL</th>
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
                -
        <?php endif ;?>
        
                        </td>
<?php endforeach ;?>    
                      <td scope="col" class=""><?= $satuanak['idl'];?> %</td>              
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

