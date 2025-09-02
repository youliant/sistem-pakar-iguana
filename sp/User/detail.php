
  <?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Diagnosa </h1>
      <nav>
        <ol class="breadcrumb">
      
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <section class="section">
      <div class="row">
        <div class="col-lg-12">


              <?php



   if(isset($_POST['simpan'])){

$no_ip = $_SERVER['REMOTE_ADDR'];
$nama = $_POST['nama'];
$nama_iguana = $_POST['nama_iguana'];

$umur_iguana = $_POST['umur_iguana'];
$alamat = $_POST['alamat'];

$penyakit = $_POST['penyakit'];


$tgl_diagnosa = date( 'Y-m-d' );

//script validasi data
 

    mysqli_query($koneksi, "INSERT INTO hasil (no_ip, nama,nama_iguana,umur_iguana,alamat,penyakit,tgl_diagnosa) VALUES ('$no_ip', '$nama', '$nama_iguana', '$umur_iguana', '$alamat', '$penyakit', '$tgl_diagnosa')");


    $delete = mysqli_query( $koneksi, "DELETE FROM riwayat WHERE no_ip='$_SERVER[REMOTE_ADDR]'" );

    echo "<script>window.alert('hasil ok ')
    window.location='index.php'</script>";
    }
    
    ?>

      <?php 
 

  if (isset($_POST['submited'])) {

    $selected = (array) $_POST['select'];
    $rowsa = mysqli_query($koneksi, "SELECT kd_gejala, gejala FROM gejala WHERE kd_gejala IN ('".implode("','", $selected)."')");
    $as = mysqli_fetch_assoc($rowsa);

 


  $sql_row = "SELECT COUNT(relasi.kd_gejala) as rowspan, relasi.kd_gejala, relasi.nilai ,penyakit.* FROM relasi INNER JOIN penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit WHERE kd_gejala IN  ('".implode("','", $selected)."') GROUP BY relasi.kd_penyakit";
    // echo($sql_row);
    $data_row = mysqli_query($koneksi, $sql_row) ;

    $sql = "SELECT relasi.kd_gejala, relasi.nilai ,penyakit.* FROM relasi INNER JOIN penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit WHERE kd_gejala IN  ('".implode("','", $selected)."')";
    // echo($sql);
    $data = mysqli_query($koneksi, $sql) ;

    $as = mysqli_fetch_assoc($data);

 $hasil_perkalian = [];
    

                                        

        
   

  
    
   
             }    

   

?>

         
 
         

       

         

          <div class="card">
            <div class="card-body">


              <form id="select" method="POST" action="detail.php" >
          
                         <table id="" class="table">
                                          <thead>
                                            <tr>
                                                <th>No</th>

                                                <th>Kode Gejala</th>
                                                <th>Nama Gejala</th>

                                               
                                                        
                                            </tr>
                                        </thead>
                                        <?php 
                                          $i=1;
                                          foreach ($rowsa as $key) 



                                          {
                                            echo "<tr>";
                                            echo "<td>".$i++."</td>";
                                            echo "<td>".$key['kd_gejala']."</td>";
                                            echo "<td>".$key["gejala"]."</td>";

                                            echo "</tr>";
                                          }
                                        ?>

            
                                        </tbody>
                                       
                                    </table>
                                       
                                </div>
            <!--Tambah Modal -->
                 
                    </div>
                </div>
              </div>
              <!-- /.card-body -->

               <div class="card">
            <div class="card-body">


              <form id="select" method="POST" action="detail.php" >

                <br>
             



                              

                                 
                              <table id="" class="table">
                                          <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama penyakit</th>
                                                <th>Nama Gejala</th>
                                           
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <?php 
    
                                          $no=1;
                                          $hasil_semua = [];
                                  
                                          $rowspan = 1;
                                          
                                         

                                          foreach ($data_row as $key_row) {

                                      
                                         
                                            $hasil_semua[] = [
                                                'kd_penyakit' => $key_row["kd_penyakit"],
                                                'penyakit' => $key_row["penyakit"],
                                                'info_penyakit' => $key_row["info_penyakit"],
                                                'solusi' => $key_row["solusi"],
                                            ];

                                            foreach ($data as $key) {
                                            
                                              if($key_row['kd_penyakit'] == $key['kd_penyakit']){
                                        ?>

            <tr>

                                            <?php
                                              if($key_row['kd_gejala'] == $key['kd_gejala']){
                                            ?>
                                            
                                            <td rowspan="<?= $key_row["rowspan"] ?>">
                                                <center>
                                                    <?= $no++; ?>
                                                </center>
                                            </td>
                                            <td rowspan="<?= $key_row["rowspan"] ?>">
                                                <left>
                                                    <?= $key['penyakit'];?>
                                                </left>
                                            </td>
                                           
                                            <?php
                                                }
                                            ?>

                                            <td>
                                                <center>
                                                    <?= $key['kd_gejala'];?>
                                                </center>
                                            </td>
                                        

                                            <?php
                                                if($key_row['kd_gejala'] == $key['kd_gejala']){  

                                            ?>
                                            <td rowspan="<?= $key_row["rowspan"] ?>">
                                                  <?php 
                                                  // $key_row["rowspan"] * jumlah penyakit pada tabel relasi
                                                  // jika kd_penyakit pada tabel relasi sama dengan $key['kd_penyakit'] maka jumlah seluruh penyakit bercode $key['kd_penyakit'] pada tabel relasi
                                                  $jumlah_penyakit = mysqli_query($koneksi, "SELECT COUNT(kd_penyakit) as jumlah_penyakit FROM relasi WHERE kd_penyakit = '".$key['kd_penyakit']."'");
                                                  $jumlah_penyakit = mysqli_fetch_assoc($jumlah_penyakit);
                                                  $jumlah_penyakit = $jumlah_penyakit['jumlah_penyakit'];
                                                  // $key_row["rowspan"] * jumlah penyakit pada tabel relasi
                                                  $total = $key_row["rowspan"] / $jumlah_penyakit * 100;
                                                  $total = number_format($total);
                                                  $totalArray[] = [
                                                      'kd_penyakit' => $key['kd_penyakit'],
                                                      'total' => $total,
                                                      'penyakit' => $key_row["penyakit"],
                                                      'info_penyakit' => $key_row["info_penyakit"],
                                                      'solusi' => $key_row["solusi"],
                                                  ];
                                                  ?>
                                                 
                                                <center>
                                                    <?= $total ?> %
                                                </center>
                                            </td>
                                            
                                            <?php
                                                }
                                            ?>

                                            
                                        </tr>
                                      <?php
                                                }
                                                
                                                $rowspan = $key_row["rowspan"];
                                            }
                                        }
                                      
                                       
                                        ?>

                              

                                    </tbody>
                                   
                                </table>
                                        </tbody>
                                       
                                    </table>
   
                                       
                                </div>
            <!--Tambah Modal -->
                 
                    </div>




              
 <table id="" class="table">


                                          <thead>

                                         

                                                 <?php

                                                 $no_ipx = $_SERVER['REMOTE_ADDR'];

            $query = mysqli_query($koneksi, "SELECT * from riwayat WHERE no_ip='$no_ipx'");
            $data  = mysqli_fetch_array($query);

            ?>
            
                                             <?php
