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
    var product_id=$("#product_id").val();
    if(product_id==""){
      $("#product_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var product_receive_date=$("#product_receive_date").val();
    var product_receiver=$("#product_receiver").val();
    var product_pack_date=$("#product_pack_date").val();
    var product_packer=$("#product_packer").val();
    var product_pack_volume=$("#product_pack_volume").val();
    var product_deliver=$("#product_deliver").val();
    var product_deliver_volume=$("#product_deliver_volume").val();
    var product_shipper=$("#product_shipper").val();
    if(product_receive_date==""){
      $("#product_receive_date").focus();
      return false;
    }else if(product_receiver==""){
      $("#product_receiver").focus();
      return false;
    }else if(product_pack_date==""){
      $("#product_pack_date").focus();
      return false;
    }else if(product_packer==""){
      $("#product_packer").focus();
      return false;
    }else if(product_pack_volume==""){
      $("#product_pack_volume").focus();
      return false;
    }else if(product_deliver==""){
      $("#product_deliver").focus();
      return false;
    }else if(product_deliver_volume==""){
      $("#product_deliver_volume").focus();
      return false;
    }else if(product_shipper==""){
      $("#product_shipper").focus();
      return false;
    }

  });
});
$('.datepicker').datepicker({
  format: "yyyy-mm-dd",
  orientation:" auto",
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
            <span class="text-uppercase page-subtitle">product</span>
              <h3 class="page-title">成品管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="product-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>

          </div>

          <?php
          session_start();
          require_once('conn.php');
          $id = $_SESSION['order_id'];
          $sql="select * from orders where order_id='$id' ";
          $sql0="select * from product where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          $result0=mysqli_query($conn,$sql0);
          $sql_arr0 = mysqli_fetch_assoc($result0);
          ?>



          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="product-search_check.php" class="main-navbar__search w-100 " id="product_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="product_id" id="product_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>（已编辑）" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="product-edit_check.php" class="py-4" id="product_add0" method="post">


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
                        <label for="product_receive_date">接料日期</label>
                        <input type="date" data-provide="datepicker" class="form-control" name="product_receive_date" id="product_receive_date" value="<?php echo $sql_arr0['product_receive_date'] ?>" placeholder="接料日期">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="product_receiver">接收者</label>
                        <input type="text" class="form-control" name="product_receiver" id="product_receiver" value="<?php echo $sql_arr0['product_receiver'] ?>" placeholder="接收者">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="product_pack_date">包装日期</label>
                        <input type="date" data-provide="datepicker" class="form-control" name="product_pack_date" id="product_pack_date" value="<?php echo $sql_arr0['product_pack_date'] ?>" placeholder="包装日期">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="product_packer">包装者</label>
                        <input type="text" class="form-control" name="product_packer" id="product_packer" value="<?php echo $sql_arr0['product_packer'] ?>" placeholder="包装者">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="product_pack_volume">包装数量</label>
                        <input type="number" class="form-control" name="product_pack_volume" id="product_pack_volume" value="<?php echo $sql_arr0['product_pack_volume'] ?>" placeholder="包装数量">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="product_deliver">出库日期</label>
                        <input type="date" data-provide="datepicker" class="form-control" name="product_deliver" id="product_deliver" value="<?php echo $sql_arr0['product_deliver'] ?>" placeholder="出库日期">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="product_deliver_volume">出库数量</label>
                        <input type="number" class="form-control" name="product_deliver_volume" id="product_deliver_volume" value="<?php echo $sql_arr0['product_deliver_volume'] ?>" placeholder="出库数量">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="product_shipper">发货人</label>
                        <input type="text" class="form-control" name="product_shipper" id="product_shipper" value="<?php echo $sql_arr0['product_shipper'] ?>" placeholder="发货人">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="product_add0" class="btn  btn-info mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>保存</button>
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
