
  <?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Gejala </h1>
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
        $kd_gejala = $_GET['kd_gejala'];
        $cek = mysqli_query($koneksi, "SELECT * FROM gejala WHERE kd_gejala='$kd_gejala'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM gejala WHERE kd_gejala='$kd_gejala'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'data_pertanyaan.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>

         

          

         

         

       

         

          <div class="card">
            <div class="card-body">


               <div class="card-header">
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah
              </button>

                  
              </div>

          

              <table class="table table-bordered">
                <thead>
                                              <tr>
                                                <th><i class=""></i> NO</th>
                                                <th><i class=""></i>Kode Gejala</th>
                                                <th><i class=""></i>Nama Gejala</th>
                                                <th><i class="icon_cogs"></i> Action</th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'../koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "SELECT * from gejala ");
                                                    while($data = mysqli_fetch_array($sql)){
                          

                                                  
                                                ?>

                                            <tr class="table-white">
                                                <td><?php echo $no++;  ?></td>
                                                <td><?php echo $data['kd_gejala']; ?></td>
                                                <td><?php echo $data['gejala']; ?></td>
                                                <td>
                                                  <div class="btn-group">
                                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $data['kd_gejala']; ?>"><i class="fa fa-edit">Edit</i></a> &nbsp;




                                                   <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')"  href="data_pertanyaan.php?aksi=hapus&kd_gejala=<?php echo $data['kd_gejala']; ?>" class="btn btn-sm btn-danger" title=""><i class="fa fa-trash">Hapus</i></a>
                                                  </div>
                                                </td>
                                            </tr>

                  <div id="ubah<?php echo $data['kd_gejala']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h4 class="modal-title">Edit Data gejala</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                <?php
                                  $kd_gejala = $data['kd_gejala']; 
                                  $query_edit = mysqli_query($koneksi, "SELECT * FROM gejala WHERE kd_gejala='$kd_gejala'");
                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>

                                    <div class="form-group">
                                      <label class="control-label" for="kd_gejala">Kode gejala</label>
                                      <input type="text" name="kd_gejala" class="form-control" id="kd_gejala" value="<?php echo $data['kd_gejala'] ?>" required="" readonly="">
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="gejala">Nama gejala</label>
                                      <input type="text" name="gejala" class="form-control" id="gejala" value="<?php echo $data['gejala'] ?>" required="">
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
                                            $kd_gejala = $_POST['kd_gejala'];
                                            $gejala = $_POST['gejala'];
                                  
                                           
                                            
                                          
                                            $ubah = mysqli_query($koneksi,"UPDATE gejala SET kd_gejala='$kd_gejala', gejala='$gejala' WHERE kd_gejala='$kd_gejala' "); 
                                            if($ubah){
                                              ?>
                                              <script type="text/javascript">
                                              alert('Edit Data Berhasil');
                                                document.location.href="data_pertanyaan.php";
                                               </script>
                                               <?php
                                              }else{
                                                echo"Gagal Mengedit Data";
                                              } 
                                            
                                          }
                                        ?> 
                                </div>



                  <div id="tambah" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Tambah data gejala</h4>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                <form method="POST" action="">
                                  <div class="modal-body">

   <?php
                           
                               
// Cek Koneksi

// Mencari data (kode) yang paling besar (terakhir) dari database
$query = mysqli_query($koneksi, "SELECT max(kd_gejala) as max_kode FROM gejala");
$data = mysqli_fetch_array($query);
// Sudah dapat nih gan
$kd_gejala = $data['max_kode'];

// Oke sekarang kita ambil bagian angkanya saja dan membuang string yang ada diawal
$no = substr($kd_gejala, 1, 4);
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
$str = 'G';

// perintah sprintf("%04s", $no); digunakan untuk memformat string sebanyak 4 karakter
// misal sprintf("%04s", 2); maka akan dihasilkan '0002'
// atau misal sprintf("%04s", 1); maka akan dihasilkan string '0001'
$newKode = $str . sprintf("%02s", $no);
                                  ?>



                                      <div class="form-group">
                                      <label class="control-label" for="kd_gejala">Kode Gejala</label>
                                      <input type="text" name="kd_gejala" class="form-control" id="kd_gejala" required="" value="<?php echo $newKode; ?>" readonly="">
                                    </div> 


                                    <div class="form-group">
                                      <label class="control-label" for="gejala">Nama Gejala</label>
                                      <input type="text" name="gejala" class="form-control" id="gejala" required="">
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    </div>

                                  </div>
                                </form>

                                <?php
                                

if(isset($_POST['simpan'])){
 $id_g = $_POST['id_g'];
                                      $kd_gejala = $_POST['kd_gejala'];
                                      $gejala = $_POST['gejala'];

   
//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM gejala WHERE gejala='$gejala' or kd_gejala='$kd_gejala'"));

    if ($cek > 0){
    echo "<script>window.alert('nama gejala sudah ada silahkan cek ulang')
    window.location='data_pertanyaan.php'</script>";
    }else {
    mysqli_query($koneksi, "INSERT INTO gejala (id_g, kd_gejala,gejala) VALUES ('$id_g', '$kd_gejala', '$gejala')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='data_pertanyaan.php'</script>";
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

 <?php include 'template/footer.php'; ?>


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