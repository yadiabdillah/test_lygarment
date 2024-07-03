<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
              <div class="breadcrumb-item"><a href="#">Edit Data</a></div>
              <div class="breadcrumb-item">Form</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Form</h2>
            <p class="section-lead">
            </p>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <!-- card 1 
              <input  type="hidden" value="<?php echo $success; ?>" id="hasilTransaksi"> -->
              <div class="card">
                  
                  <div class="card-body">
                    <p class="mb-2"> <?php print_r($single);  $date = date('Y-m-d');  ?>We've created a plugin to easily create a bootstrap modal.</p>
                    <button class="btn btn-primary" id="modal-8">Launch Modal</button>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h4>Form Input Transaksi</h4>
                  </div>

                  <form method="POST" action="<?php echo base_url().'transaksi/input_data'; ?>">
                  <input type="hidden" name="id_transaksi" value="<?php echo $single[0]['id_transaksi']; ?>">
                  <div class="card-body">
                   
                    <div class="form-group">
                      <label>Date</label>
                      <input type="datetime-local" name="tanggal" value="<?php $date_db = date_create($single[0]['tanggal_transaksi']); echo date_format($date_db,'Y-m-d\TH:i'); ?>" id="tanggal" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label>Lokasi</label>
                      <select name="lokasi" class="form-control">
                      <?php
                      foreach($lokasi as $key){ ?>
                      <option value="<?php echo $key['id_lokasi']; ?>" <?php if($single[0]['lokasi'] == $key['id_lokasi'] ){echo "selected";} ?>><?php echo $key['nama_lokasi']; ?></option> 
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Item</label>
                      <select name="item" class="form-control">
                      <?php
                      foreach($item as $key){ ?>
                      <option value="<?php echo $key['id_item'];?>" <?php if($single[0]['item'] == $key['id_item'] ){echo "selected";} ?>><?php echo $key['nama_item']; ?></option> 
                      <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="text" name="qty"  value="<?php echo $single[0]['qty_actual']; ?>" class="form-control">
                    </div>
                    <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
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

