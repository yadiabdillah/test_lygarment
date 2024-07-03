<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
           
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item "><a href="#">Sewing Section</a></div>
              <div class="breadcrumb-item"><a href="#">Sewing</a></div>
              <div class="breadcrumb-item">View Data</div>
              <div class="breadcrumb-item active">View Detail</div>
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
              <div class="buttons">
              <a href="<?php echo base_url(); ?>sewing/view_sewing" class="btn btn-icon icon-left btn-primary"><i class="fa-solid fa-arrow-left"></i> Back To Main Menu</a>
              </div>
       
              <div class="card">
                  <div class="card-header">
                    <h4><?php echo $code." #".$date; ?></h4>
                  </div>
                  <div class="card-header">
                    <h4>Detail Transaction :</h4>
                  </div>
                  <div class="card-body">
                   <?php $count_rowspan = count($table_header); ?>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col" rowspan="2">#</th>
                          <th scope="col" rowspan="2">Operator</th>
                          <th scope="col" colspan="<?php echo $count_rowspan; ?>" style="text-align:center">Size</th>
                          <th scope="col"rowspan="2">Total Qty</th>
                          <th scope="col" rowspan="2">Destination</th>  
                        </tr>
                        <tr>
                          <?php 
                          foreach($table_header as $tr){?>
                           <th scope="col"><?php echo $tr['SizeName']; ?></th>
                         <?php }
                          ?>       
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach($transaksi as $key){ ?>
                           <tr>
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $key['operator']; ?></td>
                          <?php
                          foreach($table_header as $tr){ ?>
                            <td><?php echo $key[$tr['SizeName']]; ?></td>
                         <?php } 
                          ?>
                        
                          <td><?php echo $key['total_qty']; ?></td>
                          <td><?php echo $key['destination']; ?></td>
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



