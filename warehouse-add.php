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
    var w_id=$("#w_id").val();
    if(w_id==""){
      $("#w_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var warehouse_place=$("#warehouse_place").val();
    var warehouse_kitting=$("#warehouse_kitting").val();
    var warehouse_preprocessing=$("#warehouse_preprocessing").val();
    var warehouse_keeper=$("#warehouse_keeper").val();
    var warehouse_turn_department=$("#warehouse_turn_department").val();
    var warehouse_turn_volume=$("#warehouse_turn_volume").val();
    var warehouse_turn_date=$("#transaction-history-date-range").val();
    var warehouse_turn_group=$("#warehouse_turn_group").val();
    if(warehouse_place==""){
      $("#warehouse_place").focus();
      return false;
    }else if(warehouse_kitting==""){
      $("#warehouse_kitting").focus();
      return false;
    }else if(warehouse_preprocessing==""){
      $("#warehouse_preprocessing").focus();
      return false;
    }else if(warehouse_keeper==""){
      $("#warehouse_keeper").focus();
      return false;
    }else if(warehouse_turn_department==""){
      $("#warehouse_turn_department").focus();
      return false;
    }else if(warehouse_turn_volume==""){
      $("#warehouse_turn_volume").focus();
      return false;
    }else if(warehouse_turn_date==""){
      $("#transaction-history-date-range").focus();
      return false;
    }else if(warehouse_turn_group==""){
      $("#warehouse_turn_group").focus();
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
                  <form action="warehouse-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加库存</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="w_id" id="w_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
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
                  <form action="warehouse-add_check.php" class="py-4" id="warehouse_add" method="post">


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
                        <label for="warehouse_place">存放位置</label>
                        <input type="text" class="form-control" name="warehouse_place" id="warehouse_place" value="" placeholder="存放位置">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" warehouse_kitting ">是否齐套</label>
                        <input type="text" class="form-control" name=" warehouse_kitting " id=" warehouse_kitting " value="" placeholder="是否齐套">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="warehouse_preprocessing">有无预处理</label>
                        <input type="text" class="form-control" name="warehouse_preprocessing" id="warehouse_preprocessing" value="" placeholder="有无预处理">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="warehouse_keeper">库管员</label>
                        <input type="text" class="form-control" name="warehouse_keeper" id="warehouse_keeper" value="" placeholder="库管员">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="warehouse_turn_department">转序部门</label>
                        <input type="text" class="form-control" name="warehouse_turn_department" id="warehouse_turn_department" value="" placeholder="转序部门">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="warehouse_turn_volume">转序量</label>
                        <input type="number" class="form-control" name="warehouse_turn_volume" id="warehouse_turn_volume" value="" placeholder="转序量">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="warehouse_turn_date">转序日期</label>
                        <div class="input-group with-addon-icon-left" >
                          <input type="text" class="form-control" name="warehouse_turn_date" id="transaction-history-date-range" placeholder="转序日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="warehouse_turn_group">转序班组</label>
                        <input type="text" class="form-control" name="warehouse_turn_group" id="warehouse_turn_group" value="" placeholder="转序班组">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="warehouse_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加库存</button>
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
