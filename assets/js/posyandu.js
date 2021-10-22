
	function posyanduAnak(){
	let desaid = document.getElementById("desa").value ;
	if (desaid==="100")
		{
			document.getElementById("posyandu").innerHTML ='<option value="1">Sakura</option><option value="2">Kenanga</option><option value="3">Teratai</option><option value="4">Matahari</option><option value="5">Melati</option><option value="6">Dahlia</option><option value="7">Melur</option><option value="8">Mawar</option><option value="9">Putri Malu</option><option value="10">Anggrek</option><option value="11">Kemuning</option>';
		}
	else if (desaid==="1")
		{
			document.getElementById("posyandu").innerHTML ='<option value="1">Sakura</option>';
		}
	else if (desaid==="2")
		{
			document.getElementById("posyandu").innerHTML ='<option value="2">Kenanga</option><option value="3">Teratai</option><option value="4">Matahari</option>';
		}
	else if (desaid==="3")
		{
			document.getElementById("posyandu").innerHTML ='<option value="5">Melati</option><option value="6">Dahlia</option>';
		}
		else if (desaid==="4")
		{
			document.getElementById("posyandu").innerHTML ='<option value="7">Melur</option>';
		}
	else if (desaid==="5")
		{
			document.getElementById("posyandu").innerHTML ='<option value="8">Mawar</option>';
		}
	else if (desaid==="6")
		{
			document.getElementById("posyandu").innerHTML ='<option value="9">Putri Malu</option>';
		}
		else if (desaid==="7")
		{
			document.getElementById("posyandu").innerHTML ='<option value="10">Anggrek</option>';
		}
	else if (desaid==="8")
		{
			document.getElementById("posyandu").innerHTML ='<option value="11">Kemuning</option>';
		}
	else 
		{
			document.getElementById("posyandu").innerHTML='<option value="">--gak ada pilihan--</option>';
		}
}




	