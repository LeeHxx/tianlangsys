<?php
session_start();
if(isset($_SESSION['ischecked'])){unset($_SESSION['ischecked']);
}
?>
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
    $(document).ready(function(){
      $("#btn1").click(function(){
        var user=$("#user").val();
        var passwd=$("#passwd").val();
        if(user==""){
          $("#user").focus();
          return false;
        }else if(passwd==""){
          $("#passwd").focus();
          return false;
        }else{
          $.post("login_check.php",{user:user,passwd:passwd},function(data){
            if($.trim(data)=='yes'){
              window.location.href='order.php';
              return true;
            }else{
              window.location.href='relogin.php';
              return false;
            }
          },"text");
        }
      });
      $(document).keydown(function (event) {
        if (event.keyCode == 13) {
          $('#btn1').triggerHandler('click');
        }
      });
    }
    );
  </script>
</head>
<body class="h-100">
  <div class="container-fluid icon-sidebar-nav h-100">
    <div class="row h-100">
      <!-- Main Sidebar -->
      <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
        <div class="main-navbar">
          <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
              <div class="d-table m-auto">
                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 30px;" src="images/TLlogo-1.png" alt="天朗科技">
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
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">insert_drive_file</i>
                <span>订单管理</span>
              </a>

            </li>
            <li class="nav-item  dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">assignment_returned</i>
                <span>物料管理</span>
              </a>

            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">straighten</i>
                <span>工艺管理</span>
              </a>

            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">home_work</i>
                <span>仓库管理</span>
              </a>

            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">all_inclusive</i>
                <span>生产制造管理</span>
              </a>

            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">playlist_add_check</i>
                <span>质量管理</span>
              </a>

            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="material-icons">local_shipping</i>
                <span>成品管理</span>
              </a>

            </li>
          </ul>
        </div>
      </aside>
      <!-- End Main Sidebar -->
      <main class="main-content col">
        <div class="main-content-container container-fluid px-4 my-auto h-100">
          <div class="row no-gutters h-100">
            <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
              <div class="card">
                <div class="card-body">
                  <img class=" d-table mx-auto mb-3" style="max-height: 50px;" src="images/TLlogo-1.png" alt="天朗科技">
                  <h5 class="auth-form__title text-center mb-2" style="font-size: 20px; color: #3d5170; font-weight: 500;">南京天朗电子装备有限公司</h5>
                  <h5 class="auth-form__title text-center mb-4">生产制造管理系统</h5>
                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">用户名</label>
                      <div class="input-group input-group-seamless">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-user"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" placeholder="用户名">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">密码</label>
                      <div class="input-group input-group-seamless">
                        <span class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                          </span>
                        </span>
                        <input type="password" class="form-control" id="passwd" name="passwd" placeholder="密码">
                      </div>
                    </div>
                    <div class="form-group mb-3 d-table mx-auto">

                    </div>
                    <button id="btn1" type="button" class="btn btn-pill btn-accent d-table mx-auto">登录</button>
                  </form>
                </div>

              </div>
              <div class="auth-form__meta d-flex mt-4">
                <a href="forgot-password.php">忘记密码?</a>
                <a class="ml-auto" href="register.php">创建账户?</a>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="scripts/jquery-3.3.1.min.js"></script>
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <script src="scripts/Chart.min.js"></script>
  <script src="scripts/shards.min.js"></script>
  <script src="scripts/jquery.sharrre.min.js"></script>
  <script src="scripts/extras.1.3.1.min.js"></script>
  <script src="scripts/shards-dashboards.1.3.1.min.js"></script>
</body>
</html>