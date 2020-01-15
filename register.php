<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='register.php'">好的</button>
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
