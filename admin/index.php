<?php 
session_start();

require_once("configs/db_config.php");
$base_url = "cpanel";

$error_message = "";

if (isset($_POST["btnSignIn"])) {

  $login_input = trim($_POST["txtUsername"]);
  $password = trim($_POST["txtPassword"]);

  $stmt = $db->prepare("
        SELECT u.id, u.username, u.name as user_name, u.image, u.password, u.email, u.phone, u.role_id, r.name AS role 
        FROM {$tx}users u 
        JOIN {$tx}role r ON r.id = u.role_id 
        WHERE (u.username = ? OR u.email = ?) AND u.status = 'active'
    ");

  $stmt->bind_param("ss", $login_input, $login_input);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_object();

  if ($user && password_verify($password, $user->password)) {

    $_SESSION["uid"] = $user->id;
    $_SESSION["uname"] = $user->username;
    $_SESSION["uimage"] = $user->image;
    $_SESSION["user_name"] = $user->user_name;
    $_SESSION["email"] = $user->email;
    $_SESSION["phone"] = $user->phone;
    $_SESSION["role_id"] = $user->role_id;
    $_SESSION["urole"] = $user->role;

    header("location:home");
    exit;
  } else {
    $error_message = "Incorrect username/email or password";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hospital Management System | Login</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous">

  <link rel="stylesheet" href="asset/dist/css/adminlte.css">

  <style>
    /* AdminLTE 4 native login box alignment and modernized centering */
    body.login-page {
      background: linear-gradient(135deg, #eef5f9 0%, #d2e4ee 100%) !important;
    }
    .login-box .card {
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05) !important;
    }
  </style>
  
  <script>
    (() => {
      'use strict';
      const stored = localStorage.getItem('lte-theme');
      const prefersDark = globalThis.matchMedia('(prefers-color-scheme: dark)').matches;
      let resolved = stored === 'dark' || (stored !== 'light' && prefersDark) ? 'dark' : 'light';
      document.documentElement.setAttribute('data-bs-theme', resolved);
    })();
  </script>
</head>

<body class="login-page bg-body-secondary d-flex align-items-center justify-content-center min-vh-100">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center pt-4 border-0">
        <a href="#" class="link-body-emphasis text-decoration-none">
          <img src="asset/dist/img/faisal_logo.png" alt="Logo" class="img-fluid" width="300">
        </a>
        <p class="text-secondary small mt-2 mb-0">Patient Management System</p>

        <?php if (!empty($error_message)): ?>
          <div class="alert alert-danger alert-dismissible fade show mt-3 py-2 small text-start" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-1"></i> <?php echo htmlspecialchars($error_message); ?>
            <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
      </div>

      <div class="card-body login-card-body px-4 pb-4">
       

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Username / Email" required>
            <div class="input-group-text">
              <span class="bi bi-person-badge"></span>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password" required>
            <div class="input-group-text">
              <span class="bi bi-lock-fill"></span>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" name="btnSignIn" class="btn btn-primary w-100 shadow-sm">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
              </button>
            </div>
          </div>
        </form>

        <div class="text-center mt-4 pt-3 border-top">
          <p class="text-secondary small mb-0">
            <i class="bi bi-info-circle me-1"></i> Having trouble? Contact System Admin.
          </p>
        </div>

      </div>
    </div>
  </div>

  <script src="asset/plugins/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="asset/dist/js/adminlte.js"></script>
  
  <script>
    $(function() {
      rememberStatus();

      $('#txtUsername, #txtPassword').on("input", function() {
        remember();
      });

      $('#chkRemember').click(function() {
        remember();
      });

      function remember() {
        if ($('#chkRemember').is(':checked')) {
          localStorage.username = $('#txtUsername').val().trim();
          localStorage.pass = $('#txtPassword').val().trim();
          localStorage.chkbox = $('#chkRemember').val();
        } else {
          localStorage.username = '';
          localStorage.pass = '';
          localStorage.chkbox = '';
        }
      }

      function rememberStatus() {
        if (localStorage.chkbox && localStorage.chkbox != '') {
          $('#chkRemember').prop('checked', true);
          $('#txtUsername').val(localStorage.username);
          $('#txtPassword').val(localStorage.pass);
        } else {
          $('#chkRemember').prop('checked', false);
        }
      }
    });
  </script>
</body>

</html>