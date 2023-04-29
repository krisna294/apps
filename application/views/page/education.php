<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pages / Education</title>
  <?php $this->load->view('template/head') ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
     <?php $this->load->view('template/navbar') ?>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
     <?php $this->load->view('template/sidebar') ?>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Education</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Education</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Education Background</h5>
              <form method="POST" action="<?= base_url('Page/add_pdd') ?>" enctype="multipart/form-data">
              <input type="hidden" name="username" autocomplete="off" value="<?= $bio[0]->username ?>" class="form-control">
               <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">School Name</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" required="" autocomplete="off" name="nama_sekolah">
                    </div>

                    <label class="col-sm-2 col-form-label">Graduate Year</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="" autocomplete="off" name="thn_lulus" onkeypress="return hanyaAngka(event)">
                    </div>
                    
              </div>
              <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Educational Level</label>
                    <div class="col-sm-4">
                     <select class="form-select" aria-label="Default select example" name="jenjang">
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA/K">SMA/K</option>
                      <option value="D1">D1</option>
                      <option value="D2">D2</option>
                      <option value="D3">D3</option>
                      <option value="D4">D4</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                    </div>

                    <label class="col-sm-2 col-form-label">Major</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="" autocomplete="off" name="jurusan">
                    </div>
                    
              </div>
              <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">City School</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" required="" autocomplete="off" name="kota">
                    </div>

                    <label class="col-sm-2 col-form-label">GPA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="" autocomplete="off" name="nilai">
                    </div>
                    
              </div>
              <div class="text-left">
                    <button class="btn btn btn-primary" type="submit"> Save</button>
              </div>
            </form>
            </div>
          </div>

        </div>
      </div>
    </section>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Education Background</h5>
              <?php
                  if ($this->session->flashdata('pesan2') != '') {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert"">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <h5><i i class="bi bi-check-circle me-1""></i>';
                    echo $this->session->flashdata('pesan2');
                    $this->session->set_flashdata('pesan2', '');
                    echo '</h5></div>';
                  }
                  ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">School Name</th>
                    <th scope="col">Educational Level</th>
                    <th scope="col">Major</th>
                    <th scope="col">Graduate Year</th>
                    <th scope="col">City</th>
                    <th scope="col">GPA</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $no = 1;
                      foreach ($pdd as $p) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $p->nama_sekolah ?></td>
                          <td><?= $p->jenjang ?></td>
                          <td><?= $p->jurusan ?></td>
                          <td><?= $p->thn_lulus ?></td>
                          <td><?= $p->kota ?></td>
                          <td><?= $p->nilai ?></td>
                          <td>
                            <a href="<?= base_url()?>Page/edit_education?id_riwayatpdd=<?= $p->id_riwayatpdd ?>" class="btn btn-sm btn-success" onclick="return confirm('Ubah <?= $p->nama_sekolah?> ?')"><i class="bi bi-pen"></i></a>
                            <a href="<?= base_url()?>Page/delete_education?id_riwayatpdd=<?= $p->id_riwayatpdd ?>" id="btn-hapus" class="btn btn-sm btn-danger" onclick="return confirm('Delete <?= $p->nama_sekolah?> ?')"><i class="bi bi-trash"></i></a>
                          </td>
                        </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Krisna</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php $this->load->view('template/script') ?>
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }

  </script>
  
</body>

</html>

