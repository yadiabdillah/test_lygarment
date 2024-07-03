<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
           
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Sewing Section</a></div>
              <div class="breadcrumb-item"><a href="#">Sewing</a></div>
              <div class="breadcrumb-item">View Data</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Sewing</h2>
            <p class="section-lead">
            </p>

            <!-- function untuk sweetalert --> 
            <?php  $date = date('Y-m-d');  ?>
                  <?php if($this->session->flashdata('sukses_transaksi') != ''){ 
                    if($this->session->flashdata('sukses_transaksi') == 1){
                      $trans = 1;
                    }else if ($this->session->flashdata('sukses_transaksi') == 2){
                      $trans = 2;
                    }
                    
                   } else {
                     $trans = 0;
                   } ?>

          <div class="row">
              <div class="col-12">
       
              <div class="card">
                  <div class="card-header">
                    <h4>Summary</h4>
                  </div>
                  <div class="card-body">
                 
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Date</th>
                          <th scope="col">Style</th>
                          <th scope="col">Total Size</th>
                          <th scope="col">Total Output</th>
                          <th scope="col" colspan='2' style="text-align:center" >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach($transaksi as $key){ ?>
                           <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $key['date']; ?></td>
                          <td><?php echo $key['code']; ?></td>
                          <td><?php echo $key['total_size']; ?></td>
                          <td><?php echo $key['total_output']; ?></td>
                          <td><a href="<?php echo base_url().'sewing/detail_data/?date='.$key['date'].'&code='.$key['code']; ?>" class="btn btn-icon icon-left btn-sm btn-primary"><i class="far fa-edit"></i>VIew Detail</a></td>
                          </td>
                        </tr>
                   <?php   
                   $no++;
                    }
                      ?>
                      </tbody>
                    </table>
                   
                  </div>
                </div>

              </div>
            </div>


        </section>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
<?php $this->load->view('dist/_partials/footer'); ?>



