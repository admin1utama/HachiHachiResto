<?php
  if($this->session->userdata('jabatan') == "ADMIN")
  {
?>
      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <li class="active">
            <a class="" href="<?php echo site_url('DashboardAdmin'); ?>">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
              <li><a class="" href="<?php echo site_url('satuan'); ?>">Satuan</a></li>
              <li><a class="" href="<?php echo site_url('bahan'); ?>">Bahan</a></li>
              <li><a class="" href="<?php echo site_url('Konversi/tambahkonversi'); ?>">Konversi</a></li>
              <li><a class="" href="<?php echo site_url('paketmenu'); ?>">Paket Menu</a></li>
              <li><a class="" href="<?php echo site_url('cabang'); ?>">Cabang</a></li>
              <li><a class="" href="<?php echo site_url('admin'); ?>">Admin</a></li>
              <li><a class="" href="<?php echo site_url('KepalaGudang'); ?>">Kepala Gudang</a></li>
              <li><a class="" href="<?php echo site_url('operator'); ?>">Operator</a></li>
              <li><a class="" href="<?php echo site_url('supplier'); ?>">Supplier</a></li>
              <li><a class="" href="<?php echo site_url('Registermember'); ?>">Member</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Pembelian</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('PemesananBahan'); ?>">Pemesanan Bahan</a></li>
                <li><a class="" href="<?php echo site_url('PenerimaanBahan'); ?>">Penerimaan Pemesanan</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Distribusi</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('PermintaanBahanOutlet'); ?>">Penerimaan Permintaan</a></li>
                <li><a class="" href="<?php echo site_url('Distribusi'); ?>">Distribusi</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Penjualan</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('Penjualan/showpenjualan'); ?>">P O S</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Reset Stok</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
              <!-- Submenu Data Master isi disini-->
              <li><a class="" href="<?php echo site_url('ZeroInventory'); ?>">Zero Inventory </a></li>
              <li><a class="" href="<?php echo site_url('PenyesuaianStok'); ?>">Penyesuaian Stok</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Laporan Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
              <li><a class="" href="<?php echo site_url('LaporanSatuan'); ?>">Laporan Satuan</a></li>
              <li><a class="" href="<?php echo site_url('LaporanBahan'); ?>">Laporan Bahan</a></li>
              <li><a class="" href="<?php echo site_url('LaporanKonversi'); ?>">Laporan Konversi</a></li>
              <li><a class="" href="<?php echo site_url('LaporanPaketMenu'); ?>">Laporan Paket Menu</a></li>
              <li><a class="" href="<?php echo site_url('LaporanCabang'); ?>">Laporan Cabang</a></li>
              <li><a class="" href="<?php echo site_url('LaporanAdmin'); ?>">Laporan Admin</a></li>
              <li><a class="" href="<?php echo site_url('LaporanKepalaGudang'); ?>">Laporan Kepala Gudang</a></li>
              <li><a class="" href="<?php echo site_url('LaporanOperator'); ?>">Laporan Operator</a></li>
              <li><a class="" href="<?php echo site_url('LaporanSupplier'); ?>">Laporan Supplier</a></li>
              <li><a class="" href="<?php echo site_url('LaporanMember'); ?>">Laporan Member</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Laporan Trans</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
              <li><a class="" href="<?php echo site_url('LaporanPembelianBahan'); ?>">Laporan Pembelian</a></li>
              <li><a class="" href="<?php echo site_url('LaporanPenjualanPOS'); ?>">Laporan Penjualan POS</a></li>
              <li><a class="" href="<?php echo site_url('LaporanDistribusiMasuk'); ?>">Distribusi Masuk</a></li>
              <li><a class="" href="<?php echo site_url('LaporanDistribusiKeluar'); ?>">Distribusi Keluar</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Laporan Stok</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('LaporanBahanBaku'); ?>">Bahan Baku</a></li>
                <li><a class="" href="<?php echo site_url('Bahan/kartustok'); ?>">Kartu Stok</a></li>
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
<?php
  }
  else if($this->session->userdata('jabatan') == "KEPALA GUDANG")
  {
?>
      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <li class="active">
              <a class="" href="<?php echo site_url('DashboardKepalaGudang'); ?>">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
              <!-- Submenu Data Master isi disini-->
              <li><a class="" href="<?php echo site_url('ZeroInventory'); ?>">Zero Inventory </a></li>
              <li><a class="" href="<?php echo site_url('PenyesuaianStok'); ?>">Penyesuaian Stok</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Transaksi</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('PemesananBahan'); ?>">Pemesanan Bahan</a></li>
                <li><a class="" href="<?php echo site_url('PenerimaanBahan'); ?>">Penerimaan Pemesanan</a></li>
                <li><a class="" href="<?php echo site_url('PermintaanBahanOutlet'); ?>">Penerimaan Permintaan</a></li>
                <li><a class="" href="<?php echo site_url('Distribusi'); ?>">Distribusi</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Laporan Stok</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('Bahan/kartustok'); ?>">Kartu Stok</a></li>
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
<?php
  }
  else if($this->session->userdata('jabatan') == "OPERATOR")
  {
?>
      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <li class="active">
              <a class="" href="<?php echo site_url('DashboardOperator'); ?>">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Penjualan</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('Penjualan'); ?>">P O S</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Data Master</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
              <!-- Submenu Data Master isi disini-->
              <li><a class="" href="<?php echo site_url('Registermember'); ?>">Member</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Transaksi</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('PermintaanBahanOutlet'); ?>">Permintaan Bahan</a></li>
                <li><a class="" href="<?php echo site_url('DistribusiMasuk'); ?>">Distribusi Masuk</a></li>
                <li><a class="" href="<?php echo site_url('DistribusiKeluar'); ?>">Distribusi Keluar</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Reset Stok</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
              <!-- Submenu Data Master isi disini-->
              <li><a class="" href="<?php echo site_url('ZeroInventory'); ?>">Zero Inventory </a></li>
              <li><a class="" href="<?php echo site_url('PenyesuaianStok'); ?>">Penyesuaian Stok</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Laporan</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
              <ul class="sub">
                <li><a class="" href="<?php echo site_url('LaporanPenjualanPOS'); ?>">Laporan Penjualan POS</a></li>
                <li><a class="" href="<?php echo site_url('Bahan/kartustok'); ?>">Kartu Stok</a></li>
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
<?php
  }
?>