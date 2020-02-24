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
          <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            <strong>物料补领信息</strong> 添加成功！<button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                  <form action="addition-search_check.php" class="py-4" id="addition_add" method="post">
                    <div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">添加物料补领</h5>

                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">

                      <div class="form-group col-md-12">
                        <label for="order_id">订单号</label>
                        <div class="input-group mb-3">

                        <input type="text" class="form-control is--invalid" name="addition_id" id="addition_id" value="" placeholder="输入订单号">
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




          </div>
        <!-- end Page -->
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
