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
    var process_id=$("#process_id").val();
    if(process_id==""){
      $("#process_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var bom=$("#bom").val();
    var stencil=$("#stencil").val();
    var tooling=$("#tooling").val();
    var personal_allocation=$("#personal_allocation").val();
    var process_confirmation_data=$("#process_confirmation_data").val();
    var process_confirm=$("#process_confirm").val();
    if(bom==""){
      $("#bom").focus();
      return false;
    }else if(stencil==""){
      $("#stencil").focus();
      return false;
    }else if(tooling==""){
      $("#tooling").focus();
      return false;
    }else if(personal_allocation==""){
      $("#personal_allocation").focus();
      return false;
    }else if(process_confirmation_data==""){
      $("#process_confirmation_data").focus();
      return false;
    }else if(process_confirm==""){
      $("#process_confirm").focus();
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
                  <form action="process-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加工艺</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="process_id" id="process_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
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
                  <form action="process-add_check.php" class="py-4" id="process_add" method="post">


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
                        <label for="bom">bom版本</label>
                        <input type="text" class="form-control" name="bom" id="bom" value="" placeholder="bom版本">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="stencil">网板号</label>
                        <input type="text" class="form-control" name="stencil" id="stencil" value="" placeholder="网板号">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="tooling">工装</label>
                        <input type="text" class="form-control" name="tooling" id="tooling" value="" placeholder="工装">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="personal_allocation">人力配置</label>
                        <input type="text" class="form-control" name="personal_allocation" id="personal_allocation" value="" placeholder="人力配置">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="process_confirmation_data">确认日期</label>
                        <div class="input-group with-addon-icon-left" >
                          <input type="text" class="form-control" name="process_confirmation_data" id="transaction-history-date-range" placeholder="确认日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="process_confirm">确认者</label>
                        <input type="text" class="form-control" name="process_confirm" id="process_confirm" value="" placeholder="确认者">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="process_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加工艺</button>
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
