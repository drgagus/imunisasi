

<div class="container">
      <div class="row">
        <div class="col-lg-6">

        	<form action="<?= base_url('admin/honorium'); ?>" method="post" >

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="tanggal_mulai">Dari tanggal</label>
                  <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                  <?= form_error('tanggal_mulai', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="tanggal_akhir">Sampai Tanggal</label>
                  <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" >
                  <?= form_error('tanggal_akhir', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
          	</div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="cost_posyandu">Honorium Posyandu</label>
                  <input type="text" class="form-control" id="cost_posyandu" name="cost_posyandu">
                  <?= form_error('cost_posyandu', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="cost_sweeping">Honorium Sweeping</label>
                  <input type="text" class="form-control" id="cost_sweeping" name="cost_sweeping" >
                  <?= form_error('cost_sweeping', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 text-right">
			        <button type="submit" class="btn btn-primary mb-2">OK</button>
			  </div>
			</div>
          
          
        </div>
      </div>
</div>

