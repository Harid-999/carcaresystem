  <nav class="main-header  navbar navbar-expand navbar-navy navbar-dark">

  <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="index.php"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($menu == "Customer"){echo "active";} ?>"  href="index.php"><i class="fas fa-home"></i> Home</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a href="../logout.php" class="nav-link ">
          <i class="fa fa-power-off"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
 <!--  http://fordev22.com/ -->
  <!-- /.navbar -->