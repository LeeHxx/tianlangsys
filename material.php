<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
</head>
<body class="h-100">

	<div class="container-fluid">
		<div class="row">
			<!-- Main Sidebar -->
			<?php include('sidebar.php') ?>
			<!-- End Main Sidebar -->
			<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
				<div class="main-navbar sticky-top bg-white">
					<!-- Main Navbar -->
					<?php include('navbar.php') ?>
				</div> <!-- / .main-navbar -->
				<div class="main-content-container container-fluid px-4 mb-4">
					<!-- Page Header -->
					<div class="page-header row no-gutters py-4">
						<div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
							<span class="text-uppercase page-subtitle">material</span>
							<h3 class="page-title">物料列表</h3>
						</div>

					</div>
					<!-- End Page Header -->
					<!-- Transaction History Table -->
					<table class="transaction-history d-none">
						<thead>
							<tr>
								<th>订单号</th>
								<th>品名</th>
								<th>规格/型号/图号</th>
								<th>订单量</th>
								<th>来料日期</th>
								<th>数量</th>
								<th>品种</th>
								<th>合格/NG</th>
								<th>齐套状态</th>
								<th>物管员</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>



              <?php
              require_once('conn.php');
              $sql="select * from material left join orders on (material.order_id=orders.order_id)";
              $result=mysqli_query($conn,$sql);
              $loginNum=mysqli_num_rows($result);
              if(!$result){
                die('Could not connect:' .mysqli_error());
              }
              for($i=0; $i<$loginNum; $i++){
                $row = mysqli_fetch_assoc($result);
                echo "<tr>";
                echo "<td>{$row['order_id']}</td>";
                echo "<td>{$row['order_name']}</td>";
                echo "<td>{$row['order_type']}</td>";
                echo "<td>{$row['order_volume']}</td>";
                echo "<td>{$row['material_come']}</td>";
                echo "<td>{$row['material_volume']}</td>";
                echo "<td>{$row['material_type']}</td>";
                echo "<td>{$row['material_okng']}</td>";
                echo "<td>{$row['material_kitting']}</td>";
                echo "<td>{$row['material_admin']}</td>";
                echo "<td>
                <div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                  <button type='button' class='btn btn-white'>
                    <i class='material-icons'>&#xE254;</i>
                  </button>
                  <button type='button' class='btn btn-danger'>
                    <i class='material-icons'>&#xE872;</i>
                  </button>
                </div>
                </td>";
                echo "</tr>";
              }
              mysqli_free_result($result);
              mysqli_close($conn);
              ?>






						</tbody>
					</table>
					<!-- End Transaction History Table -->
				</div>
			</main>
		</div>
	</div>
	<script src="scripts/jquery-3.3.1.min.js"></script>
	<script src="scripts/popper.min.js"></script>
	<script src="scripts/bootstrap.js"></script>
	<script src="scripts/Chart.min.js"></script>
	<script src="scripts/shards.min.js"></script>
	<script src="scripts/jquery.sharrre.min.js"></script>
	<script src="scripts/extras.1.3.1.min.js"></script>
	<script src="scripts/shards-dashboards.1.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
	<script src="scripts/app/app-transaction-history.1.3.1.min.js"></script>
</body>
</html>