// Mengurutkan array $hasil_semua berdasarkan nilai total secara menurun
usort($totalArray, function($a, $b) {
    return $b['total'] <=> $a['total'];
});

$terbesar = $totalArray[0]; // Mendapatkan data dengan nilai total terbesar

// Menampilkan kesimpulan
echo "<tr>";
echo "<td colspan='4'>Kesimpulan berdasarkan nilai total terbesar:</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>nama:</td>";
echo "<td colspan='2'>" . $data['nama'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>Nama iguana:</td>";
echo "<td colspan='2'>" . $data['nama_iguana'] . "</td>";

echo "<tr>";
echo "<td colspan='2'>Umur iguana:</td>";
echo "<td colspan='2'>" . $data['umur_iguana'] . "</td>";

echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>alamat:</td>";
echo "<td colspan='2'>" . $data['alamat'] . "</td>";
echo "</tr>";


echo "<tr>";
echo "<td colspan='2'>Kode Penyakit:</td>";
echo "<td colspan='2'>" . $totalArray[0]['kd_penyakit'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>Penyakit yang di derita:</td>";
echo "<td colspan='2'>" . $totalArray[0]['penyakit'] . "</td>";

echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>Info Penyakit :</td>";
echo "<td colspan='2'>" . $totalArray[0]['info_penyakit'] . "</td>";

echo "</tr>";
echo "<tr>";
echo "<td colspan='2'>Solusi:</td>";
echo "<td colspan='2'>" . $totalArray[0]['solusi'] . "</td>";
echo "</tr>";
?>
                                   
                                </table>
                   


                    


            </div>
            <!-- /.card -->
          </div>
                </tbody>
              </table>



 <form class="forms-sample" action="detail.php" method="post" >

             

<input type="hidden" class="form-control" id="penyakit" name="penyakit" value="<?php
// Mengurutkan array $hasil_semua berdasarkan nilai total secara menurun
usort($totalArray, function($a, $b) {
    return $b['total'] <=> $a['total'];
});

$terbesar = $totalArray[0]; // Mendapatkan data dengan nilai total terbesar

// Menampilkan kesimpulan


echo "" . $totalArray[0]['penyakit'] . "";


?>">

 <input name="nama" type="hidden" id="nama" value="<?php echo $data['nama']; ?>" class="form-control"autocomplete="off" required />

 <input name="nama_iguana" type="hidden" id="nama_iguana" value="<?php echo $data['nama_iguana']; ?>" class="form-control"autocomplete="off" required />

 <input name="alamat" type="hidden" id="alamat" value="<?php echo $data['alamat']; ?>" class="form-control"autocomplete="off" required />

  <input name="umur_iguana" type="hidden" id="umur_iguana" value="<?php echo $data['umur_iguana']; ?>" class="form-control"autocomplete="off" required />

              <input type = 'submit' name = 'simpan' value = 'Simpan diagnosa' class = 'btn btn-sm btn-primary' />&nbsp;

              <!-- End Bordered Table -->
   <a class="btn btn-sm btn-primary" href="cetak2.php?<?=http_build_query(array('selected' => $selected))?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
         
 
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>