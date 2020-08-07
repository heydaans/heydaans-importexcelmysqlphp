<!DOCTYPE html>
<html lang="en">
<head>
  <title>Import Excel</title>
  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <h3>Import Excel</h3>
        </nav>
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>
          <?php  
          session_start();
          if(isset($_SESSION['info']))
          {
            echo '<div class="alert alert-success">
            <strong>Success!</strong> &nbsp;'.$_SESSION['info'].' Data Imported
            </div>';
            unset($_SESSION['info']);
          }
          ?> 
          <button class="btn btn-primary" data-toggle="modal" data-target="#importexcel1"><span class="m-l-5"><i class="fa fa-import"></i></span> Import Excel</button>
          <hr>
          <br>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Student</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Name</th>
                      <th>Major</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include 'koneksi.php';
                    $no=1;
                    $data = mysqli_query($koneksi,"select * from mahasiswa");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nim']; ?></td>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $d['major']; ?></td>
                        <td><?php echo $d['address']; ?></td>
                      </tr>
                      <?php 
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; heydaans 2020</span>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>


<!--Modal-->
<form action="upload_aksi.php" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="importexcel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
           <label class="col-sm-6 control-label" readonly>Attach excel file</label>
           <div class="col-md-6">
             <input name="filemahasiswa" type="file" required="required"> 
           </div>
         </div>  
       </div>
       <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <input class="btn btn-primary" name="upload" type="submit" value="Import">
      </div>
    </div>
  </div>
</div>
</form>