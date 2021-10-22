

<div class="container">
      <div class="row">
        <div class="col-lg-6">

        	<form action="<?= base_url('guest'); ?>" method="post" >

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="tahun">Tahun Rekapitulasi</label>
                  <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Ketik Tahun ..." >
                  <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>
          	</div>

            <div class="row">
              <div class="col-lg-6 text-right">
			        <button type="submit" class="btn btn-primary mb-2">Rekapitulasi IDL</button>
			  </div>
			</div>
          
          
        </div>
      </div>
</div>

