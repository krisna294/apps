<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pages / Home</title>
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
         <?php
                  if ($this->session->flashdata('pesan') != '') {
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert"">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <h5><i i class="bi bi-check-circle me-1""></i>';
                    echo $this->session->flashdata('pesan');
                    $this->session->set_flashdata('pesan', '');
                    echo '</h5></div>';
                  }
                  ?>
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo base_url() . 'assets/profil/' .  $bio[0]->foto ?>?>" alt="Profile" class="rounded-circle">
              <h2><?= $bio[0]->nama ?></h2>
              <br>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <form method="POST" action="<?= base_url('Page/act_ubah') ?>" enctype="multipart/form-data">

                  <input type="hidden" name="username" autocomplete="off" value="<?= $bio[0]->username ?>" class="form-control">
                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                        <input name="nama" type="text" class="form-control" required="" value="<?= $bio[0]->nama ?>">
                        <div class="invalid-feedback">Please enter your new name!</div>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Place of Birth</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                        <input name="tempat_lahir" type="text" class="form-control" required="" value="<?= $bio[0]->tempat_lahir ?>">
                        <div class="invalid-feedback">Please enter your new place of birth!</div>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                        <input name="tgl_lahir" type="date" class="form-control" required="" value="<?= $bio[0]->tgl_lahir ?>">
                        <div class="invalid-feedback">Please enter your new date of birth!</div>
                      </div>
                  </div>

                   <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                       <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                           <option value="" disabled <?php if ($bio[0]->jenis_kelamin == '') {
                                                  echo 'selected';
                                                } ?>>Choose</option>
                          <option value="Male" <?php if ($bio[0]->jenis_kelamin == 'Male') {
                                                  echo 'selected';
                                                } ?>>Male</option>
                          <option value="Female" <?php if ($bio[0]->jenis_kelamin == 'Female') {
                                                  echo 'selected';
                                                } ?>>Female</option>
                        </select>
                        <div class="invalid-feedback">Please enter your new gender!</div>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Religion</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                       <select class="form-select" aria-label="Default select example" name="agama">
                           <option value="" disabled <?php if ($bio[0]->jenis_kelamin == '') {
                                                  echo 'selected';
                                                } ?>>Choose</option>
                          <option value="Islam" <?php if ($bio[0]->agama == 'Islam') {
                                                  echo 'selected';
                                                } ?>>Islam</option>
                          <option value="Christian" <?php if ($bio[0]->agama == 'Christian') {
                                                  echo 'selected';
                                                } ?>>Christian</option>
                          <option value="Catholic" <?php if ($bio[0]->agama == 'Catholic') {
                                                  echo 'selected';
                                                } ?>>Catholic</option>
                          <option value="Hindu" <?php if ($bio[0]->agama == 'Hindu') {
                                                  echo 'selected';
                                                } ?>>Hindu</option>
                          <option value="Buddha" <?php if ($bio[0]->agama == 'Buddha') {
                                                  echo 'selected';
                                                } ?>>Buddha</option>
                          <option value="Konghucu" <?php if ($bio[0]->agama == 'Konghucu') {
                                                  echo 'selected';
                                                } ?>>Konghucu</option>
                        </select>
                        <div class="invalid-feedback">Please enter your new religion!</div>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Marital Status</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                        <select class="form-select" aria-label="Default select example" name="status">
                          <option value="" disabled <?php if ($bio[0]->status == '') {
                                                  echo 'selected';
                                                } ?>>Choose</option>
                          <option value="Married" <?php if ($bio[0]->status == 'Married') {
                                                  echo 'selected';
                                                } ?>>Married</option>
                          <option value="Unmarried" <?php if ($bio[0]->status == 'Unmaried') {
                                                  echo 'selected';
                                                } ?>>Umarried</option>
                          <option value="Widow" <?php if ($bio[0]->status == 'Widow') {
                                                  echo 'selected';
                                                } ?>>Widow</option>
                          <option value="Widower" <?php if ($bio[0]->status == 'Widower') {
                                                  echo 'selected';
                                                } ?>>Widower</option>
                        </select>
                        <div class="invalid-feedback">Please enter your new status!</div>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                        <input name="alamat" type="text" class="form-control" required="" value="<?= $bio[0]->alamat ?>">
                        <div class="invalid-feedback">Please enter your new address!</div>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Photo</label>
                      <div class="col-md-8 col-lg-9 has-validation">
                        <input name="foto" type="file" class="form-control" required="" value="<?= $bio[0]->foto ?>">
                        <div class="invalid-feedback">Please enter your new photo!</div>
                      </div>
                  </div>
  
                  <div class="text-left">
                      <button type="submit" class="btn btn-primary">Change Profile</button>
                  </div>
                </form>
                </div>

              </div><!-- End Bordered Tabs -->

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
    getData();

    function getData()
    {
        $('#data').load('<?= base_url() ?>Page/getData');
    }
  </script>

</body>

</html>