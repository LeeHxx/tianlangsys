<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
  <script type="text/javascript">
$(document).ready(function(){
  $("#btn1").click(function(){
    var problem_id=$("#problem_id").val();
    if(problem_id==""){
      $("#problem_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var feedback_date=$("#feedback_date").val();
    var feedback=$("#feedback").val();
    var problem_type=$("#problem_type").val();
    var problem_description=$("#problem_description").val();
    var solving_time=$("#solving_time").val();
    var solution=$("#solution").val();
    var problem_responsible=$("#problem_responsible").val();
    if(feedback_date==""){
      $("#feedback_date").focus();
      return false;
    }else if(feedback==""){
      $("#feedback").focus();
      return false;
    }else if(problem_type==""){
      $("#problem_type").focus();
      return false;
    }else if(problem_description==""){
      $("#problem_description").focus();
      return false;
    }else if(solving_time==""){
      $("#solving_time").focus();
      return false;
    }else if(solution==""){
      $("#solution").focus();
      return false;
    }else if(problem_responsible==""){
      $("#problem_responsible").focus();
      return false;
    }

  });
});
</script>
</head>
<body class="h-100">
  <div class="container-fluid">
    <div class="row">
      <!-- 侧边栏 -->
      <?php include('sidebar.php') ?>
      <!-- End 侧边栏 -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- 顶栏 -->
          <?php include('navbar.php') ?>
        </div>
        <!-- end 顶栏 -->
        <!-- Page -->
        <div class="main-content-container container-fluid px-4 mb-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">problem</span>
              <h3 class="page-title">问题管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="problem-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>

          </div>

          <?php
          session_start();
          require_once('conn.php');
          $id = $_SESSION['order_id'];
          $sql="select * from orders where order_id='$id' ";
          $sql0="select * from problem where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          $result0=mysqli_query($conn,$sql0);
          $sql_arr0 = mysqli_fetch_assoc($result0);
          ?>



          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="problem-search_check.php" class="main-navbar__search w-100 " id="problem_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="problem_id" id="problem_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>（已编辑）" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="problem-edit_check.php" class="py-4" id="problem_add0" method="post">


                    <div class="form-row mx-4">
                      <div class="form-group col-md-3">
                        <label for="order_id">订单号</label>
                        <input type="text" class="form-control" name="order_id" id="order_id" value="<?php echo $sql_arr['order_id'] ?>" placeholder="订单号" readonly="readonly">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="order_name">品名</label>
                        <input type="text" class="form-control" name="order_name" id="order_name" value="<?php echo $sql_arr['order_name'] ?>" placeholder="品名" readonly="readonly">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="order_type">规格/型号/图号</label>
                        <input type="text" class="form-control" name="order_type" id="order_type" value="<?php echo $sql_arr['order_type'] ?>" placeholder="规格/型号/图号" readonly="readonly">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="order_volume">订单量</label>
                        <input type="number" class="form-control" name="order_volume" id="order_volume" value="<?php echo $sql_arr['order_volume'] ?>" placeholder="订单量" readonly="readonly">
                      </div>
                    </div>

                    <hr class="mx-4">
                    <div class="form-row mx-4">
                      <div class="form-group col-md-2">
                        <label for="feedback_date">反馈日期</label>
                        <input type="text" class="form-control" name="feedback_date" id="feedback_date" value="<?php echo $sql_arr0['feedback_date'] ?>" placeholder="反馈日期">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="feedback">反馈者</label>
                        <input type="text" class="form-control" name="feedback" id="feedback" value="<?php echo $sql_arr0['feedback'] ?>" placeholder="反馈者">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="problem_type">问题类型</label>
                        <input type="text" class="form-control" name="problem_type" id="problem_type" value="<?php echo $sql_arr0['problem_type'] ?>" placeholder="问题类型">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="problem_description">问题描述</label>
                        <input type="text" class="form-control" name="problem_description" id="problem_description" value="<?php echo $sql_arr0['problem_description'] ?>" placeholder="问题描述">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="solving_time">要求解决时间</label>
                          <input type="text" class="form-control" name="solving_time" id="solving_time" value="<?php echo $sql_arr0['solving_time'] ?>" placeholder="要求解决时间">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="solution">解决措施</label>
                        <input type="text" class="form-control" name="solution" id="solution" value="<?php echo $sql_arr0['solution'] ?>" placeholder="解决措施">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="problem_responsible">相关负责人</label>
                        <input type="text" class="form-control" name="problem_responsible" id="problem_responsible" value="<?php echo $sql_arr0['problem_responsible'] ?>" placeholder="相关负责人">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="problem_add0" class="btn  btn-info mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>保存问题信息</button>
                  </div>
                </div>
              </div>
            </div>
          </div>




          </div>
        <!-- end Page -->
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
