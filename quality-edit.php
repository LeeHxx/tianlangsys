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
    var  quality_inspection_date =$("# quality_inspection_date ").val();
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
            <span class="text-uppercase page-subtitle">quality</span>
              <h3 class="page-title">质量管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="quality-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>

          </div>

          <?php
          session_start();
          require_once('conn.php');
          $id = $_SESSION['order_id'];
          $sql="select * from orders where order_id='$id' ";
          $sql0="select * from quality where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          $result0=mysqli_query($conn,$sql0);
          $sql_arr0 = mysqli_fetch_assoc($result0);
          ?>



          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="quality-search_check.php" class="main-navbar__search w-100 " id="quality_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="quality_id" id="quality_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>（已编辑）" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-12 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="quality-edit_check.php" class="py-4" id="quality_add0" method="post">


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
                        <label for="quality_first_date">首件送检日期</label>
                        <input type="date" data-provide="datepicker" class="form-control" name="quality_first_date" id="quality_first_date" value="<?php echo $sql_arr0['quality_first_date'] ?>" placeholder="首件送检日期">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="quality_first_inspection">首件送检者</label>
                        <input type="text" class="form-control" name="quality_first_inspection" id="quality_first_inspection" value="<?php echo $sql_arr0['quality_first_inspection'] ?>" placeholder="首件送检者">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="quality_first_confirm">首件确认</label>
                        <select class="custom-select" name="quality_first_confirm" id="quality_first_confirm" value="<?php echo $sql_arr0['quality_first_confirm'] ?>" placeholder="首件确认">
                          <option value="" selected="">请选择...</option>
                          <option value="已确认" <?php  if($sql_arr0['quality_first_confirm']=='已确认'){?>selected <?php }?>>已确认</option>
                          <option value="未确认" <?php  if($sql_arr0['quality_first_confirm']=='未确认'){?>selected <?php }?>>未确认</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="quality_batch_inspect">批次送检日期</label>
                        <input type="date" data-provide="datepicker" class="form-control" name="quality_batch_inspect" id="quality_batch_inspect" value="<?php echo $sql_arr0['quality_batch_inspect'] ?>" placeholder="批次送检日期">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="quality_inspection">送检者</label>
                        <input type="text" class="form-control" name="quality_inspection" id="quality_inspection" value="<?php echo $sql_arr0['quality_inspection'] ?>" placeholder="送检者">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="quality_OK_volume">合格数</label>
                        <input type="number" class="form-control" name="quality_OK_volume" id="quality_OK_volume" value="<?php echo $sql_arr0['quality_OK_volume'] ?>" placeholder="合格数">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="quality_NG_volume">NG数</label>
                        <input type="number" class="form-control" name="quality_NG_volume" id="quality_NG_volume" value="<?php echo $sql_arr0['quality_NG_volume'] ?>" placeholder="NG数">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="quality_inspection_confirm">检验确认</label>
                        <input type="text" class="form-control" name="quality_inspection_confirm" id="quality_inspection_confirm" value="<?php echo $sql_arr0['quality_inspection_confirm'] ?>" placeholder="检验确认">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="quality_inspection_date">检验确认日期</label>
                        <input type="date" data-provide="datepicker" class="form-control" name="quality_inspection_date" id="quality_inspection_date" value="<?php echo $sql_arr0['quality_inspection_date'] ?>" placeholder="检验确认日期">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="quality_add0" class="btn  btn-info mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>保存修改</button>
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
