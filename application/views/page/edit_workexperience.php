<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pages / Work Experience</title>
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
      <h1>Work Experience</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Work Experience</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

     <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Work Experience</h5>
              <form method="POST" action="<?= base_url('Page/act_editjob') ?>" enctype="multipart/form-data">
              <input type="hidden" name="id_riwayatkerja" autocomplete="off" value="<?= $job[0]->id_riwayatkerja ?>" class="form-control">
               <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" required="" autocomplete="off" name="nama_perusahaan" value="<?= $job[0]->nama_perusahaan ?>">
                    </div>

                    <label class="col-sm-2 col-form-label">Last Position</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="" autocomplete="off" name="jabatan" value="<?= $job[0]->jabatan ?>">
                    </div>
                    
              </div>
              <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Lenght of Work</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" required="" autocomplete="off" name="durasi" value="<?= $job[0]->durasi ?>">
                    </div>

                    <label class="col-sm-2 col-form-label">Reason to Leave</label>
                    <div class="col-sm-4">
                      <textarea  class="form-control" required="" autocomplete="off" name="alasan"><?= $job[0]->alasan ?></textarea>
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
              <h5 class="card-title">Work Experience</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Last Position</th>
                    <th scope="col">Length of Work</th>
                    <th scope="col">Reason to Leave</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $no = 1;
                      foreach ($job as $j) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $j->nama_perusahaan ?></td>
                          <td><?= $j->jabatan ?></td>
                          <td><?= $j->durasi ?></td>
                          <td><?= $j->alasan ?></td>
                          <td>
                            <a href="<?= base_url()?>Page/delete_job?id_riwayatkerja=<?= $j->id_riwayatkerja ?>" id="btn-hapus" class="btn btn-sm btn-danger" onclick="return confirm('Delete <?= $j->nama_perusahaan?> ?')"><i class="bi bi-trash"></i></a>
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

  
</body>

</html>

