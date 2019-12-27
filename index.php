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
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/shards-dashboards.1.3.1.css" id="main-stylesheet" data-version="1.3.1">
  <link rel="stylesheet" href="styles/extras.1.3.1.min.css">
  <link rel="stylesheet" href="styles/responsive.dataTables.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
</head>
<body class="h-100">
  <div class="container-fluid ">
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
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">insert_drive_file</i>
                <span>订单管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="order.php">订单列表</a>
                <a class="dropdown-item " href="order-add.php">添加订单</a>
              </div>
            </li>
            <li class="nav-item  dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">assignment_returned</i>
                <span>物料管理</span>
              </a>
              <div class="dropdown-menu  dropdown-menu-small">
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
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">home_work</i>
                <span>仓库管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="warehouse.php">仓库列表</a>
                <a class="dropdown-item " href="warehouse-add.php">添加</a>
              </div>
            </li>



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">all_inclusive</i>
                <span>生产制造管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <div class="dropdown">
                  <a class="dropdown-item  " data-toggle="dropdown" href="#">车间作业</a>
                  <div class="dropdown-menu  dropdown-menu-small">
                    <a class="dropdown-item " href="#">STM</a>
                  </div>


                </div>

                <a class="dropdown-item " href="problem.php">问题反馈记录单</a>
                <a class="dropdown-item " href="addition.php">物料补领申请单</a>
              </div>
            </li>





            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">playlist_add_check</i>
                <span>质量管理</span>
              </a>
              <div class="dropdown-menu dropdown-menu-small">
                <a class="dropdown-item " href="quality.php">质量列表</a>
                <a class="dropdown-item " href="quality-add.php">添加</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
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
        <div class="main-content-container container-fluid px-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">


            </div>

          </div>

          <!-- End Page Header -->
          <!-- Order Table -->
          <div class="row">


          <div class="col-lg-9   mb-4">
            <div class="card card-small mb-4">
              <div class="jumbotron" style="background:#fff;">
                <h1 class="display-4" style="font-weight: 400;">欢迎使用!</h1>
                <p class="lead">欢迎使用南京天朗电子装配有限公司生产管理系统.</p>
                <hr class="my-4">
                <p>查看订单信息或者添加新的订单?</p>
                <a class="btn btn-primary btn-pill  btn-lg" href="order.php" role="button"><i class="material-icons mr-2">insert_drive_file</i>添加订单</a>
                <hr class="my-4">
                <p>物料入库或者修改物料详细信息？</p>
                <a class="btn btn-primary btn-pill btn-lg" href="#" role="button"><i class="material-icons mr-2">assignment_returned</i>物料管理</a>
                <hr class="my-4">
                <p>填写问题反馈记录单？</p>
                <a class="btn btn-primary btn-pill btn-lg" href="#" role="button"><i class="material-icons mr-2">report</i>问题反馈</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 mb-4">
                <!-- Sliders & Progress Bars -->
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">订单交货日期提醒</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-3">
                      <!-- Progress Bars -->
                      <div class="mb-2">
                        <strong class="text-muted d-block mb-3">订单TL0001</strong>

                        <div id="slider-example-1" class="slider-danger  noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;">
                          <div class="noUi-base">
                            <div class="noUi-connects">
                              <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.25, 1);">
                              </div>
                            </div>
                            <div class="noUi-origin" style="transform: translate(-75%, 0px); z-index: 4;">
                              <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="25.00" aria-valuetext="25.00">
                                <div class="noUi-tooltip">剩余1天</div>
                              </div>
                            </div>
                          </div>
                        </div>



                        <hr class="my-4">
                        <strong class="text-muted d-block mb-3">订单TL0002</strong>
                        <div id="slider-example-1" class="slider-warning noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;">
                          <div class="noUi-base">
                            <div class="noUi-connects">
                              <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.40, 1);">
                              </div>
                            </div>
                            <div class="noUi-origin" style="transform: translate(-60%, 0px); z-index: 4;">
                              <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="25.00" aria-valuetext="25.00">
                                <div class="noUi-tooltip">剩余2天</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4">
                        <strong class="text-muted d-block mb-3">订单TL0003</strong>
                        <div id="slider-example-1" class="slider-info noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;">
                          <div class="noUi-base">
                            <div class="noUi-connects">
                              <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.60, 1);">
                              </div>
                            </div>
                            <div class="noUi-origin" style="transform: translate(-40%, 0px); z-index: 4;">
                              <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="25.00" aria-valuetext="25.00">
                                <div class="noUi-tooltip">剩余3天</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr class="my-4">
                        <strong class="text-muted d-block mb-3">订单TL0004</strong>


                        <div id="slider-example-3" class="slider-success noUi-target noUi-ltr noUi-horizontal">
                          <div class="noUi-base">
                            <div class="noUi-connects">
                              <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.85, 1);">
                              </div>
                            </div>
                            <div class="noUi-origin" style="transform: translate(-15%, 0px); z-index: 4;">
                              <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="85.0" aria-valuetext="85.00">
                                <div class="noUi-tooltip">剩余4天
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="noUi-pips noUi-pips-horizontal">
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 0%;"></div>
                            <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="0" style="left: 0%;">0天</div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 5%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 10%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 15%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 20%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 25%;"></div>
                            <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="25" style="left: 25%;">1天</div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 30%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 35%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 40%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 45%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 50%;"></div>
                            <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="50" style="left: 50%;">2天
                            </div><div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 55%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 60%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 65%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 70%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 75%;"></div>
                            <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="75" style="left: 75%;">3天</div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 80%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 85%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 90%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 95%;"></div>
                            <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 100%;"></div>
                            <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="100" style="left: 100%;">4天</div>
                          </div>
                        </div>
                      </div>
                      <!-- / Progress Bars -->
                    </li>

                  </ul>
                </div>
                <!-- / Sliders & Progress Bars -->

              </div>

            </div>
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
