<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      <!-- User avatar storage -->
        <a href="Profile.php"><img src="dist/img/avatar5.png" class="img-circle" alt="User Image"></a>
      </div>
      <div class="pull-left info">
        <p><a href="Profile.php"><?= $authenticator->UserFullName() ?></a></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <br>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <?php $url = $_SERVER['PHP_SELF'];
      $url = substr($url, strrpos($url, '/') + 1); ?>
      <?php
        $currpage = ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));
        if ($myACL->hasPermission('super_admin')) { ?>
            <li <?php if (($url == 'Admin.php') && ($_GET['page'] == "cpanel")) echo "class='active super_active'"; ?> ><a href="Admin.php?page=cpanel"><i class="fa fa-cog"></i> <span>Control Panel</span></a></li>
            <li <?php if (($url == 'Admin.php') && ($_GET['page'] == "users")) echo "class='active super_active'"; ?> ><a href="Admin.php?page=users"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <li <?php if (($url == 'Admin.php') && ($_GET['page'] == "groups")) echo "class='active super_active'"; ?> ><a href="Admin.php?page=groups"><i class="fa fa-users"></i> <span>Security Groups</span></a></li>
            <li <?php if (($url == 'Admin.php') && ($_GET['page'] == "updates")) echo "class='active super_active'"; ?> ><a href="Admin.php?page=updates"><i class="fa fa-wrench"></i> <span>Appliance Updates</span></a></li>
            <li <?php if (($url == 'Admin.php') && ($_GET['page'] == "support")) echo "class='active super_active'"; ?> ><a href="Admin.php?page=support"><i class="fa fa-question-circle"></i> <span>Support</span></a></li>
        <?php } ?>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
