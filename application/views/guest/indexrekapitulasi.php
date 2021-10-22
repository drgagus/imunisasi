
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

            <ul class="nav nav-tabs" id="myTab" role="tablist">

              <li class="nav-item" role="presentation">
                <a class="nav-link active border border-info border-bottom-0" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Persentase IDL</a>
              </li>

             
              <?php foreach ($desa as $ds): ?>
              <li class="nav-item" role="presentation">
                <a class="nav-link border border-info border-bottom-0" id="desa-tab<?= $ds['desa_id']; ?>" data-toggle="tab" href="#desa<?= $ds['desa_id']; ?>" role="tab" aria-controls="desa<?= $ds['desa_id']; ?>" aria-selected="false"><?= $ds['desa']; ?></a>
              </li>
            <?php endforeach ;?>

            </ul>

            <div class="tab-content border border-info " id="myTabContent">

              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<!-- TAB HOME -->
                  <div class="container-fluid">

                    <div class="row mt-3">
                      <div class="col-lg-6">
                            <p>Menurut Kemenkes, Imunisasi Dasar Lengkap merupakan penyuntikkan vaksin tertentu yang diberikan kepada bayi sesuai dengan usianya. Berikut jadwal imunisasi dasar lengkap yang dapat diikuti oleh orangtua:</p>
                                <ul class="ml-5">
                                <li>Bayi berusia kurang dari 24 jam: imunisasi Hepatitis B (HB-0)</li>
                                <li>Bayi usia 1 bulan: BCG dan Polio 1</li>
                                <li>Bayi usia 2 bulan: DPT-HB-Hib 1, Polio 2</li>
                                <li>Bayi usia 3 bulan: DPT-HB-Hib 2 dan Polio 3</li>
                                <li>Bayi usia 4 bulan: DPT-HB-Hib 3, Polio 4</li>
                                <li>Bayi usia 9 bulan: Campak atau MR</li>
                              </ul>
                      </div>
                    </div>
                  
                  </div>
<!-- AKHIR TAB HOME -->
              </div>

              <?php foreach ($desa as $ds) : ?>
              <div class="tab-pane fade" id="desa<?= $ds['desa_id']; ?>" role="tabpanel" aria-labelledby="desa-tab<?= $ds['desa_id']; ?>">

<br><br><br><br><br><br><br><br><br><br>

                </div>


            <?php endforeach ; ?>

            </div>



        </div>
      </div>
    </div>





