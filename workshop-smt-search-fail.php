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
        <div class="container-fluid px-0">
          <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
            <strong>未找到此订单！</strong> 请检查订单号后重试！<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="main-content-container container-fluid px-4 mb-4">
          <!-- Page Header -->




          <div class="row">
            <div class="col-lg-8 mx-auto mt-4">
              <div class="card card-small mb-4">
                <div class="card-body p-0">
                  <form action="workshop-smt-search_check.php" class="py-4" id="workshop-smt_add" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加smt</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-3">

                        <input type="text" class="form-control is-invalid" name="smt_id" id="smt_id" value="" placeholder="输入订单号">
                        <div class="input-group-append">
                          <button id="btn1" class="btn btn-outline-danger" type="submit"><i class="material-icons mr-2">search</i>查找订单号</button>
                        </div>
                      </div>
                      </div>

                    </div>







                  </form>
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
