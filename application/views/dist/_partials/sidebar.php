<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">Transaksi Produksi</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Sewing Section</li>
            <li class="<?php echo $this->uri->segment(2) == 'view_data' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>sewing/view_sewing"><i class="far fa-square"></i> <span>View Data</span></a></li>
           </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?php echo base_url(); ?>transaksi/logout" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Logout
            </a>
          </div>
        </aside>
      </div>
