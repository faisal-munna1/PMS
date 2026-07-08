<?php
session_start();

require_once("configs/config.php");
require_once("helpers/helper.php");
require_once("libraries/library.php");
require_once("models/model.php");
require_once("controllers/controller.php");
?>

<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PMS | Dashboard</title>

  <!-- Theme -->
  <script>
    (() => {
      const theme = localStorage.getItem("lte-theme") || "light";
      document.documentElement.setAttribute("data-bs-theme", theme);
    })();
  </script>

  <!-- Font -->
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">

<!-- Bootstrap -->
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- OverlayScrollbars -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.12.0/styles/overlayscrollbars.min.css">

<!-- AdminLTE -->
<link rel="stylesheet" href="<?= $base_url ?>/asset/css/adminlte.css">

<!-- DataTables -->
<link rel="stylesheet"  href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

<link rel="stylesheet"
      href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet"
      href="https://cdn.datatables.net/responsive/3.0.7/css/responsive.bootstrap5.min.css">

<link rel="stylesheet"
      href="https://cdn.datatables.net/buttons/3.2.5/css/buttons.bootstrap5.min.css">

<!-- Select2 -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

<!-- Flatpickr -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- SweetAlert2 -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css">

<!-- Toastify -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Custom CSS -->
<link rel="stylesheet"
      href="<?= $base_url ?>/asset/css/style.css">
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="<?= $base_url ?>/js/cart2.js"></script>

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <div class="app-wrapper">

    <?php include("views/layout/navbar.php"); ?>

    <?php include("views/layout/main_sidebar.php"); ?>

    <main class="app-main">

      <div class="app-content-header">

        <div class="container-fluid">