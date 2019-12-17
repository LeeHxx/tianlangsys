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
    var passwd1=$("#passwd1").val();
    var passwd2=$("#passwd2").val();
    if(user==""){
      $("#user").focus();
      return false;
    }else if(passwd1==""){
      $("#passwd1").focus();
      return false;
     }else if(passwd2==""){
      $("#passwd2").focus();
      return false;
     }else if(passwd1!==passwd2){
      $("#passwd2").focus();
      return false;
    }else{
      $.post("register_check.php",{user:user,passwd1:passwd1},function(data){
        if($.trim(data)=='yes'){
          return true;
        }else{
          alert('error:创建失败！');
          return false;
        }
      },"text");
    }
  });
});
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
                  <h5 class="auth-form__title text-center mb-4">创建新的账户</h5>
                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">用户名</label>
                      <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" placeholder="用户名">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">密码</label>
                      <input type="password" class="form-control" id="passwd1" name="passwd1" placeholder="密码">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword2">确认密码</label>
                      <input type="password" class="form-control" id="passwd2" name="passwd2" placeholder="确认密码">
                    </div>                   
                    <div class="form-group mb-3 d-table mx-auto">
                      
                    </div>
                    <button id="btn1" type="button" class="btn btn-pill btn-accent d-table mx-auto" data-toggle="modal" data-target="#create">创建账户</button>
                    
                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">🎉🎉🎉</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            
                            <strong>账户创建成功！</strong>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='register.html'">好的</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="location.href='login.php'">登录</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
                
              </div>
              <div class="auth-form__meta d-flex mt-4">
                <a href="forgot-password.php">忘记密码?</a>
                <a class="ml-auto" href="login.php">登录?</a>
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