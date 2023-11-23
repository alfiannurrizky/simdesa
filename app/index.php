<?php
session_start();
include_once "../include/koneksi.php";
include_once "../include/config.php";


if ($_SESSION["status_login"] != true) {
  header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include("views/components/header.php"); ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include("views/components/navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <?php include("views/components/logo.php"); ?>

      <!-- Sidebar -->
      <?php include("views/components/sidebar.php"); ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Main Content -->
    <?php include("views/halaman.php"); ?>

    <!-- /.Main Content-->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">

      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php include("views/components/footer.php"); ?>
  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED SCRIPTS -->

</body>
</script>

</html>