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
    var smt_id=$("#smt_id").val();
    if(smt_id==""){
      $("#smt_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var smt_get=$("#smt_get").val();
    var smt_readiness=$("#smt_readiness").val();
    var smt_line=$("#smt_line").val();
    var smt_classes=$("#smt_classes").val();
    var smt_first_start=$("#smt_first_start").val();
    var smt_first_end=$("#smt_first_end").val();
    var smt_first_opertor=$("#smt_first_opertor").val();
    var smt_batch_completion=$("#smt_batch_completion").val();
    var smt_batch_end=$("#smt_batch_end").val();
    var smt_opertor=$("#smt_opertor").val();
    var smt_turn_department=$("#smt_turn_department").val();
    var smt_turn_volume=$("#smt_turn_volume").val();
    if(smt_get==""){
      $("#smt_get").focus();
      return false;
    }else if(smt_readiness==""){
      $("#smt_readiness").focus();
      return false;
    }else if(smt_line==""){
      $("#smt_line").focus();
      return false;
    }else if(smt_classes==""){
      $("#smt_classes").focus();
      return false;
    }else if(smt_first_start==""){
      $("#smt_first_start").focus();
      return false;
    }else if(smt_first_end==""){
      $("#smt_first_end").focus();
      return false;
    }else if(smt_first_opertor==""){
      $("#smt_first_opertor").focus();
      return false;
    }else if(smt_batch_completion==""){
      $("#smt_batch_completion").focus();
      return false;
    }
    else if(smt_batch_end==""){
      $("#smt_batch_end").focus();
      return false;
    }
    else if(smt_opertor==""){
      $("#smt_opertor").focus();
      return false;
    }
    else if(smt_turn_department==""){
      $("#smt_turn_department").focus();
      return false;
    }
    else if(smt_turn_volume==""){
      $("#smt_turn_volume").focus();
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
                  <form action="workshop-smt-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加smt</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="smt_id" id="smt_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
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
                  <form action="workshop-smt-add_check.php" class="py-4" id="workshop-smt_add" method="post">


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
                        <label for="smt_get">领料日期</label>
                        <input type="date" class="form-control" name="smt_get" id="smt_get" value="" placeholder="领料日期">
                      </div>
                      <div class="form-group col-md-6">                      
                        <label for="smt_readiness">准备时间</label>
                        <input type="text" class="form-control" name="smt_readiness" id="smt_readiness" value="" placeholder="准备时间">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" smt_line ">产线号</label>
                        <input type="text" class="form-control" name=" smt_line " id=" smt_line " value="" placeholder="产线号">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="smt_classes">班次</label>
                        <input type="text" class="form-control" name="smt_classes" id="smt_classes" value="" placeholder="班次">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="smt_first_start">首件生产日期</label>
                        <input type="date" class="form-control" name="smt_first_start" id="smt_first_start" value="" placeholder="首件生产日期">
                      </div>
                      <div class="form-group col-md-6">                      
                        <label for="smt_first_finish">首件完成日期</label>
                        <input type="date" class="form-control" name="smt_first_end" id="smt_first_end" value="" placeholder="首件完成日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="smt_first_opertor">首件操作者</label>
                        <input type="text" class="form-control" name="smt_first_opertor" id="smt_first_opertor" value="" placeholder="首件操作者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="smt_batch_completion">批次完成量</label>
                        <input type="number" class="form-control" name="smt_batch_completion" id="smt_batch_completion" value="" placeholder="批次完成量">
                      </div>
                      <div class="form-group col-md-6">
                        <label for=" smt_batch_end ">批次完成日期</label>
                        <input type="date" class="form-control" name="smt_batch_end" id="smt_batch_end" value="" placeholder="批次完成日期">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="smt_opertor">操作者</label>
                        <input type="text" class="form-control" name="smt_opertor" id="smt_opertor" value="" placeholder="操作者">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="smt_turn_department">转序部门</label>
                        <input type="text" class="form-control" name="smt_turn_department" id="smt_turn_department" value="" placeholder="转序部门">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="smt_turn_volume">转序量</label>
                        <input type="number" class="form-control" name="smt_turn_volume" id="smt_turn_volume" value="" placeholder="转序量">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="workshop-smt_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加smt</button>
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
