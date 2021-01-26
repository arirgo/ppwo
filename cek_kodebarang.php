<?PHP
$grup=$_POST['pilih_id'];
if($grup=="Hardware" or $grup=="Telepon" or $grup=="Network")
{
    $kd="HW-";
}else if($grup=="Software" OR $grup=="OS")
{
    $kd="SW-";
}else 
{
    $kd="";
}

require_once("config.php");
 $sql	=	(mysqli_fetch_array(mysqli_query($koneksi," select substr(kode,-4) as angka FROM inventarisi where kode like '$kd%' ORDER BY substr(kode,-4)DESC limit 1 ")));



              
              
          //   $qkg = $this->mastermodel->tampil_query("SELECT LEFT(no_lpm, 11) AS 'kd', mid(no_lpm, 12,4) AS 'angka' FROM master_lpm WHERE no_lpm LIKE '$sie%' ORDER BY no_lpm DESC LIMIT 1")->row();
           
              if($sql=="")
             {
               $ang=0;
             }else{
              $ang =$sql['angka'];
             }
              $nomer=($ang+1);
              $hasilkode = str_pad($nomer, 4, "0", STR_PAD_LEFT);
            
            //  if($bagian=='LMN'){
              $kode=$kd.$hasilkode;

              echo $kode
              // }else{
              //   $no_lpm='';
              // }


?>