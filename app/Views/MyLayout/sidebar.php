<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu div-menu">
            <div class="nav">
                <br>

                <?php if (has_permission('Dashboard') || has_permission('Data Master')) : ?>
                    <small class="my-0 ms-3 text-secondary">Core</small>
                <?php endif; ?>

                <?php if (has_permission('Dashboard')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/dashboard">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-gauge"></i>
                        </div>
                        Dashboard
                    </a>
                <?php endif; ?>
                <?php if (has_permission('Data Master')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/divisi">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-regular fa-folder-open"></i>
                        </div>
                        Data Divisi
                    </a>
                <?php endif; ?>

                <br>

                <?php if (has_permission('Pembelian') || has_permission('Penjualan') || has_permission('Produksi')) : ?>
                    <small class="my-0 ms-3 text-secondary">Transaction</small>
                <?php endif; ?>

                <?php if (has_permission('Pembelian')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/pembelian">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-circle-down"></i>
                        </div>
                        Pembelian
                    </a>
                <?php endif; ?>
                <?php if (has_permission('Penjualan')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/penjualan">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-circle-up"></i>
                        </div>
                        Penjualan
                    </a>
                <?php endif; ?>
                <?php if (has_permission('Produksi')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/produksi">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-list-check"></i>
                        </div>
                        Produksi
                    </a>
                <?php endif; ?>

                <br>

                <?php if (has_permission('Gudang') || has_permission('Inventaris')) : ?>
                    <small class="my-0 ms-3 text-secondary">Assets</small>
                <?php endif; ?>

                <?php if (has_permission('Gudang')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/menu_gudang">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-warehouse"></i>
                        </div>
                        Gudang
                    </a>
                <?php endif; ?>
                <?php if (has_permission('Inventaris')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/inventaris">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-table-list"></i>
                        </div>
                        Inventaris
                    </a>
                <?php endif; ?>

                <br>

                <?php if (has_permission('Akuntansi') || has_permission('SDM') || has_permission('Laporan')) : ?>
                    <small class="my-0 ms-3 text-secondary">Management</small>
                <?php endif; ?>

                <?php if (has_permission('Akuntansi')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/akuntansi">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-calculator"></i>
                        </div>
                        Akuntansi
                    </a>
                <?php endif; ?>
                <?php if (has_permission('SDM')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/sdm">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-user-group"></i>
                        </div>
                        SDM
                    </a>
                <?php endif; ?>
                <?php if (has_permission('Laporan')) : ?>
                    <a class="nav-link" href="<?= base_url() ?>/laporan">
                        <div class="sb-nav-link-icon">
                            <i class="fa-fw fa-solid fa-chart-simple"></i>
                        </div>
                        Laporan
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="sb-sidenav-footer py-1">
            <div class="small">Masuk sebagai :</div>
            <?= user()->name ?>
        </div>
    </nav>
</div>