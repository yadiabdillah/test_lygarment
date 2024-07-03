<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
             </div>
             <?php
             $haas = $this->session->flashdata('hasil_login');
            if($this->session->flashdata('hasil_login') != ''){ ?>
               <div class="alert alert-danger alert-dismissible show fade">
             <div class="alert-body">
               <button class="close" data-dismiss="alert">
                 <span>×</span>
               </button>
               Username Atau Password Salah
             </div>
           </div>

           
            <?php } ?>
            
           
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url().'transaksi/cek_login'; ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="username" name="username" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in 
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                     
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
        

              </div>
            </div>
         
            <div class="simple-footer">
              Copyright &copy; 2024
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('dist/_partials/js'); ?>