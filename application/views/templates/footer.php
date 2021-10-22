<br><br><br>
<footer class="bg-dark fixed-bottom">
    <div class="container">
      <small>
      <p class="m-0 text-center text-white">Copyright &copy; Puskesmas Kelarik <?= date('Y');?></p>
      <p class="m-0 text-center text-white">Admin:M.Adlin | CreatedBy:<a href="http://www.drgagus.com" class="text-decoration-none text-white" target=_blank >drg.agus</a></p>
    </small>
    </div>
</footer>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/js/');?>jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="<?= base_url('assets/js/');?>popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="<?= base_url('assets/');?>js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="<?= base_url('assets/') ;?>js/posyandu.js"></script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Logout ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a type="button" class="btn btn-primary" href="<?= base_url('auth/logout');?>">Ya</a>
      </div>
    </div>
  </div>
</div>


    <!-- Modal -->
<?php foreach($anak as $ank): ?>
<div class="modal fade" id="exampleModal<?= $ank['anak_id'] ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Hapus Data <?= $ank['nama']; ?> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <a type="button" class="btn btn-primary" href="<?= base_url('admin/delete/').$ank['anak_id'] ;?>">Ya</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ;?>


  </body>
</html>