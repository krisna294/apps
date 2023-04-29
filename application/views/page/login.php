<!DOCTYPE html>
<html lang="en">

<head>
   <title>Pages / Login</title>
  <?php $this->load->view('template/head') ?>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>
                  <?php
                  if ($this->session->flashdata('pesan1') != '') {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <h5><i i class="bi bi-check-circle me-1""></i>';
                    echo $this->session->flashdata('pesan1');
                    $this->session->set_flashdata('pesan1', '');
                    echo '</h5></div>';
                  }
                  ?>

                  <?php
                  if ($this->session->flashdata('pesan2') != '') {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <h5><i i class="bi bi-check-circle me-1""></i>';
                    echo $this->session->flashdata('pesan2');
                    $this->session->set_flashdata('pesan2', '');
                    echo '</h5></div>';
                  }
                  ?>

                   <?php
                  if ($this->session->flashdata('pesan3') != '') {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"">
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <h5><i i class="bi bi-check-circle me-1""></i>';
                    echo $this->session->flashdata('pesan3');
                    $this->session->set_flashdata('pesan3', '');
                    echo '</h5></div>';
                  }
                  ?>

                  <form class="row g-3 needs-validation" novalidate action="<?= base_url() ?>Logs/act_login" method="POST" enctype="multipart/form-data">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="email" name="username" class="form-control" id="yourUsername" required autocomplete="off">
                        <div class="invalid-feedback">Please enter your email!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="<?= base_url()?>Logs">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <?php $this->load->view('template/script') ?>

</body>

</html>