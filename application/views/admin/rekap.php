

<div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
            			<a href="<?= base_url('admin/rekapitulasi/').(date('Y')); ?>" class="btn btn-primary">Tahun <?= date('Y') ?></a>
                        <a href="<?= base_url('admin/rekapitulasi/').(date('Y')-1); ?>" class="btn btn-primary">Tahun <?= date('Y')-1 ?></a>
                        <a href="<?= base_url('admin/rekapitulasi/').(date('Y')-2); ?>" class="btn btn-primary">Tahun <?= date('Y')-2 ?></a>
                        <a href="<?= base_url('admin/rekapitulasi/').(date('Y')-3); ?>" class="btn btn-primary">Tahun <?= date('Y')-3 ?></a>
        </div>
      </div>
</div>

