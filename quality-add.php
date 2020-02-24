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
    var quality_id=$("#quality_id").val();
    if(quality_id==""){
      $("#quality_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var quality_first_date=$("#quality_first_date").val();
    var quality_first_inspection=$("#quality_first_inspection").val();
    var quality_first_confirm=$("#quality_first_confirm").val();
    var quality_batch_inspect=$("#quality_batch_inspect").val();   
    var quality_inspection=$("#quality_inspection").val();
    var quality_OK_volume=$("#quality_OK_volume").val();
    var quality_NG_volume=$("#quality_NG_volume").val();
    var quality_inspection_confirm=$("#quality_inspection_confirm").val();
    var quality_inspection_date=$("#quality_inspection_date").val();
    if(quality_first_date==""){
      $("#quality_first_date").focus();
      return false;
    }else if(quality_first_inspection==""){
      $("#quality_first_inspection").focus();
      return false;
    }else if(quality_first_confirm==""){
      $("#quality_first_confirm").focus();
      return false;
    }else if(quality_batch_inspect==""){
      $("#quality_batch_inspect").focus();
      return false;
    }else if(quality_inspection==""){
      $("#quality_inspection").focus();
      return false;
    }else if(quality_OK_volume==""){
      $("#quality_OK_volume").focus();
      return false;
    }else if(quality_NG_volume==""){
      $("#quality_NG_volume").focus();
      return false;
    }else if(quality_inspection_confirm==""){
      $("#quality_inspection_confirm").focus();
      return false;
    }else if(quality_inspection_date==""){
      $("#quality_inspection_date").focus();
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
                  <form action="quality-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加质量情况</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="quality_id" id="quality_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
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
                  <form action="quality-add_check.php" class="py-4" id="quality_add" method="post">


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
                        <label for="quality_first_date">首件送检日期</label>
                        <input type="date" class="form-control" name="quality_first_date" id="quality_first_date" placeholder="首件送检日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="quality_first_inspection">首件送检者</label>
                        <input type="text" class="form-control" name="quality_first_inspection" id="quality_first_inspection" value="" placeholder="首件送检者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" quality_first_confirm ">首件确认</label>
                        <input type="text" class="form-control" name=" quality_first_confirm " id=" quality_first_confirm " value="" placeholder="首件确认">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="quality_batch_inspect">批次送检日期</label>
                        <input type="date" class="form-control" name="quality_batch_inspect" id="quality_batch_inspect" value="" placeholder="批次送检日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="quality_inspection">送检者</label>
                        <input type="text" class="form-control" name="quality_inspection" id="quality_inspection" value="" placeholder="送检者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="quality_OK_volume">合格数</label>
                        <input type="number" class="form-control" name="quality_OK_volume" id="quality_OK_volume" value="" placeholder="合格数">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="quality_NG_volume">不合格数</label>
                        <input type="number" class="form-control" name="quality_NG_volume" id="quality_NG_volume" value="" placeholder="不合格数">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" quality_inspection_confirm ">送检确认</label>
                        <input type="text" class="form-control" name=" quality_inspection_confirm " id=" quality_inspection_confirm " value="" placeholder="送检确认">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="quality_inspection_date">送检确认日期</label>
                        <input type="date" class="form-control" name="quality_inspection_date" id="quality_inspection_date" value="" placeholder="送检确认日期">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="quality_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加质量情况</button>
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
