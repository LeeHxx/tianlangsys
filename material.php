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
								<th><strong>订单号</strong></th>
								<th><strong>品名</strong></th>
								<th><strong>规格/型号/图号</strong></th>
								<th><strong>订单量</strong></th>
								<th>来料日期</th>
								<th>数量</th>
								<th>品种</th>
								<th>合格/NG</th>
								<th>齐套状态</th>
								<th>物管员</th>
								<!-- <th>操作</th> -->
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
                echo "<td><strong>{$row['order_id']}</strong></td>";
                echo "<td><strong>{$row['order_name']}</strong></td>";
                echo "<td><strong>{$row['order_type']}</strong></td>";
                echo "<td><strong>{$row['order_volume']}</strong></td>";
                echo "<td>{$row['material_come']}</td>";
                echo "<td>{$row['material_volume']}</td>";
                echo "<td>{$row['material_type']}</td>";
                if ($row['material_okng']=='合格') {
                echo "<td><span class='badge badge-pill badge-success'>{$row['material_okng']}</span></td>";
              }else {
                echo "<td><span class='badge badge-pill badge-danger'>{$row['material_okng']}</span></td>";
              }
                echo "<td>{$row['material_kitting']}</td>";
                echo "<td>{$row['material_admin']}</td>";
                // echo "<td>
                // <div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                //   <button type='button' class='btn btn-white'>
                //     <i class='material-icons'>&#xE254;</i>
                //   </button>
                //   <button type='button' class='btn btn-danger'>
                //     <i class='material-icons'>&#xE872;</i>
                //   </button>
                // </div>
                // </td>";
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
	<?php include('script.php') ?>
</body>
</html>
