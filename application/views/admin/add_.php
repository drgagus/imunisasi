

<div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">   
          <form action="<?= base_url('admin/add'); ?>" method="post" >

            <div class="row">
              <div class="col-lg-6">

                <div class="form-group">
                  <label for="nama">Nama Anak</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anak" value="<?= set_value('nama'); ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
                

              </div>
              <div class="col-lg-6">


            <label for="ibu">Nama Ibu</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Ny. </span>
              </div>
              <input type="text" class="form-control" name="ibu" placeholder="Nama Ibu" aria-label="ibu" aria-describedby="basic-addon1" value="<?= set_value('ibu'); ?>"><br>
            </div>
              <?= form_error('ibu', '<small class="text-danger">', '</small>'); ?>



          </div>
        </div>

        <div class="row">
              <div class="col-lg-3">

            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir Anak</label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir Anak" value="<?= set_value('tanggal_lahir'); ?>">
              <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
            </div>

              </div>
              <div class="col-lg-6">

            <div class="form-group">
              <label for="desa">Alamat</label>
              <select class="form-control" id="desa" name="desa">
                <option value=""> -- pilih desa -- </option>
                <?php foreach($desa as $ds): ?>
                <option value="<?= $ds['desa_id'];?>"><?= $ds['desa'];?></option>
              <?php endforeach ;?>
              </select>
              <?= form_error('desa', '<small class="text-danger">', '</small>'); ?>
            </div>

          </div>
          <div class="col-lg-3">

            <div class="form-group">
              <label for="tahun">Sasaran Tahun</label>
              <select class="form-control" id="tahun" name="tahun">
                <option value=""> -- pilih tahun -- </option>
                <option value="2020">Tahun 2020</option>
                <option value="2021">Tahun 2021</option>
                <option value="2022">Tahun 2022</option>
                <option value="2023">Tahun 2023</option>
                <option value="0">Pendatang</option>
              </select>
              <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
            </div>

              </div>
        </div>

        <div class="row">
              <div class="col-lg-12 text-right">
        <button type="submit" class="btn btn-primary mb-2">Tambah</button>
              </div>
        </div>

          </form>
        </div>
      </div>
</div>

