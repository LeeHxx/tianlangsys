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
    var addition_id=$("#addition_id").val();
    if(addition_id==""){
      $("#addition_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var addition_date=$("#addition_date").val();
    var addition_type=$("#addition_type").val();
    var addition_volume=$("#addition_volume").val();
    var addition_applicant=$("#addition_applicant").val();
    var addition_reason=$("#addition_reason").val();
    var addition_leader=$("#addition_leader").val();
    var addition_price=$("#addition_price").val();
    var addition_controller=$("#addition_controller").val();
    if(addition_date==""){
      $("#addition_date").focus();
      return false;
    }else if(addition_type==""){
      $("#addition_type").focus();
      return false;
    }else if(addition_volume==""){
      $("#addition_volume").focus();
      return false;
    }else if(addition_applicant==""){
      $("#addition_applicant").focus();
      return false;
    }else if(addition_reason==""){
      $("#addition_reason").focus();
      return false;
    }else if(addition_leader==""){
      $("#addition_leader").focus();
      return false;
    }else if(addition_price==""){
      $("#addition_price").focus();
      return false;
    }else if(addition_controller==""){
      $("#addition_controller").focus();
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
							<span class="text-uppercase page-subtitle">addition</span>
							<h3 class="page-title">物料补领管理</h3>
						</div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="addition-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
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

              <form action="addition-search_check.php" class="main-navbar__search w-100 " method="post">
                <div class="input-group input-group-seamless ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-search ml-2 "></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control ml-3" name="addition_id" id="addition_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>" aria-label="Search">
                </div>
              </form>


            </div>
            </div>
          </div>

          <!--<form action="addition-search_check.php" class="py-4" method="post">
            <div class="input-group mb-1">
              <input type="text" class="form-control is--valid" style="height:40px; " name="addition_id" id="addition_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
              <div class="input-group-append">
                <button id="btn1" class="btn btn-white" type="submit"><i class="addition-icons mr-2">search</i>搜索</button>
              </div>
            </div>
          </form>-->




          <div class="row">
            <div class="col-lg-12 mx-auto ">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="addition-add_check.php" class="py-4" id="addition_add" method="post">


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
                        <label for="addition_date">补领日期</label>
                        <input type="date" class="form-control" name="addition_date" id="addition_date" value="" placeholder="来料日期">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="addition_type">补领型号</label>
                        <input type="text" class="form-control" name="addition_type" id="addition_type" value="" placeholder="补领型号">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="addition_volume">补领数量</label>
                        <input type="number" class="form-control" name="addition_volume" id="addition_volume" value="" placeholder="补领数量">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="addition_applicant">申领者</label>
                        <input type="text" class="form-control" name="addition_applicant" id="addition_applicant" value="" placeholder="申领者">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="addition_reason">补领原因</label>
                        <input type="text" class="form-control" name="addition_reason" id="addition_reason" value="" placeholder="补领原因">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="addition_leader">组长确认</label>
                        <input type="text" class="form-control" name="addition_leader" id="addition_leader" value="" placeholder="组长确认">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="addition_price">物料单价</label>
                        <input type="float" class="form-control" name="addition_price" id="addition_price" value="" placeholder="物料单价">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="addition_controller">物管员确认</label>
                        <input type="text" class="form-control" name="addition_controller" id="addition_controller" value="" placeholder="物管员确认">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="addition_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加物料补领信息</button>
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
