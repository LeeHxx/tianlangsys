<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
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
  <?php
  session_start();
  require_once('conn.php');
  $id = $_GET['id'];
  $sql="select * from user where user_id=$id";
  $result=mysqli_query($conn,$sql);
  $sql_arr = mysqli_fetch_assoc($result);
  ?>
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
                <a class="dropdown-item " href="material-search.php">添加</a>
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
      <!-- End -->
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
          <!-- End -->
        </div>
        <!-- Page -->
        <div class="container-fluid px-0">
          <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            <strong>OK!</strong> 账号信息修改成功! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="main-content-container container-fluid px-4">
          <div class="row">
            <div class="col-lg-8 mx-auto mt-4">
              <!-- Edit User Details -->
              <div class="card card-small edit-user-details mb-4">
                <div class="card-header p-0">
                </div>
                <div class="card-body p-0">
                  <form action="#" class="py-4">
                    <div class="form-row mx-4">
                      <div class="col mb-3">
                        <h5 class="form-text m-0">基本信息</h5>
                        <p class="form-text text-muted m-0">Setup your general profile details.</p>
                      </div>
                    </div>
                    <div class="form-row mx-4">
                      <div class="col-lg-8">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="firstName">用户名</label>
                            <input type="text" class="form-control" id="firstName" value="<?php echo $sql_arr['user_name'] ?>">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="displayEmail">所属部门</label>
                            <select class="selectpicker">
                              <option value="1" selected>生产车间</option>
                              <option value="2">物料管理</option>
                            </select>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="phoneNumber">手机号码</label>
                            <div class="input-group input-group-seamless">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="material-icons">&#xE0CD;</i>
                                </div>
                              </div>
                              <input type="text" class="form-control" id="phoneNumber" value="<?php echo $sql_arr['user_id'] ?>">
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="emailAddress">电子邮箱</label>
                            <div class="input-group input-group-seamless">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="material-icons">&#xE0BE;</i>
                                </div>
                              </div>
                              <input type="email" class="form-control" id="emailAddress">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">
                      <div class="col mb-3">
                        <h5 class="form-text m-0">权限管理</h5>
                        <p class="form-text text-muted m-0">Authority management</p>
                      </div>
                    </div>

                    <div class="form-row mx-4">
                      <label for="order" class="col col-form-label"> 订单管理 <small class="form-text text-muted"> 可以对订单进行增加修改删除操作的权限</small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="checkbox" id="order" class="custom-control-input" checked>
                          <label class="custom-control-label" for="order"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="materials" class="col col-form-label"> 物料管理 <small class="form-text text-muted"> 对物料信息增加删除修改的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="checkbox" id="materials" class="custom-control-input">
                          <label class="custom-control-label" for="materials"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="craft" class="col col-form-label"> 工艺管理 <small class="form-text text-muted"> 对工艺信息增加删除修改的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="checkbox" id="craft" class="custom-control-input" checked>
                          <label class="custom-control-label" for="craft"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="warehouse" class="col col-form-label"> 仓库管理 <small class="form-text text-muted"> 对仓库信息增加删除修改的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="checkbox" id="warehouse" class="custom-control-input" checked>
                          <label class="custom-control-label" for="warehouse"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="making" class="col col-form-label"> 生产制造管理 <small class="form-text text-muted"> 对生产制造流程管理的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="checkbox" id="making" class="custom-control-input" checked>
                          <label class="custom-control-label" for="making"></label>
                        </div>
                      </div>
                    </div>
                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="quality" class="col col-form-label"> 质量管理 <small class="form-text text-muted"> 对质量信息管理的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="checkbox" id="quality" class="custom-control-input" checked>
                          <label class="custom-control-label" for="quality"></label>
                        </div>
                      </div>
                    </div>
                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="product" class="col col-form-label"> 成品管理 <small class="form-text text-muted"> 对成品信息管理的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="checkbox" id="product" class="custom-control-input" checked>
                          <label class="custom-control-label" for="product"></label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">
                      <div class="col mb-3">
                        <h5 class="form-text m-0">修改密码</h5>
                        <p class="form-text text-muted m-0">Change your current password.</p>
                      </div>
                    </div>
                    <div class="form-row mx-4">
                      <div class="form-group col-md-6">
                        <label for="firstName">旧密码</label>
                        <input type="text" class="form-control" id="firstName"  value="<?php echo $sql_arr['user_password']?>" readonly="readonly">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="lastName">新密码</label>
                        <input type="text" class="form-control" id="lastName" placeholder="新密码">
                      </div>

                    </div>
                  </form>
                </div>
                <div class="card-footer border-top">
                  <div class="row">
                    <div class="col">
                      <a href="#" class="btn btn-sm btn-accent d-table mr-3"><i class="fa fa-check mr-1"></i>保存修改</a>
                    </div>
                    <div class="col text-right view-report">
                      <a href="user.php">返回上一级 &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Edit User Details  -->
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
