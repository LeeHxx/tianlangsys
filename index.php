<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
  <link rel="stylesheet" href="styles/animate.css">
</head>
<body class="h-100">
  <div class="container-fluid h-100">
    <div class="row h-100">

      <main class="main-content col">

        <div class="main-content-container container-fluid px-4 mb-4 my-auto h-100">
          <div class="row  h-100 mt-4">
            <div class="col-lg-9 col-sm-9 mx-auto my-auto">
              <div class="row h-100 mt-3">

                <!-- Landing Page -->
                <div class="col-md-5 mb-5 ml-auto " >
                  <div class="card animate-box" data-animate-effect="fadeInUp">
                    <img class="card-img-top" src="images/index1.png" alt="生产管理系统" style="height:130px;">
                    <div class="card-body py-3">
                      <h6 class="text-center text-muted m-0">生产制造管理系统</h6>
                    </div>
                  </div>
                  <a class="d-table ml-auto mr-auto mt-4" href="welcome.php">
                    <button class="btn btn-outline-primary btn-pill">点击进入</button>
                  </a>
                </div>

                <div class="col-md-2 mb-2 mr-auto">
                </div>

                <div class="col-md-5 mb-5 mr-auto">
                  <div class="card">
                    <img class="card-img-top" src="images/index2.png" alt="物料管理系统" style="height:130px;">
                    <div class="card-body py-3">
                      <h6 class="text-center text-muted m-0">行政人事管理系统</h6>
                    </div>
                  </div>
                  <a class="d-table ml-auto mr-auto mt-4" href="#">
                    <button class="btn btn-outline-primary btn-pill">点击进入</button>
                  </a>
                </div>



                <div class="col-md-5 mb-5 mr-auto">
                  <div class="card">
                    <img class="card-img-top" src="images/index1.png" alt="财务管理系统" style="height:130px;">
                    <div class="card-body py-3">
                      <h6 class="text-center text-muted m-0">物资采购管理系统</h6>
                    </div>
                  </div>
                  <a class="d-table ml-auto mr-auto mt-4" href="#">
                    <button class="btn btn-outline-primary btn-pill">点击进入</button>
                  </a>
                </div>
                <div class="col-md-2 mb-2 mr-auto">
                </div>
                <div class="col-md-5 mb-5 mr-auto">
                  <div class="card">
                    <img class="card-img-top" src="images/index1.png" alt="财务管理系统" style="height:130px;">
                    <div class="card-body py-3">
                      <h6 class="text-center text-muted m-0">工艺技术管理系统</h6>
                    </div>
                  </div>
                  <a class="d-table ml-auto mr-auto mt-4" href="#">
                    <button class="btn btn-outline-primary btn-pill">点击进入</button>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
