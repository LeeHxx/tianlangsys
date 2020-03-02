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
    var order_id=$("#order_id").val();
    var order_name=$("#order_name").val();
    var order_type=$("#order_type").val();
    var order_volume=$("#order_volume").val();
    var order_client=$("#order_client").val();
    var order_start=$("#order_start").val();
    var order_end=$("#order_end").val();
    if(order_id==""){
      $("#order_id").focus();
      return false;
    }else if(order_name==""){
      $("#order_name").focus();
      return false;
     }else if(order_type==""){
      $("#order_type").focus();
      return false;
    }else if(order_volume==""){
      $("#order_volume").focus();
      return false;
     }else if(order_client==""){
      $("#order_client").focus();
      return false;
     }else if(order_start==""){
      $("#order_start").focus();
      return false;
     }else if(order_end==""){
      $("#order_end").focus();
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
        <!-- Page -->
        <div class="main-content-container container-fluid px-4 mb-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">order</span>
              <h3 class="page-title">修改订单</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="order.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回列表 </a>
              </div>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Transaction History Table -->


          <?php
          session_start();
          require_once('conn.php');
          $id = $_GET['id'];
          $sql="select * from orders where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          ?>



          <div class="row">
            <div class="col-lg-12 mx-auto">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="order-edit_check.php" class="py-4" id="order_edit" method="post">
                    <!--<div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">订单信息</h5>
                      </div>
                    </div>
                    <hr>-->
                    <div class="form-row mx-4 mt-2">
                      <div class="form-group col-md-3">
                        <label for="order_id">订单号</label>
                        <input type="text" class="form-control" name="order_id" id="order_id" value="<?php echo $sql_arr['order_id'] ?>" placeholder="订单号" readonly="readonly">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="order_name">品名</label>
                        <input type="text" class="form-control" name="order_name" id="order_name" value="<?php echo $sql_arr['order_name'] ?>" placeholder="品名">
                      </div>

                      <div class="form-group col-md-3">
                        <label for="order_type">规格/型号/图号</label>
                        <input type="text" class="form-control" name="order_type" id="order_type" value="<?php echo $sql_arr['order_type'] ?>" placeholder="规格/型号/图号">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="order_volume">订单量</label>
                        <input type="number" class="form-control" name="order_volume" id="order_volume" value="<?php echo $sql_arr['order_volume'] ?>" placeholder="订单量">
                      </div>
                    </div>
                    <div class="form-row mx-4">
                      <div class="form-group col-md-4">
                        <label for="order_client">客户</label>
                        <input type="text" class="form-control" name="order_client" id="order_client" value="<?php echo $sql_arr['order_client'] ?>" placeholder="客户名称">
                      </div>
                      <div class="form-group col-md-8">
                        <label for="firstName">接交单日期</label>
                        <div class="input-daterange input-group" id="transaction-history-date-range">
                          <span class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          <input type="text" class="input-sm form-control" name="order_start" id="order_start" value="<?php echo $sql_arr['order_start'] ?>" placeholder="接单日期" />
                          <span class="input-group-middle"><span class="input-group-text">-</span></span>
                          <input type="text" class="input-sm form-control" name="order_end" id="order_end" value="<?php echo $sql_arr['order_end'] ?>" placeholder="交货日期" />
                          <span class="input-group-append">
                            <span class="input-group-text">
                              <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top">
                  <div class="col">
                    <button id="btn1" form="order_edit" class="btn  btn-info mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>保存修改</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Transaction History Table -->
        </div>
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
