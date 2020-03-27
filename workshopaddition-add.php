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
    }
  });
  $("#btn2").click(function(){
    var addition_date=$("#addition_date").val();
    var addition_type=$("#addition_type").val();
    var addition_volume=$("#addition_volume").val();
    var addition_applicant=$("#addition_applicant").val();
    var addition_reason=$("#addition_reason").val();
    var addition_leader=$("#addition_leader").val();
    var addition_price=$("#addition_price").val();
    var addition_controller=$("#addition_controller").val();
    if(addition_date==""){
      $("#addition_date").focus();
      return false;
    }else if(addition_type==""){
      $("#addition_type").focus();
      return false;
    }else if(addition_volume==""){
      $("#addition_volume").focus();
      return false;
    }else if(addition_applicant==""){
      $("#addition_applicant").focus();
      return false;
    }else if(addition_reason==""){
      $("#addition_reason").focus();
      return false;
    }else if(addition_leader==""){
      $("#addition_leader").focus();
      return false;
    }else if(addition_price==""){
      $("#addition_price").focus();
      return false;
    }else if(addition_controller==""){
      $("#addition_controller").focus();
      return false;
    }

  });

  $('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    orientation:" auto",
  });

  $('#materialtable').DataTable( {
    responsive: !0,
    searching: false,
    // ordering: false,
    // info:false,
    paging: false,
    language: {
      "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
      "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
      "sEmptyTable": "订单暂无物料补领申请单"
    }
  });
});
</script>
</head>
<body class="h-100">
  <?php
  session_start();
  require_once('conn.php');
  $id = $_SESSION['order_id'];
  $sql="select * from orders where order_id='$id' ";
  $result=mysqli_query($conn,$sql);
  $sql_arr = mysqli_fetch_assoc($result);
  ?>

  <!-- modal新增窗口 -->
  <div class="modal fade" id="modaladdnew" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-card card" data-toggle="lists" data-options='{"valueNames": ["name"]}'>
          <div class="card-header " style="display: flex;">
            <!-- Title -->

            <h5 class="modal-title col text-center" id="gridModalLabel">物料补领申请单</h5>
            <!-- Close -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- body  -->
          <div class="card-body p-0">
            <form action="workshopaddition-add_check.php" class="py-4" id="addition_add" method="post">


              <div class="form-row mx-4">
                <div class="form-group col-md-3">
                  <label for="order_id">订单号</label>
                  <input type="text" class="form-control" name="order_id" id="order_id" value="<?php echo $sql_arr['order_id'] ?>" placeholder="订单号" readonly="readonly">
                </div>
                <div class="form-group col-md-3">
                  <label for="order_name">品名</label>
                  <input type="text" class="form-control" name="order_name" id="order_name" value="<?php echo $sql_arr['order_name'] ?>" placeholder="品名" readonly="readonly">
                </div>
                <div class="form-group col-md-3">
                  <label for="order_type">规格/型号/图号</label>
                  <input type="text" class="form-control" name="order_type" id="order_type" value="<?php echo $sql_arr['order_type'] ?>" placeholder="规格/型号/图号" readonly="readonly">
                </div>
                <div class="form-group col-md-3">
                  <label for="order_volume">订单量</label>
                  <input type="number" class="form-control" name="order_volume" id="order_volume" value="<?php echo $sql_arr['order_volume'] ?>" placeholder="订单量" readonly="readonly">
                </div>
              </div>

              <hr class="mx-4">
              <div class="form-row mx-4">
                <div class="form-group col-md-3">
                  <label for="addition_date">补领日期</label>
                  <input type="date" data-provide="datepicker" class="form-control" name="addition_date" id="addition_date" value="" placeholder="补领日期">
                </div>
                <div class="form-group col-md-3">
                  <label for="addition_type">补领型号</label>
                  <input type="text" class="form-control" name="addition_type" id="addition_type" value="" placeholder="补领型号">
                </div>
                <div class="form-group col-md-3">
                  <label for="addition_volume">补领数量</label>
                  <input type="number" class="form-control" name="addition_volume" id="addition_volume" value="" placeholder="补领数量">
                </div>
                <div class="form-group col-md-3">
                  <label for="addition_applicant">申领者</label>
                  <input type="text" class="form-control" name="addition_applicant" id="addition_applicant" value="" placeholder="申领者">
                </div>
                <div class="form-group col-md-3">
                  <label for="addition_reason">补领原因</label>
                  <select class="custom-select" name="addition_reason" id="addition_reason" value="" placeholder="补领原因">
                    <option value="" selected="">请选择...</option>
                    <option value="正常抛料">1.正常抛料</option>
                    <option value="改图新增">2.改图新增</option>
                    <option value="返修">3.返修</option>
                    <option value="遗失">4.遗失</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="addition_leader">组长确认</label>
                  <input type="text" class="form-control" name="addition_leader" id="addition_leader" value="" placeholder="组长确认">
                </div>
                <div class="form-group col-md-3">
                  <label for="addition_price">物料单价</label>
                  <input type="float" class="form-control" name="addition_price" id="addition_price" value="" placeholder="物料单价">
                </div>
                <div class="form-group col-md-3">
                  <label for="addition_controller">物管员确认</label>
                  <input type="text" class="form-control" name="addition_controller" id="addition_controller" value="" placeholder="物管员确认">
                </div>
              </div>

            </form>
          </div>
          <div class="card-footer border-top ">
            <div class="col">
              <button id="btn2" form="addition_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>提交</button>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>


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
          <div class="page-header row no-gutters py-4">
						<div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
							<span class="text-uppercase page-subtitle">addition</span>
							<h3 class="page-title">物料补领申请</h3>
						</div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="workshopaddition-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>

					</div>



          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">

              <form action="workshopaddition-search_check.php" class="main-navbar__search w-100 " method="post">
                <div class="input-group input-group-seamless ">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fa fa-search ml-2 "></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control ml-3" name="addition_id" id="addition_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>" aria-label="Search">
                </div>
              </form>


            </div>
            </div>
          </div>

          <!--<form action="addition-search_check.php" class="py-4" method="post">
            <div class="input-group mb-1">
              <input type="text" class="form-control is--valid" style="height:40px; " name="addition_id" id="addition_id" placeholder="输入订单号" value="<?php echo $_SESSION['order_id'] ?>">
              <div class="input-group-append">
                <button id="btn1" class="btn btn-white" type="submit"><i class="addition-icons mr-2">search</i>搜索</button>
              </div>
            </div>
          </form>-->


          <div class="dataTables_length" id="addtable_length">
            <div class="">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="#" data-toggle="modal" data-target="#modaladdnew" class="btn btn-primary "><i class="fa fa-plus mr-1"></i> 新增物料补领申请单 </a>
              </div>
            </div>
          </div>

          <table id="materialtable">
            <thead>
			        <tr>
                <th>订单号</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>补料日期</th>
                <th>补料型号</th>
                <th>补料数量</th>
            	  <th>申请者</th>
            	  <th>补料原因</th>
            	  <th>组长确认</th>
            	  <th>物料单价</th>
                <th>物管员确认</th>
                <!-- <th>操作</th> -->
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from addition where order_id='$id'";
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
                echo "<td>{$sql_arr['order_name']}</td>";
                echo "<td>{$sql_arr['order_type']}</td>";
                echo "<td>{$sql_arr['order_volume']}</td>";
                echo "<td>{$row['addition_date']}</td>";
                echo "<td>{$row['addition_type']}</td>";
                echo "<td>{$row['addition_volume']}</td>";
        				echo "<td>{$row['addition_applicant']}</td>";
	        			echo "<td>{$row['addition_reason']}</td>";
        				echo "<td>{$row['addition_leader']}</td>";
		        		echo "<td>{$row['addition_price']}</td>";
	        			echo "<td>{$row['addition_controller']}</td>";
                //echo "<td>
                //<div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                //<button type='button' class='btn btn-white'>
                //<i class='material-icons'>&#xE254;</i>
                //</button>
                //<button type='button' class='btn btn-danger'>
                //<i class='material-icons'>&#xE872;</i>
                //</button>
                //</div>
                //</td>";
                echo "</tr>";
              }
              mysqli_free_result($result);
              mysqli_close($conn);
              ?>

            </tbody>
          </table>








          </div>
        <!-- end Page -->
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
