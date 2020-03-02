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
    var process_confirmation_data=$("#transaction-history-date-range").val();//取值为id值，非name值
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
      $("#transaction-history-date-range").focus();
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
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">process</span>
              <h3 class="page-title">工艺管理</h3>
            </div>

          </div>

          <?php
          session_start();
          require_once('conn.php');
          $id = $_SESSION['order_id'];
          $sql="select * from orders where order_id='$id' ";
          $sql0="select * from process where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          $result0=mysqli_query($conn,$sql0);
          $sql_arr0 = mysqli_fetch_assoc($result0);
          ?>



          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="process-search_check.php" class="main-navbar__search w-100 " id="process_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="process_id" id="process_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>（已编辑）" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="process-edit_check.php" class="py-4" id="process_add0" method="post">


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
                        <label for="bom">bom版本</label>
                        <input type="text" class="form-control" name="bom" id="bom" value="<?php echo $sql_arr0['bom'] ?>" placeholder="bom版本">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="stencil">网板号</label>
                        <input type="text" class="form-control" name="stencil" id="stencil" value="<?php echo $sql_arr0['stencil'] ?>" placeholder="网板号">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="tooling">工装</label>
                        <input type="text" class="form-control" name="tooling" id="tooling" value="<?php echo $sql_arr0['tooling'] ?>" placeholder="工装">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="personal_allocation">人力配置</label>
                        <input type="text" class="form-control" name="personal_allocation" id="personal_allocation" value="<?php echo $sql_arr0['personal_allocation'] ?>" placeholder="人力配置">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="process_confirmation_data">确认日期</label>
                        <div class="input-group with-addon-icon-left" >
                          <input type="text" class="form-control" name="process_confirmation_data" id="transaction-history-date-range" value="<?php echo $sql_arr0['process_confirmation_data'] ?>" placeholder="确认日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="process_confirm">确认者</label>
                        <input type="text" class="form-control" name="process_confirm" id="process_confirm" value="<?php echo $sql_arr0['process_confirmor'] ?>" placeholder="确认者">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="process_add0" class="btn  btn-info mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>保存工艺信息</button>
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
