<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>生产计划进度管理系统</title>
  <meta name="description" content="tianlang">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="styles/all.css">
  <link rel="stylesheet" href="styles/icon.css">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <link rel="stylesheet" id="main-stylesheet" data-version="1.3.1" href="styles/shards-dashboards.1.3.1.css">
  <link rel="stylesheet" href="styles/extras.1.3.1.min.css">
  <link rel="stylesheet" href="styles/responsive.dataTables.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <script src="scripts/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    function usable (id) {
      $.post("usable.php?id="+id,function(data){
        if($.trim(data)=='yes'){

          window.location.href='user.php';
          return true;
        }else{

          window.location.href='user.php';
          return false;
        }
      },"text");
    }
  </script>
</head>
<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- 侧栏 -->
      <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
        <div class="main-navbar">
          <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
              <div class="d-table m-auto">
                <!--<img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/logo.svg" alt="Shards Dashboard">-->
                <span class="  d-md-inline ml-1">生产管理系统</span>
              </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
              <i class="material-icons">&#xE5C4;</i>
            </a>
          </nav>
        </div>

        <div class="nav-wrapper">
          <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown open">
              <a class="nav-link dropdown-toggle  " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">insert_drive_file</i>
                <span>订单管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item  " href="order.php">订单列表</a>
                <a class="dropdown-item " href="order-add.php">添加订单</a>
              </div>
            </li>
            <li class="nav-item  dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">assignment_returned</i>
                <span>物料管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="material.php">物料列表</a>
                <a class="dropdown-item " href="material-add.php">添加</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">straighten</i>
                <span>工艺管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="process.php">工艺列表</a>
                <a class="dropdown-item " href="process-add.php">添加</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">home_work</i>
                <span>仓库管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="warehouse.php">仓库列表</a>
                <a class="dropdown-item " href="warehouse-add.php">添加</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">all_inclusive</i>
                <span>生产制造管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="workshop-smt.php">车间作业</a>
                <a class="dropdown-item " href="problem.php">问题反馈记录单</a>
                <a class="dropdown-item " href="addition.php">物料补领申请单</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">playlist_add_check</i>
                <span>质量管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="quality.php">质量列表</a>
                <a class="dropdown-item " href="quality-add.php">添加</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">local_shipping</i>
                <span>成品管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="product.php">成品列表</a>
                <a class="dropdown-item " href="product-add.php">添加成品</a>
              </div>
            </li>
          </ul>
        </div>
      </aside>
      <!-- End 侧栏 -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- 顶栏 -->
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
                  <a class="dropdown-item" href="#">
                    <div class="notification__icon-wrapper">
                      <div class="notification__icon">
                        <i class="material-icons">&#xE6E1;</i>
                      </div>
                    </div>
                    <div class="notification__content">
                      <span class="notification__category">消息</span>
                      <p>仓库齐套来料排配超时！<span class="text-success text-semibold"></span> 请尽快处理！</p>
                    </div>
                  </a>

                  <a class="dropdown-item notification__all text-center" href="#"> 查看所有消息 </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <img class="user-avatar rounded-circle mr-2" src="images/avatars/admin.png" alt="User Avatar"> <span class="d-none d-md-inline-block"><?php echo $_SESSION['user'];?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item" href="userInfo.php"><i class="material-icons">&#xE7FD;</i> 账户信息</a>

                  <?php if($_SESSION['admin']=='1'){?>
                    <a class="dropdown-item" href="user.php"><i class="material-icons">&#xE8B8;</i> 账户管理</a>
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
        </div>
        <!-- Page -->
        <div class="main-content-container container-fluid px-4 mb-4">
          <!-- Page Header
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">user</span>
              <h3 class="page-title">用户管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="order.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回主页 </a>
              </div>
            </div>
          </div>
           End Page Header -->
          <!--  Table -->
          <div class="row">
            <div class="col-lg-8 mx-auto mt-4">
              <div class="card card-small  h-100">
                <div class="card-header border-bottom">
                  <h6 class="m-0">账户列表</h6>
                  <div class="block-handle"></div>
                </div>
                <div class="card-body p-0">

                  <div class="container-fluid px-0">

                    <table class="table mb-0 lo-stats">
                      <thead class="py-2 bg-light text-semibold border-bottom">
                        <tr>
                          <th></th>
                          <th>用户名</th>
                          <th class="text-center">状态</th>
                          <th class="text-right"></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        require_once('conn.php');
                        $sql1="select * from user where admin=1";
                        $sql0="select * from user where admin=0";
                        $result1=mysqli_query($conn,$sql1);
                        $result0=mysqli_query($conn,$sql0);
                        $loginNum1=mysqli_num_rows($result1);
                        $loginNum0=mysqli_num_rows($result0);
                        for($i=0; $i<$loginNum1; $i++){
                          $row1 = mysqli_fetch_assoc($result1);
                          echo "<tr>";
                          echo "<td class='lo-stats__image'>
                          <img class='border rounded' src='images/avatars/admin.png'>
                          </td>";
                          echo "<td class='lo-stats__order-details'>
                          <span>#{$row1['user_name']}</span>
                          <span>21 February 2018 20:32</span>
                          </td>";
                          echo "<td class='lo-stats__status'>
                          <div class='d-table mx-auto'>
                          <span class='badge badge-pill badge-success'>可用</span>
                          </div>
                          </td>";
                          echo "<td class='lo-stats__actions'>
                          <div class='btn-group d-table ml-auto' role='group' aria-label='Basic example'>

                          <button type='button' class='btn btn-sm btn-white'>管理</button>

                          <button type='submit' class='btn btn-sm btn-white' disabled>禁用</button>

                          <button type='button' class='btn btn-sm btn-white' disabled>删除</button>

                          </div>
                          </td>";
                          echo "</tr>";
                        };


                        for($i=0; $i<$loginNum0; $i++){
                          $row0 = mysqli_fetch_assoc($result0);
                          echo "<tr>";
                          echo "<td class='lo-stats__image'>
                          <img class='border rounded' src='images/avatars/admin.png'>
                          </td>";
                          echo "<td class='lo-stats__order-details'>
                          <span>#{$row0['user_name']}</span>
                          <span>21 February 2018 20:32</span>
                          </td>";
                          if ($row0['usable']==1) {
                            echo "<td class='lo-stats__status'>
                            <div class='d-table mx-auto'>
                            <span class='badge badge-pill badge-success'>可用</span>
                            </div>
                            </td>";
                            echo "<td class='lo-stats__actions'>
                            <form action='javascript:usable({$row0['user_id']})' method='post' id='u{$i}'>
                            </form>
                            <form action='user-edit.php?id={$row0['user_id']}' method='post' id='e{$i}'>
                            </form>
                            <div class='btn-group d-table ml-auto' role='group' aria-label='Basic example'>

                            <button form='e{$i}' type='submit' class='btn btn-sm btn-white'>管理</button>

                            <button form='u{$i}' type='submit' class='btn btn-sm btn-white'>停用</button>

                            <button type='button' class='btn btn-sm btn-danger'>删除</button>

                            </div>
                            </td>";
                          }else{
                            echo "<td class='lo-stats__status'>
                            <div class='d-table mx-auto'>
                            <span class='badge badge-pill badge-warning'>停用</span>
                            </div>
                            </td>";
                            echo "<td class='lo-stats__actions'>
                            <form action='javascript:usable({$row0['user_id']})' method='post' id='u{$i}'>
                            </form>
                            <div class='btn-group d-table ml-auto' role='group' aria-label='Basic example'>
                            <button type='button' class='btn btn-sm btn-white'>管理</button>
                            <button form='u{$i}' type='submit' class='btn btn-sm btn-white'>启用</button>
                            <button type='button' class='btn btn-sm btn-danger'>删除</button>
                            </div>
                            </td>";
                          }
                          echo "</tr>";
                        }
                        mysqli_free_result($result0);
                        mysqli_free_result($result1);
                        mysqli_close($conn);
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer border-top">
                  <div class="row">
                    <div class="col text-right view-report">
                      <a href="order.php">返回主页 &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End table -->
        </div>
        <!--  End Page -->
      </main>
    </div>
  </div>
  <script src="scripts/jquery-3.3.1.min.js"></script>
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.js"></script>
  <script src="scripts/Chart.min.js"></script>
  <script src="scripts/shards.js"></script>
  <script src="scripts/buttons.js"></script>
  <script src="scripts/jquery.sharrre.min.js"></script>
  <script src="scripts/extras.1.3.1.min.js"></script>
  <script src="scripts/shards-dashboards.1.3.1.js"></script>
  <script src="scripts/jquery.dataTables.js"></script>
  <script src="scripts/dataTables.responsive.js"></script>
</body>
</html>
