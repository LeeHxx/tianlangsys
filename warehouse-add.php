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
    var warehouse_turn_date=$("#transaction-history-date-range").val();//取值为id值，非name值
    var warehouse_turn_group=$("#process_confirm").val();
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
$('.datepicker').datepicker({
  format: "yyyy-mm-dd",
  orientation:"top",
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
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">warehouse</span>
              <h3 class="page-title">仓库管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="warehouse-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>

          </div>

          <?php
          session_start();
          require_once('conn.php');
          $id = $_SESSION['order_id'];
          $sql="select * from orders where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          ?>



          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="warehouse-search_check.php" class="main-navbar__search w-100 " id="warehouse_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="w_id" id="w_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="warehouse-add_check.php" class="py-4" id="warehouse_add0" method="post">


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
                      <div class="form-group col-md-3">
                        <label for="warehouse_place">存放位置</label>
                        <input type="text" class="form-control" name="warehouse_place" id="warehouse_place" value="" placeholder="存放位置">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="warehouse_kitting">是否齐套</label>
                        <input type="text" class="form-control" name="warehouse_kitting" id="warehouse_kitting" value="" placeholder="是否齐套">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="warehouse_preprocessing">有无预处理</label>
                        <input type="text" class="form-control" name="warehouse_preprocessing" id="warehouse_preprocessing" value="" placeholder="有无预处理">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="warehouse_keeper">物管员</label>
                        <input type="text" class="form-control" name="warehouse_keeper" id="warehouse_keeper" value="" placeholder="物管员">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="warehouse_turn_department">转序部门</label>
                        <input type="text" class="form-control" name="warehouse_turn_department" id="warehouse_turn_department" value="" placeholder="转序部门">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="warehouse_turn_volume">转序量</label>
                        <input type="number" class="form-control" name="warehouse_turn_volume" id="warehouse_turn_volume" value="" placeholder="转序量">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="warehouse_turn_date">转序日期</label>
                        <div class="input-group with-addon-icon-left" >
                          <input type="text" class="form-control" data-provide="datepicker" name="warehouse_turn_date" id="warehouse_turn_date" placeholder="转序日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="warehouse_turn_group">转序班组</label>
                        <input type="text" class="form-control" name="warehouse_turn_group" id="warehouse_turn_group" value="" placeholder="转序班组">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="warehouse_add0" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加库存</button>
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
