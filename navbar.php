<nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
  <div  class=" w-100 d-none d-md-flex d-lg-flex">
    <div class="d-table " style="margin-top: auto !important;margin-right: auto !important;margin-bottom: auto !important;margin-left: auto !important;">
      <img id="main-logo" class="d-inline-block align-top mr-1" style="max-height: 33px;" src="images/TLlogo-1.png" alt="Dashboard">
      <a class="d-md-inline ml-1" style="font-size: 22px; color: #3d5170; font-weight: 900;">&nbsp&nbsp&nbsp南京天朗电子装备有限公司</a>
    </div>
  </div>
  <ul class="navbar-nav border-left flex-row ">
    <li class="nav-item border-right dropdown notifications">
      <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="nav-link-icon__wrapper">
          <i class="material-icons">&#xE7F4;</i>
          <span class="badge badge-pill badge-danger">2</span>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">

        <?php
        require_once('conn.php');
        date_default_timezone_set('Asia/Shanghai');
        $time_now=strtotime(date("Y-m-d"));
        $sql_time="select * from orders where order_finished=0";
        $result_time=mysqli_query($conn,$sql_time);
        $loginNum_time=mysqli_num_rows($result_time);
        for($i=0; $i<$loginNum_time; $i++){
          $row_time = mysqli_fetch_assoc($result_time);
          $time_end = strtotime($row_time['order_end']);
          $time_left =ceil(($time_end-$time_now)/86400);
          // echo $time_left;
          if ($time_left<'100' and $time_left>'0') {

          echo "<a class='dropdown-item' href='order-status.php?id={$row_time['order_id']}'>
            <div class='notification__icon-wrapper'>
              <div class='notification__icon'>
                <i class='material-icons'>priority_high</i>
              </div>
            </div>
            <div class='notification__content'>
              <span class='notification__category'>注意</span>
              <p><span class='text-danger text-semibold'>订单-{$row_time['order_id']}-</span>距离交货日期不足100天！ 请尽快处理！</p>
            </div>
          </a>";
          }
        }
        mysqli_free_result($result_time);
        // mysqli_close($conn);
        ?>



        <a class="dropdown-item notification__all text-center" href="#"> 查看所有消息 </a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img class="user-avatar rounded-circle mr-2" src="images/avatars/ren.png" alt="User Avatar"> <span class="d-none d-md-inline-block">您好，<?php echo $_SESSION['user'];?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-small">
        <a class="dropdown-item" href="userInfo.php"><i class="material-icons">&#xE7FD;</i> 账户信息</a>

        <?php if($_SESSION['admin']=='1'){?>
          <a class="dropdown-item" href="user.php" target="_blank"><i class="material-icons">&#xE8B8;</i> 账户管理</a>
        <?php }?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger" href="login.php"><i class="material-icons text-danger">&#xE879;</i> 安全退出 </a>
      </div>
    </li>
  </ul>
  <nav class="nav">
    <a href="#" class="nav-link nav-link-icon toggle-sidebar d-sm-inline d-md-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
      <i class="material-icons">&#xE5D2;</i>
    </a>
  </nav>
</nav>
<div class="tl-loader">
  <div class="spinner-border" style="width:50px;height:50px;margin:auto;position:absolute;top:0;bottom:0;left:0;right:0;" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
