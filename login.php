<?php
session_start();
if(isset($_SESSION['ischecked'])){unset($_SESSION['ischecked']);
}
?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
</head>
<body class="h-100">
  <div class="container-fluid h-100">
    <div class="row h-100">
      <!-- Main Sidebar -->

      <!-- End Main Sidebar -->
      <main class="main-content col">
        <div class="main-content-container container-fluid px-4 my-auto h-100">
          <div class="row no-gutters h-100">
            <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
              <div class="card">
                <div class="card-body">
                  <img class=" d-table mx-auto mb-3" style="max-height: 50px;" src="images/TLlogo-1.png" alt="天朗科技">
                  <h5 class="auth-form__title text-center mb-4" >南京天朗电子装备有限公司</h5>

                  <form action="login_check.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">用户名</label>
                      <div class="input-group input-group-seamless">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-user"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control" id="user" name="user" required  placeholder="用户名">
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
                        <input type="password" class="form-control" id="passwd" name="passwd" required placeholder="密码">
                        <div class="invalid-feedback"></div>
                      </div>
                    </div>
                    <div class="form-group mb-3 d-table mx-auto">

                    </div>
                    <button class="btn btn-pill btn-accent d-table mx-auto">登录</button>
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
  <script src="scripts/popper.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <script src="scripts/Chart.min.js"></script>
  <script src="scripts/shards.min.js"></script>
  <script src="scripts/jquery.sharrre.min.js"></script>
  <script src="scripts/extras.1.3.1.min.js"></script>
  <script src="scripts/shards-dashboards.1.3.1.min.js"></script>
</body>
</html>
