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
            <strong>质量信息</strong> 添加成功！<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="main-content-container container-fluid px-4 mb-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">quality</span>
              <h3 class="page-title">质量管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="quality.php" class="btn btn-primary"><i class="fa fa-list mr-1"></i> 质量列表 </a>
              </div>
            </div>

          </div>




          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">

                <form action="quality-search_check.php" class="main-navbar__search w-100 " method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="quality_id" id="quality_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." aria-label="Search">
                  </div>
                </form>


              </div>
            </div>
          </div>

          <p style="text-align: center; color:#C0C0C0" class="mt-3">请输入要添加或修改物料的订单号<br>按下回车键进行搜索</p>


        </div>
        <!-- end Page -->
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
