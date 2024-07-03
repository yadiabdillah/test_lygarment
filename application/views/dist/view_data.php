<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
           
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
              <div class="breadcrumb-item"><a href="#">View Data</a></div>
              <div class="breadcrumb-item">List Transaksi Produksi</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">List Transaksi Produksi</h2>
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
              <div class="col-12 col-md-12 col-lg-6">
              <!-- card 1 -->
              <div class="card">
                  <div class="card-header">
                    <h4></h4>
                  </div>
                  <form method="POST" action="<?php echo base_url().'transaksi/view_data'; ?>">
                  <div class="card-body">
                   
                    <div class="form-group">
                      <label>Date</label>
                      <input type="date" name="tanggal" value="" id="tanggal" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Lokasi</label>
                      <select name="lokasi" class="form-control">
                      <option value=""> -- lokasi -- </option>
                      <?php
                      foreach($lokasi as $key){ ?>
                       
                      <option value="<?php echo $key['id_lokasi']; ?>"><?php echo $key['nama_lokasi']; ?></option> 
                      <?php } ?>
                      </select>
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Cari</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                </div>

              </div>
            </div>
          </div>


        


          <div class="row">
              <div class="col-12">
       
              <div class="card">
                  <div class="card-header">
                    <h4>Data Transaksi</h4>
                  </div>
                  <div class="card-body">
                 
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Kode Item</th>
                          <th scope="col">Nama Item</th>
                          <th scope="col">Kode Lokasi</th>
                          <th scope="col">Nama Lokasi</th>
                          <th scope="col">Qty Actual</th>
                          <th scope="col">Create By</th>
                          <th scope="col" colspan='2' style="text-align:center" >Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php 
                      $no = 1;
                      foreach($transaksi as $key){ ?>
                           <tr  id="<?php echo $key['id']; ?>">
                          <th scope="row"><?php echo $no; ?></th>
                          <td><?php echo $key['tanggal']; ?></td>
                          <td><?php echo $key['kode_item']; ?></td>
                          <td><?php echo $key['nama_item']; ?></td>
                          <td><?php echo $key['lokasi']; ?></td>
                          <td><?php echo $key['nama_lokasi']; ?></td>
                          <td><?php echo $key['qty']; ?></td>
                          <td><?php echo $key['kode_karyawan']; ?></td>
                          <td><a href="<?php echo base_url().'transaksi/edit_data/?id='.$key['id']; ?>" class="btn btn-icon icon-left btn-sm btn-primary"><i class="far fa-edit"></i>Edit</a></td>
                          <td><a href="<?php echo base_url().'transaksi/hapus_data/?id='.$key['id']; ?>" class="btn btn-icon icon-left btn-sm btn-danger"><i class="fas fa-times"></i>Delete</a></td>
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



