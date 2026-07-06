<aside class="main-sidebar  sidebar-dark-secondary elevation-4">
    <a href="<?php echo $base_url ?>/home" class="brand-link mt-2 d-flex align-items-center justify-content-center" style="height: 56px;">
       <img src="<?php echo $base_url ?>/asset/dist/img/faisal_logo.png" alt="FAISALWEBAPP" class="img-fluid">
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $base_url ?>/uploads/users/<?php echo isset($_SESSION['uimage']) ? $_SESSION['uimage'] : 'default.png'; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo isset($_SESSION["user_name"]) ? $_SESSION["user_name"] : ""  ?> <br>
         <?php echo isset($_SESSION["urole"]) ? "Type: " . $_SESSION["urole"] : "" ?></a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
          include("menus/menu.php");
          ?>
        </ul>
      </nav>
    </div>
  </aside>