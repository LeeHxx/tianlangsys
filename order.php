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
  <link rel="stylesheet" href="styles/shards-dashboards.1.3.1.css" id="main-stylesheet" data-version="1.3.1">
  <link rel="stylesheet" href="styles/extras.1.3.1.min.css">
  <link rel="stylesheet" href="styles/responsive.dataTables.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
</head>
<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- 侧边栏 -->
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
              <a class="nav-link dropdown-toggle  active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">insert_drive_file</i>
                <span>订单管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item  active" href="order.php">订单列表</a>
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
      <!-- End 侧边栏 -->
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
        <!-- end 顶栏 -->
        <!-- Page -->
        <div class="main-content-container container-fluid px-4 mb-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">order</span>
              <h3 class="page-title">订单列表</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="order-add.php" class="btn btn-primary"><i class="fa fa-plus mr-1"></i> 添加订单 </a>
              </div>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Order Table -->
          <table class="transaction-history d-none">
            <thead>
              <tr>
                <th>订单号</th>
                <th>接单日期</th>
                <th>客户</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>交货日期</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from login";
              $result=mysqli_query($conn,$sql);
              $loginNum=mysqli_num_rows($result);
              for($i=0; $i<$loginNum; $i++){
                $row = mysqli_fetch_assoc($result);
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['zh']}</td>";
                echo "<td>{$row['mm']}</td>";
                echo "<td>{$row['zh']}</td>";
                echo "<td>{$row['mm']}</td>";
                echo "<td>管理员</td>";
                echo "<td>管理员</td>";
                echo "<td>
                <div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                <button type='button' class='btn btn-white'>
                <i class='material-icons'>&#xE254;</i>
                </button>
                <button type='button' class='btn btn-danger'>
                <i class='material-icons'>&#xE872;</i>
                </button>
                </div>
                </td>";
                echo "</tr>";
              }
              mysqli_free_result($result);
              mysqli_close($conn);
              ?>

            </tbody>
          </table>
          <!-- End Order Table -->
        </div>
        <!-- end Page -->
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
  <script src="scripts/app/app-transaction-history.1.3.1.min.js"></script>
</body>
</html>