
  <?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data riwayat diagnosa </h1>
      <nav>
        <ol class="breadcrumb">
      
        </ol>
      </nav>
    </div><!-- End Page Title -->



    <section class="section">
      <div class="row">
        <div class="col-lg-12">

             <?php
             if(isset($_GET['aksi']) == 'hapus'){
        $id = $_GET['id'];
        $cek = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE id='$id'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM riwayat WHERE id='$id'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'riwayat.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>

         

          

         

         

       

         

          <div class="card">
            <div class="card-body">


               <div class="card-header">
                     <a href="cetak_laporan.php" target="_blank" class="btn btn-primary">Cetak <i class="
                    "></i></a>
              </button>

                  
              </div>

          

              <table class="table table-bordered">
                <thead>
                                              <tr>
                                                <th><left>No </center></th>

                                                   <th><left>nama user</left></th>
                                              
                        <th><left>Tanggal Diagnosa</left></th>
                        <th><left> Kesimpulan </center></th>
                           <th><left> solusi </center></th>

                            <th><left> aksi </center></th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
               <?php
                                                  include'koneksi.php';
                                                  $no = 1;
  $sql = mysqli_query($koneksi, "SELECT * from riwayat INNER JOIN  penyakit ON riwayat.penyakit = penyakit.penyakit WHERE id_user='$_SESSION[id_user]' ");

   
                                                    while($data = mysqli_fetch_array($sql)){
                          

                                                  
                                                ?>

                                            <tr class="table-white">
                                                <td><?php echo $no++;  ?></td>
                                                
                     <td><left><?php echo $data['nama'];?></left></td>
                     <td><left><?php echo $data['tgl_diagnosa'];?></left></td>
                      <td><left><?php echo $data['penyakit'];?></center></td>
                        <td><left><?php echo $data['solusi'];?></center></td>
                      
                                                <td>
                                                  <div class="btn-group">
                                                    &nbsp;
                                                    <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')"  href="riwayat.php?aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" title=""><i class="fa fa-trash">Hapus</i></a>
                                                  </div>
                                                </td>
                                            </tr>
            <!-- Edit Modal !-->
                <div id="ubah<?php echo $data['id_k']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h4 class="modal-title">Edit Data penyakit</h4>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                <?php
                                  $id_k = $data['id_k']; 
                                  $query_edit = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE id_k='$id_k'");
                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>

                                    <div class="form-group">
                                      <label class="control-label" for="kd_penyakit">Kode penyakit</label>
                                      <input type="text" name="kd_penyakit" class="form-control" id="kd_penyakit" value="<?php echo $data['kd_penyakit'] ?>" required="" readonly="">
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="penyakit">Nama penyakit</label>
                                      <input type="text" name="penyakit" class="form-control" id="penyakit" value="<?php echo $data['penyakit'] ?>" required="">
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="solusi">Solusi</label>
                                      <input type="text" name="solusi" class="form-control" id="solusi" value="<?php echo $data['solusi'] ?>" required="">
                                    </div>

                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-success" name="ubah">Update</button>
                                    </div>
                                        <?php
                                      }
                                      ?>

                            </div>

                                </form>
                            </div>
                            <?php
                                  }
                                  ?>
                                        </tbody>
                                       
                                    </table>
                                        <?php
                                          if (isset($_POST['ubah'])){
                                            $kd_penyakit = $_POST['kd_penyakit'];
                                            $penyakit = $_POST['penyakit'];
                                            $solusi = $_POST['solusi'];
                                           
                                            
                                          
                                            $ubah = mysqli_query($koneksi,"UPDATE penyakit SET penyakit='$penyakit', solusi='$solusi' WHERE kd_penyakit='$kd_penyakit' "); 
                                            if($ubah){
                                              ?>
                                              <script type="text/javascript">
                                              alert('Edit Data Berhasil');
                                                document.location.href="data_kesimpulan.php";
                                               </script>
                                               <?php
                                              }else{
                                                echo"Gagal Mengedit Data";
                                              } 
                                            
                                          }
                                        ?> 
                                </div>
            <!--Tambah Modal -->
                  <div id="tambah" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data penyakit</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <form method="POST" action="">
                                  <div class="modal-body">
                              <?php
                           
                              


// Mencari data (kode) yang paling besar (terakhir) dari database
$query = mysqli_query($koneksi, "SELECT max(kd_penyakit) as max_kode FROM penyakit");
$data = mysqli_fetch_array($query);
// Sudah dapat nih gan
$kd_penyakit = $data['max_kode'];

// Oke sekarang kita ambil bagian angkanya saja dan membuang string yang ada diawal
$no = substr($kd_penyakit, 1, 4);
// Contoh kodenya 'B0001'
// Setelah dibuang string 'B', hasilnya menjadi '0001'
// maksud substr diatas adalah mengambil 4 katakter dimulai dari index ke 1 (karakter ke-2)

// Selanjutnya kita convert ke tipe data Integer agar bisa di Increment (ditambah)
$no = (int) $no;
// Ditambah 1
$no += 1;
/**
 * Atau bisa gunakan cara ini 
 * $no++;
 * $no = $no + 1;
 * bebas ya, silahkan pilih sesuai selera :v
 */

//  Oke next kita bakal generate kode otomatisnya
$str = 'P';

// perintah sprintf("%04s", $no); digunakan untuk memformat string sebanyak 4 karakter
// misal sprintf("%04s", 2); maka akan dihasilkan '0002'
// atau misal sprintf("%04s", 1); maka akan dihasilkan string '0001'
$newKode = $str . sprintf("%01s", $no);
                                  ?>


                                     <div class="form-group">
                                      <label class="control-label" for="kd_penyakit">Kode penyakit</label>
                                      <input type="text" name="kd_penyakit" class="form-control" id="kd_penyakit" required="" value="<?php echo $newKode; ?>" readonly="">
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="penyakit">Nama penyakit</label>
                                      <input type="text" name="penyakit" class="form-control" id="penyakit" required="">
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label" for="solusi">Solusi</label>
                                      <input type="text" name="solusi" class="form-control" id="solusi" >
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    </div>

                                  </div>
                                </form>

                                <?php
                                    if (isset($_POST['simpan'])){
                                    $kd_penyakit = $_POST['kd_penyakit'];
                                    $penyakit = $_POST['penyakit'];
                                    $solusi = $_POST['solusi'];
                                      
                                    
                                      $tambah = mysqli_query($koneksi,"INSERT INTO penyakit (kd_penyakit, penyakit, solusi)
                                                VALUES('$kd_penyakit','$penyakit','$solusi')"); 
                                      if($tambah){
                                        ?>
                                        <script type="text/javascript">
                                        alert('Input Data Berhasil');
                                          document.location.href="data_kesimpulan.php";
                                         </script>
                                         <?php
                                        }else{
                                          echo"Gagal Menginput Data";
                                        } 
                                    }
                                  ?>

                      </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
                </tbody>
              </table>
              <!-- End Bordered Table -->

         

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