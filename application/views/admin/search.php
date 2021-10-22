

<div class="container">
      <div class="row">
        <div class="col-lg-12">
        	<?php if ($keyword) : ?>
        	<h4>Hasil Pencarian "<?= $keyword;?>" adalah</h4> 
          <table class="table table-responsive">
          	<tr>
          		<th>No</th>
          		<th>Nama Anak</th>
          		<th>Nama Ibu</th>
          	</tr>
          	<?php $no = 1 ;
          	foreach ($anakkeyword as $ak) : ?>
          	<tr>
          		<td><?= $no ++ ; ?></td>
          		<td><a href="<?= base_url('admin/detail/').$ak['anak_id'];?>" ><?= $ak['nama'];?></a></td>
          		<td><?= $ak['ibu'];?></td>
          	</tr>
          <?php endforeach ; ?>
      </table>

          <?php else : ?>
          	<h4>Kata pencarian belum diketik</h4>
          <?php endif ;?>

        </div>
      </div>
</div>


