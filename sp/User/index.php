<?php 


include '../koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>



 
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            


            <!-- Revenue Card -->
           

         


            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-16">

              <div class="card info-card customers-card">

                



                <div class="card-body">
                  <h5 class="card-title">Selamat datang Sistem pakar diagnosa penyakit iguana <span></span></h5>

                <?php



   if(isset($_POST['simpan'])){

$no_ip = $_SERVER['REMOTE_ADDR'];
$nama = $_POST['nama'];
$nama_iguana = $_POST['nama_iguana'];

$umur_iguana = $_POST['umur_iguana'];
$alamat = $_POST['alamat'];


//script validasi data
 

    mysqli_query($koneksi, "INSERT INTO riwayat (no_ip, nama,nama_iguana,umur_iguana,alamat) VALUES ('$no_ip', '$nama', '$nama_iguana', '$umur_iguana', '$alamat')");
    echo "<script>window.alert('pendaftaran berhasil')
    window.location='diagnosapilihan.php'</script>";
    }
    
    ?>
                   

                     <div class="box-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="index.php" method="post" enctype="multipart/form-data" name="form1" id_user="form1">
                          
                          

                        

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Pemilik </label>
                              <div class="col-sm-4">
                                  <input name="nama" type="text" id="nama" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Iguana </label>
                              <div class="col-sm-4">
                                  <input name="nama_iguana" type="text" id="nama_iguana" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Umur Iguana </label>
                              <div class="col-sm-4">
                                  <input name="umur_iguana" type="text" id="umur_iguana" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Alamat </label>
                              <div class="col-sm-4">
                                  <input name="alamat" type="text" id="alamat" class="form-control"autocomplete="off" required />
                                  <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                              </div>
                          </div>

                         

                        


                         

                           

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="../../index.html" class="btn btn-sm btn-danger">Kembali </a>
                              </div>
                          </div>
                      </form>
                  </div>
                </div><!-- /.box-body -->
                  </div>



                </div>
              </div>





            </div><!-- End Customers Card -->

             </div>


            <!-- Recent Sales -->
            

           


          

         
        </div><!-- End Right side columns -->

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