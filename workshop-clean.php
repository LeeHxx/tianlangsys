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
              <span class="text-uppercase page-subtitle">清洗</span>
              <h3 class="page-title">清洗列表</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="workshop-clean-search.php" class="btn btn-primary"><i class="fa fa-plus mr-1"></i> 清洗管理 </a>
              </div>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Order Table -->
          
            <table class="transaction-history d-none">
              <thead>
		        	  <tr>
                  <th>订单号</th>
                  <th>品名</th>
                  <th>规格/型号/图号</th>
                  <th>订单量</th>
                  <th>领料日期</th>
                  <th>准备时间</th>
                  <th>操作者</th>
                  <th>批次完成量</th>
                  <th>批次完成时间</th>
                  <th>转序日期</th>
                  <th>转序量</th>
                <!-- <th>操作</th> -->
                </tr>
              </thead>
              <tbody>

                <?php
                require_once('conn.php');
                $sql="select * from cleaning,orders where orders.order_id=cleaning.order_id";
                $result=mysqli_query($conn,$sql);
                $loginNum=mysqli_num_rows($result);
                if(!$result)
                {
                  die('Could not connect:' .mysqli_error());
                }
                for($i=0; $i<$loginNum; $i++){
                  $row = mysqli_fetch_assoc($result);
                  $ii=$i+1;
                  echo "<tr>";
                  echo "<td>{$row['order_id']}</td>";
                  echo "<td>{$row['order_name']}</td>";
                  echo "<td>{$row['order_type']}</td>";
                  echo "<td>{$row['order_volume']}</td>";
                  echo "<td>{$row['cleaning_get']}</td>";
                  echo "<td>{$row['cleaning_readiness']}</td>";
		  		        echo "<td>{$row['cleaning_opertor']}</td>";
                  echo "<td>{$row['cleaning_completion']}</td>";
                  echo "<td>{$row['cleaning_end']}</td>";
                  echo "<td>{$row['cleaning_turn_date']}</td>";
                  echo "<td>{$row['cleaning_turn_volume']}</td>";
                  // echo "<td>
                // <div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                // <button type='button' class='btn btn-white'>
                // <i class='material-icons'>&#xE254;</i>
                // </button>
                // <button type='button' class='btn btn-danger'>
                // <i class='material-icons'>&#xE872;</i>
                // </button>
                // </div>
                // </td>";
                  echo "</tr>";
                }
                mysqli_free_result($result);
                mysqli_close($conn);
                ?>

              </tbody>
            </table>
          
          <!-- End Order Table -->
        </div>
        <!-- end Page -->
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
