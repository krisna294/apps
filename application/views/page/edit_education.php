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
              <form method="POST" action="<?= base_url('Page/act_editpdd') ?>" enctype="multipart/form-data">
              <input type="hidden" name="id_riwayatpdd" autocomplete="off" value="<?= $pdd[0]->id_riwayatpdd ?>" class="form-control">
               <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">School Name</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" required="" autocomplete="off" name="nama_sekolah" value="<?= $pdd[0]->nama_sekolah ?>">
                    </div>

                    <label class="col-sm-2 col-form-label">Graduate Year</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="" autocomplete="off" name="thn_lulus" value="<?= $pdd[0]->thn_lulus ?>">
                    </div>
                    
              </div>
              <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Educational Level</label>
                    <div class="col-sm-4">
                     <select class="form-select" aria-label="Default select example" name="jenjang">
                      <option value="SD" <?php if ($pdd[0]->jenjang == 'SD') {
                                              echo 'selected';
                                            } ?>>SD</option>
                      <option value="SMP" <?php if ($pdd[0]->jenjang == 'SMP') {
                                              echo 'selected';
                                            } ?>>SMP</option>
                      <option value="SMA/K" <?php if ($pdd[0]->jenjang == 'SMA/K') {
                                              echo 'selected';
                                            } ?>>SMA/K</option>
                      <option value="D1" <?php if ($pdd[0]->jenjang == 'D1') {
                                              echo 'selected';
                                            } ?>>D1</option>
                      <option value="D2" <?php if ($pdd[0]->jenjang == 'D2') {
                                              echo 'selected';
                                            } ?>>D2</option>
                      <option value="D3" <?php if ($pdd[0]->jenjang == 'D3') {
                                              echo 'selected';
                                            } ?>>D3</option>
                      <option value="D4" <?php if ($pdd[0]->jenjang == 'D4') {
                                              echo 'selected';
                                            } ?>>D4</option>
                      <option value="S1" <?php if ($pdd[0]->jenjang == 'S1') {
                                              echo 'selected';
                                            } ?>>S1</option>
                      <option value="S2" <?php if ($pdd[0]->jenjang == 'S2') {
                                              echo 'selected';
                                            } ?>>S2</option>
                      <option value="S3" <?php if ($pdd[0]->jenjang == 'S3') {
                                              echo 'selected';
                                            } ?>>S3</option>
                    </select>
                    </div>

                    <label class="col-sm-2 col-form-label">Major</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="" autocomplete="off" name="jurusan"  value="<?= $pdd[0]->jurusan ?>">
                    </div>
                    
              </div>
              <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">City School</label>
                    <div class="col-sm-4">
                     <input type="text" class="form-control" required="" autocomplete="off" name="kota" value="<?= $pdd[0]->kota ?>">
                    </div>

                    <label class="col-sm-2 col-form-label">GPA</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" required="" autocomplete="off" name="nilai" value="<?= $pdd[0]->nilai ?>">
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
             

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">School Name</th>
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
                          <td><?= $p->thn_lulus ?></td>
                          <td><?= $p->kota ?></td>
                          <td><?= $p->nilai ?></td>
                          <td>
                            <a href="<?= base_url()?>Page/ubah_sekolah?id_riwayatpdd=<?= $p->id_riwayatpdd ?>" id="btn-hapus" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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

