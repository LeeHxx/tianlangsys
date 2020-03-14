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
    var dip_id=$("#dip_id").val();
    if(dip_id==""){
      $("#dip_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var dip_get=$("#dip_get").val();
    var dip_recipient=$("#dip_recipient").val();
    var dip_readiness=$("#dip_readiness").val();
    var dip_first_start=$("#dip_first_satrt").val();
    var dip_first_opertor=$("#dip_first_opertor").val();
    var dip_batch_completion=$("#dip_batch_completion").val();
    var dip_batch_end=$("#dip_batch_end").val();
    var dip_opertor=$("#dip_opertor").val();
    var dip_turn_date=$("#dip_turn_date").val();
    var dip_turn_volume=$("#dip_turn_volume").val();
    if(dip_get==""){
      $("#dip_get").focus();
      return false;
    }else if(dip_recipient==""){
      $("#dip_recipient").focus();
      return false;
    }else if(dip_readiness==""){
      $("#dip_readiness").focus();
      return false;
    }else if(dip_first_start==""){
      $("#dip_first_start").focus();
      return false;
    }else if(dip_first_opertor==""){
      $("#dip_first_opertor").focus();
      return false;
    }else if(dip_batch_completion==""){
      $("#dip_batch_completion").focus();
      return false;
    }else if(dip_batch_end==""){
      $("#dip_batch_end").focus();
      return false;
    }else if(dip_opertor==""){
      $("#dip_opertor").focus();
      return false;
    }else if(dip_turn_date==""){
      $("#dip_turn_date").focus();
      return false;
    }else if(dip_turn_volume==""){
      $("#dip_turn_volume").focus();
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
                  <form action="workshop-dip-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加dip</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="dip_id" id="dip_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
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
                  <form action="workshop-dip-add_check.php" class="py-4" id="workshop-dip_add" method="post">


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
                        <label for="dip_get">领料日期</label>
                        <input type="date" class="form-control" name="dip_get" id="dip_get" value="" placeholder="领料日期">
                      </div>
                      <div class="form-group col-md-6">                      
                        <label for="dip_recipient">领料者</label>
                        <input type="text" class="form-control" name="dip_recipient" id="dip_recipient" value="" placeholder="领料者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" dip_readiness ">准备时间</label>
                        <input type="text" class="form-control" name=" dip_readiness " id=" dip_readiness " value="" placeholder="准备时间">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dip_first_start">首件生产日期</label>
                        <input type="date" class="form-control" name="dip_first_start" id="dip_first_start" placeholder="首件生产日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dip_first_opertor">首件操作者</label>
                        <input type="text" class="form-control" name="dip_first_opertor" id="dip_first_opertor" value="" placeholder="首件操作者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dip_batch_completion">批次完成量</label>
                        <input type="number" class="form-control" name="dip_batch_completion" id="dip_batch_completion" value="" placeholder="批次完成量">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" dip_batch_end ">批次完成日期</label>
                        <input type="date" class="form-control" name=" dip_batch_end " id="dip_batch_end" placeholder="批次完成日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dip_opertor">操作者</label>
                        <input type="text" class="form-control" name="dip_opertor" id="dip_opertor" value="" placeholder="操作者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" dip_turn_date ">转序日期</label>
                        <input type="date" class="form-control" name=" dip_turn_date " id="dip_turn_date" placeholder="转序日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dip_turn_volume">转序量</label>
                        <input type="number" class="form-control" name="dip_turn_volume" id="dip_turn_volume" value="" placeholder="转序量">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="workshop-dip_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加dip</button>
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
