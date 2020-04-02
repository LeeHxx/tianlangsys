<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
</head>
<body class="h-100">
  <div class="container-fluid ">
    <div class="row">
      <?php include('sidebar.php') ?>
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <?php include('navbar.php') ?>
        </div>
        <div class="main-content-container container-fluid px-4 mb-4">
          <div class="row mt-4">
            <div class="col-lg-9  mb-4 ">
              <div class="card card-small mb-4">
                <div class="jumbotron" style="background:#fff;">
                  <h1 class="display-4" style="font-weight: 400;">欢迎使用!</h1>
                  <p class="lead">欢迎使用南京天朗电子装备有限公司生产管理系统.</p>
                  <hr class="my-4">
                  <p>查看订单信息或者添加新的订单?</p>
                  <a class="btn btn-primary btn-pill  btn-lg" href="order.php" role="button"><i class="material-icons mr-2">insert_drive_file</i>添加订单</a>
                  <hr class="my-4">
                  <p>物料入库或者修改物料详细信息？</p>
                  <a class="btn btn-primary btn-pill btn-lg" href="material-search.php" role="button"><i class="material-icons mr-2">assignment_returned</i>物料管理</a>
                  <hr class="my-4">
                  <p>填写问题反馈记录单？</p>
                  <a class="btn btn-primary btn-pill btn-lg" href="workshopproblem-search.php" role="button"><i class="material-icons mr-2">report</i>问题反馈</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
              <div class="card card-small">
                <div class="card-header border-bottom">
                  <h6 class="m-0">订单交货提醒</h6>
                </div>
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">订单号TL0001</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                            <span class="progress-value">剩余3天</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">订单号TL0002</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 64%;">
                            <span class="progress-value">剩余2天</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">订单号TL0003</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 23%;">
                            <span class="progress-value">剩余1天</span>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer border-top">
                  <div class="row">

                    <div class="col text-right view-report">
                      <a href="#">详细信息 →</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 mb-4">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <h6 class="m-0">订单交货日期提醒</h6>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item px-3">
                    <div class="mb-2">
                      <strong class="text-muted d-block mb-3">订单TL0001</strong>
                      <div id="slider-example-1" class="slider-danger  noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;">
                        <div class="noUi-base">
                          <div class="noUi-connects">
                            <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.25, 1);">
                            </div>
                          </div>
                          <div class="noUi-origin" style="transform: translate(-75%, 0px); z-index: 4;">
                            <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="25.00" aria-valuetext="25.00">
                              <div class="noUi-tooltip">剩余1天</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <hr class="my-4">
                      <strong class="text-muted d-block mb-3">订单TL0002</strong>
                      <div id="slider-example-1" class="slider-warning noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;">
                        <div class="noUi-base">
                          <div class="noUi-connects">
                            <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.40, 1);">
                            </div>
                          </div>
                          <div class="noUi-origin" style="transform: translate(-60%, 0px); z-index: 4;">
                            <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="25.00" aria-valuetext="25.00">
                              <div class="noUi-tooltip">剩余2天</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4">
                      <strong class="text-muted d-block mb-3">订单TL0003</strong>
                      <div id="slider-example-1" class="slider-info noUi-target noUi-ltr noUi-horizontal" style="margin-bottom: 10px;">
                        <div class="noUi-base">
                          <div class="noUi-connects">
                            <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.60, 1);">
                            </div>
                          </div>
                          <div class="noUi-origin" style="transform: translate(-40%, 0px); z-index: 4;">
                            <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="25.00" aria-valuetext="25.00">
                              <div class="noUi-tooltip">剩余3天</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4">
                      <strong class="text-muted d-block mb-3">订单TL0004</strong>


                      <div id="slider-example-3" class="slider-success noUi-target noUi-ltr noUi-horizontal">
                        <div class="noUi-base">
                          <div class="noUi-connects">
                            <div class="noUi-connect" style="transform: translate(0%, 0px) scale(0.85, 1);">
                            </div>
                          </div>
                          <div class="noUi-origin" style="transform: translate(-15%, 0px); z-index: 4;">
                            <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="85.0" aria-valuetext="85.00">
                              <div class="noUi-tooltip">剩余4天
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="noUi-pips noUi-pips-horizontal">
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 0%;"></div>
                          <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="0" style="left: 0%;">0天</div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 5%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 10%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 15%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 20%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 25%;"></div>
                          <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="25" style="left: 25%;">1天</div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 30%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 35%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 40%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 45%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 50%;"></div>
                          <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="50" style="left: 50%;">2天
                          </div><div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 55%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 60%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 65%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 70%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 75%;"></div>
                          <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="75" style="left: 75%;">3天</div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 80%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 85%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 90%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-normal" style="left: 95%;"></div>
                          <div class="noUi-marker noUi-marker-horizontal noUi-marker-large" style="left: 100%;"></div>
                          <div class="noUi-value noUi-value-horizontal noUi-value-large" data-value="100" style="left: 100%;">4天</div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
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
