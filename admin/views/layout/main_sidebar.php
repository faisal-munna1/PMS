<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    <div class="sidebar-brand">
        <a href="<?= $base_url ?>/home/index" class="brand-link">
            <img src="<?= $base_url ?>/asset/images/faisal_logo.png"
                 class="brand-image img-fluid opacity-95 shadow"
                 alt="Logo">

            <!-- <span class="brand-text fw-light"> PMS</span> -->
        </a>
    </div>

    <div class="sidebar-wrapper">

        <nav class="mt-2">

            <ul class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                data-accordion="false">
                <?php include("menus/menu.php"); ?>
            </ul>
        </nav>
    </div>
</aside>