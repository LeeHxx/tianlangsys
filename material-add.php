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
    var m_id=$("#m_id").val();
    if(m_id==""){
      $("#m_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var material_come=$("#transaction-history-date-range").val();
    var material_volume=$("#material_volume").val();
    var material_type=$("#material_type").val();
    var material_okng=$("#material_okng").val();
    var material_kitting=$("#material_kitting").val();
    var material_admin=$("#material_admin").val();
    if(material_come==""){
      $("#transaction-history-date-range").focus();
      return false;
    }else if(material_volume==""){
      $("#material_volume").focus();
      return false;
    }else if(material_type==""){
      $("#material_type").focus();
      return false;
    }else if(material_okng==""){
      $("#material_okng").focus();
      return false;
    }else if(material_kitting==""){
      $("#material_kitting").focus();
      return false;
    }else if(material_admin==""){
      $("#material_admin").focus();
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
                  <form action="material-search_check.php" class="py-4" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加物料</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-1">

                          <input type="text" class="form-control is--valid" name="m_id" id="m_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
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
                  <form action="material-add_check.php" class="py-4" id="material_add" method="post">


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
                        <label for="order_client">来料日期</label>
                        <div class="input-group with-addon-icon-left" >
                          <input type="text" class="form-control" name="material_come" id="transaction-history-date-range" placeholder="来料日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="material_volume">数量</label>
                        <input type="number" class="form-control" name="material_volume" id="material_volume" value="" placeholder="数量">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="material_type">品种</label>
                        <input type="text" class="form-control" name="material_type" id="material_type" value="" placeholder="品种">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="material_okng">合格/NG</label>
                        <input type="text" class="form-control" name="material_okng" id="material_okng" value="" placeholder="合格/NG">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="material_kitting">齐套状态</label>
                        <input type="text" class="form-control" name="material_kitting" id="material_kitting" value="" placeholder="齐套状态">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="material_admin">物管员</label>
                        <input type="text" class="form-control" name="material_admin" id="material_admin" value="" placeholder="物管员">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top ">
                  <div class="col">
                    <button id="btn2" form="material_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>添加物料</button>
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
