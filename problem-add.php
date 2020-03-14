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

          <?php
          session_start();
          require_once('conn.php');
          $id = $_SESSION['order_id'];
          $sql="select * from orders where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          ?>


          <div class="row">
            <div class="col-lg-8 mx-auto mt-4">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="problem-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加问题</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="problem_id" id="problem_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
                          <div class="input-group-append">
                            <button id="btn1" class="btn btn-white" type="submit"><i class="material-icons mr-2">search</i>查找订单号</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>






          <div class="row">
            <div class="col-lg-8 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="problem-add_check.php" class="py-4" id="problem_add" method="post">


                    <div class="form-row mx-4">
                      <div class="form-group col-md-6">
                        <label for="order_id">订单号</label>
                        <input type="text" class="form-control" name="order_id" id="order_id" value="<?php echo $sql_arr['order_id'] ?>" placeholder="订单号" readonly="readonly">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="order_name">品名</label>
                        <input type="text" class="form-control" name="order_name" id="order_name" value="<?php echo $sql_arr['order_name'] ?>" placeholder="品名" readonly="readonly">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="order_type">规格/型号/图号</label>
                        <input type="text" class="form-control" name="order_type" id="order_type" value="<?php echo $sql_arr['order_type'] ?>" placeholder="规格/型号/图号" readonly="readonly">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="order_volume">订单量</label>
                        <input type="number" class="form-control" name="order_volume" id="order_volume" value="<?php echo $sql_arr['order_volume'] ?>" placeholder="订单量" readonly="readonly">
                      </div>
                    </div>

                    <hr class="mx-4">
                    <div class="form-row mx-4"> 
                      <div class="form-group col-md-6">
                        <label for="feedback_date">反馈日期</label>
                        <input type="date" class="form-control" name="feedback_date" id="feedback_date" value="" placeholder="反馈日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="feedback">反馈者</label>
                        <input type="text" class="form-control" name="feedback" id="feedback" value="" placeholder="反馈者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="problem_type">问题类型</label>
                        <input type="text" class="form-control" name="problem_type" id="problem_type" value="" placeholder="问题类型">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="problem_description">问题描述</label>
                        <input type="text" class="form-control" name="problem_description" id="problem_description" value="" placeholder="问题描述">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="solving_time">要求解决日期</label>
                        <input type="date" class="form-control" name="solving_time" id="solving_time" placeholder="要求解决日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="solution">解决措施</label>
                        <input type="text" class="form-control" name="solution" id="solution" value="" placeholder="解决措施">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="problem_responsible">相关负责人</label>
                        <input type="text" class="form-control" name="problem_responsible" id="problem_responsible" value="" placeholder="相关负责人">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="problem_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加问题</button>
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
