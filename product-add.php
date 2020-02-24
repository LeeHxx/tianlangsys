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
                  <form action="product-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加成品情况</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="product_id" id="product_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
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
                  <form action="product-add_check.php" class="py-4" id="product_add" method="post">


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
                        <label for="product_receive_date">接料日期</label>
                        <input type="date" class="form-control" name="product_receive_date" id="product_receive_date" placeholder="接料日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="product_receiver">接收者</label>
                        <input type="text" class="form-control" name="product_receiver" id="product_receiver" value="" placeholder="接收者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" product_pack_date ">包装日期</label>
                        <input type="date" class="form-control" name=" product_pack_date " id=" product_pack_date " value="" placeholder="包装日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="product_packer">包装者</label>
                        <input type="text" class="form-control" name="product_packer" id="product_packer" value="" placeholder="包装者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="product_pack_volume">包装数量</label>
                        <input type="number" class="form-control" name="product_pack_volume" id="product_pack_volume" value="" placeholder="包装数量">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="product_deliver">出库日期</label>
                        <input type="date" class="form-control" name="product_deliver" id="product_deliver" value="" placeholder="出库日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="product_deliver_volume">出库量</label>
                        <input type="number" class="form-control" name="product_deliver_volume" id="product_deliver_volume" value="" placeholder="出库量">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" product_shipper ">发货人</label>
                        <input type="text" class="form-control" name=" product_shipper " id=" product_shipper " value="" placeholder="发货人">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="product_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加成品情况</button>
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
