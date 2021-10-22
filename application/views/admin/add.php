

<div class="container-fluid">

  <div class="row">
      <div class="col-lg-3">
        <h3>Tambah Anak</h3>
      </div>
      <div class="col-lg-3">
        <h3>Cohort Imunisasi</h3>
      </div>
</div>

     <div class="row">
        <div class="col-lg-3">   
          <form action="<?= base_url('admin/add'); ?>" method="post" >

            <div class="row">
              <div class="col-lg-6">

                <div class="form-group">
                  <label for="nama"></label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anak" >
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>

              </div>
              <div class="col-lg-6">

            <label for="ibu"></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Ny. </span>
              </div>
              <input type="text" class="form-control" name="ibu" placeholder="Nama Ibu" aria-label="ibu" aria-describedby="basic-addon1" ><br>
            </div>
              <?= form_error('ibu', '<small class="text-danger">', '</small>'); ?>

          </div>
        </div>

        <div class="row">

              <div class="col-lg-6">
            <div class="form-group">
              <label for="tanggal_lahir"></label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir Anak" >
              <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
            </div>
              </div>

              <div class="col-lg-6">
            <div class="form-group">
              <label for="jenis_kelamin"></label>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value=""> -- jenis kelamin anak -- </option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6">
          <div class="form-group">
              <label for="desa"></label>
              <select class="form-control" id="desa" name="desa" onload ="posyanduAnak()" onchange="posyanduAnak()">
                <option value=""> -- alamat desa anak -- </option>
                <?php foreach($desa as $ds): ?>
                <option value="<?= $ds['desa_id'];?>"><?= $ds['desa'];?></option>
              <?php endforeach ;?>
              </select>
              <?= form_error('desa', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label for="posyandu"></label>
              <select class="form-control" id="posyandu" name="posyandu">
                <option value=""> -- posyandu anak -- </option>
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
                <option value=""> -- tahun sasaran -- </option>
                <option value="2020">Tahun 2020</option>
                <option value="2021">Tahun 2021</option>
                <option value="2022">Tahun 2022</option>
                <option value="2023">Tahun 2023</option>
                <option value="0">Pendatang</option>
              </select>
              <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>

          <div class="col-lg-6 text-right">
        <button type="submit" class="btn btn-primary mt-4">Tambah</button>
              </div>
        </div>

          </form>
        </div>


<div class="col-lg-9 mt-4">
        
      

<!-- ISI TABEL --> 
                <table class="table table-hover table-responsive  text-center">
                    <thead>
                      <tr>
                        <?php foreach ( $imunisasi as $imun ): ?>
                        <th scope="col"><?= $imun['imunisasi']; ?><br><?= $imun['batas_usia']; ?></th>
                      <?php endforeach ;?>
                      </tr>
                    </thead>
                    <tbody>

                      <tr class="pl-0 pr-0">
                        <td scope="col" class=""></td>               
                      </tr>
                    </tbody>
                  </table>               
<!-- AKHIR ISI TABLE -->
        </div>

    </div>

</div>

