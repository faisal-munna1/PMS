<?php
session_start();

require_once("configs/db_config.php");
$base_url = "cpanel";

$error_message = "";

if (isset($_POST["btnSignIn"])) {

  $login_input = trim($_POST["txtUsername"]);
  $password = trim($_POST["txtPassword"]);

  $stmt = $db->prepare("
        SELECT u.id, u.username,u.name as user_name, u.image, u.password, u.email, u.phone, u.role_id, r.name AS role 
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

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="asset/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">

  <style>
    body.login-page {
      background: linear-gradient(135deg, #eef5f9 0%, #d2e4ee 100%) !important;
    }

    .login-box .card {
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05) !important;
      border-top: 4px solid #007bff !important;
    }

    .medical-icon-header {
      font-size: 3rem;
      color: #007bff;
      margin-bottom: 10px;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card">
      <div class="card-header text-center pt-4">
        <div class="medical-icon-header">
        </div>
        <a href="#" class="h2">
          <img src="asset/dist/img/faisal_logo.png" alt="" class="img-aluid" width="300"></a>
        <p class="text-muted small mt-1">Patient Management System</p>

        <div style="text-align:center;color:red;font-weight:bold;font-size:0.9rem;" class="mt-2">
          <?php echo isset($error_message) ? htmlspecialchars($error_message) : ""; ?>
        </div>
      </div>

      <div class="card-body login-card-body px-4 pb-4">
        <p class="login-box-msg text-secondary"></p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Username / Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-md"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row pt-2">
            <div class="col-12">
              <button type="submit" name="btnSignIn" class="btn btn-primary btn-block shadow-sm">
                <i class="fas fa-sign-in-alt mr-1"></i> Login
              </button>
            </div>
          </div>
        </form>

        <div class="text-center mt-4 pt-3 border-top">
          <p class="text-muted small mb-0">
            <i class="fas fa-info-circle mr-1"></i> Having trouble? Contact System Admin.
          </p>
        </div>

      </div>
    </div>
  </div>

  <script src="asset/plugins/jquery/jquery.min.js"></script>
  <script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset/dist/js/adminlte.min.js"></script>
  <script>
    $(function() {
      rememberStatus();

      $('#txtUsername').on("input", function() {
        remember();
      });

      $('#txtPassword').on("input", function() {
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
          $('#chkRemember').attr('checked', 'checked');
          $('#txtUsername').val(localStorage.username);
          $('#txtPassword').val(localStorage.pass);
        } else {
          $('#chkRemember').removeAttr('checked');
          $('#txtUsername').val('');
          $('#txtPassword').val('');
        }
      }
    });
  </script>
</body>

</html>