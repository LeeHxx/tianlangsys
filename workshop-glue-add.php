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
    var glue_id=$("#glue_id").val();
    if(glue_id==""){
      $("#glue_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var glue_get=$("#glue_get").val();
    var glue_readiness=$("#glue_readiness").val();
    var glue_opertor=$("#glue_opertor").val();
    var glue_completion=$("#glue_completion").val();
    var glue_end=$("#glue_end").val();
    var glue_turn_date=$("#glue_turn_date").val();
    var glue_turn_volume=$("#glue_turn_volume").val();
    if(glue_get==""){
      $("#glue_get").focus();
      return false;
    }else if(glue_readiness==""){
      $("#glue_readiness").focus();
      return false;
    }else if(glue_opertor==""){
      $("#glue_opertor").focus();
      return false;
    }else if(glue_completion==""){
      $("#glue_completion").focus();
      return false;
    }else if(glue_end==""){
      $("#glue_end").focus();
      return false;
    }else if(glue_turn_date==""){
      $("#glue_turn_date").focus();
      return false;
    }else if(glue_turn_volume==""){
      $("#glue_turn_volume").focus();
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
              <span class="text-uppercase page-subtitle">打胶</span>
              <h3 class="page-title">打胶管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="workshop-glue.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
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
                <form action="workshop-glue-search_check.php" class="main-navbar__search w-100 " id="workshop-glue_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="glue_id" id="glue_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="workshop-glue-add_check.php" class="py-4" id="workshop-glue_add0" method="post">


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
                        <label for="glue_get">领料日期</label>
                        <input type="date" class="form-control" name="glue_get" id="glue_get" value="" placeholder="领料日期">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="glue_readiness">准备时间</label>
                        <input type="text" class="form-control" name="glue_readiness" id="glue_readiness" value="" placeholder="准备时间">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="glue_opertor">操作者</label>
                        <input type="text" class="form-control" name="glue_opertor" id="glue_opertor" value="" placeholder="操作者">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="glue_completion">批次完成量</label>
                        <input type="number" class="form-control" name="glue_completion" id="glue_completion" value="" placeholder="批次完成量">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="glue_end">批次完成日期</label>
                        <input type="date" class="form-control" name="glue_end" id="glue_end" value="" placeholder="批次完成日期">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="glue_turn_date">转序日期</label>
                        <input type="date" class="form-control" name="glue_turn_date" id="glue_turn_date" value="" placeholder="转序日期">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="glue_turn_volume">转序量</label>
                        <input type="number" class="form-control" name="glue_turn_volume" id="glue_turn_volume" value="" placeholder="转序量">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="workshop-glue_add0" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加glue</button>
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
