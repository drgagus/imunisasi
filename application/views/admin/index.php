

<div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <h3>Kunjungan Posyandu Bulan 
          	<?php 
          			if ($bulan == '01')
	          			{
	          				echo 'Januari' ;
	          			}
	          		elseif ($bulan == '02' )
		          		{
		          			echo 'Februari';
		          		}
		          	elseif ($bulan == '03' )
		          		{
		          			echo 'Maret';
		          		}
		          	elseif ($bulan == '04' )
		          		{
		          			echo 'April';
		          		}
		          	elseif ($bulan == '05' )
		          		{
		          			echo 'Mei';
		          		}
		          	elseif ($bulan == '06' )
		          		{
		          			echo 'Juni';
		          		}
		          	elseif ($bulan == '07' )
		          		{
		          			echo 'Juli';
		          		}
		          	elseif ($bulan == '08' )
		          		{
		          			echo 'Agustus';
		          		}
		          	elseif ($bulan == '09' )
		          		{
		          			echo 'September';
		          		}
		          	elseif ($bulan == '10' )
		          		{
		          			echo 'Oktober';
		          		}
		          	elseif ($bulan == '11' )
		          		{
		          			echo 'November';
		          		}
		          	elseif ($bulan == '12' )
		          		{
		          			echo 'Desember';
		          		}
		          	else
			          	{

			          	}
          	?>
          	 Tahun <?= $tahun;?></h3>      
        </div>
      </div>
</div>

