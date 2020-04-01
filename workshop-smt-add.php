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
  // $("#btn2").click(function(){
  //   var smt_get=$("#smt_get").val();
  //   var smt_readiness=$("#smt_readiness").val();
  //   var smt_line=$("#smt_line").val();
  //   var smt_classes=$("#smt_classes").val();
  //   var smt_first_start=$("#smt_first_start").val();
  //   var smt_first_end=$("#smt_first_end").val();
  //   var smt_first_opertor=$("#smt_first_opertor").val();
  //   var smt_batch_completion=$("#smt_batch_completion").val();
  //   var smt_batch_end=$("#smt_batch_end").val();
  //   var smt_opertor=$("#smt_opertor").val();
  //   var smt_turn_department=$("#smt_turn_department").val();
  //   var smt_turn_volume=$("#smt_turn_volume").val();
  //   if(smt_get==""){
  //     $("#smt_get").focus();
  //     return false;
  //   }else if(smt_readiness==""){
  //     $("#smt_readiness").focus();
  //     return false;
  //   }else if(smt_line==""){
  //     $("#smt_line").focus();
  //     return false;
  //   }else if(smt_classes==""){
  //     $("#smt_classes").focus();
  //     return false;
  //   }else if(smt_first_start==""){
  //     $("#smt_first_start").focus();
  //     return false;
  //   }else if(smt_first_end==""){
  //     $("#smt_first_end").focus();
  //     return false;
  //   }else if(smt_first_opertor==""){
  //     $("#smt_first_opertor").focus();
  //     return false;
  //   }else if(smt_batch_completion==""){
  //     $("#smt_batch_completion").focus();
  //     return false;
  //   }
  //   else if(smt_batch_end==""){
  //     $("#smt_batch_end").focus();
  //     return false;
  //   }
  //   else if(smt_opertor==""){
  //     $("#smt_opertor").focus();
  //     return false;
  //   }
  //   else if(smt_turn_department==""){
  //     $("#smt_turn_department").focus();
  //     return false;
  //   }
  //   else if(smt_turn_volume==""){
  //     $("#smt_turn_volume").focus();
  //     return false;
  //   }
  //
  // });

  $('#smttable').DataTable( {
    responsive: !0,
    searching: false,
    // ordering: false,
    // info:false,
    paging: false,
    language: {
      "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
      "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
      "sEmptyTable": "订单暂无SMT生产信息"
    }
  });
  $('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    orientation:" auto",
    });

});
function dele(id) {
  if(confirm("确认删除吗？")){
  $.post("workshop-smt-del_check.php?id="+id,function(data){
    if($.trim(data)=='yes'){
      alert("删除成功！")
      window.location.href='workshop-smt-add.php';
      return true;
    }else{
      alert("该条记录无法删除 ！")
      window.location.href='workshop-smt-add.php';
      return false;
    }
  },"text");
  }
}
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
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">smt</span>
              <h3 class="page-title">SMT管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="workshop-smt-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>
          </div>

          <?php
          session_start();
          require_once('conn.php');
          $id = $_SESSION['order_id'];
          $sql="select * from orders where order_id='$id' ";
          $result=mysqli_query($conn,$sql);
          $sql_arr = mysqli_fetch_assoc($result);
          ?>

          <div class="modal fade" id="modaladdnew" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-card card" data-toggle="lists" data-options='{"valueNames": ["name"]}'>
                  <div class="card-header " style="display: flex;">
                    <!-- Title -->

                    <h5 class="modal-title col text-center" id="gridModalLabel">新增SMT</h5>
                    <!-- Close -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- body  -->
                  <div class="card-body p-0">
                    <form action="workshop-smt-add_check.php" class="py-4" id="workshop-smt_add" method="post">

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
                          <label for="smt_get">领料日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" type="text" required class="form-control" name="smt_get" id="smt_get" value="" placeholder="领料日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_readiness">准备时间</label>
                          <input type="text" required class="form-control" name="smt_readiness" id="smt_readiness" value="" placeholder="准备时间">
                        </div>
                        <div class="form-group col-md-3">
                          <label for=" smt_line ">产线号</label>
                          <input type="text" class="form-control" required name="smt_line" id="smt_line" value="" placeholder="产线号">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_classes">班次</label>
                          <input type="text" class="form-control" required name="smt_classes" id="smt_classes" value="" placeholder="班次">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_first_start">首件生产日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" class="form-control" required name="smt_first_start" id="smt_first_start" value="" placeholder="首件生产日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_first_finish">首件完成日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" class="form-control" required name="smt_first_end" id="smt_first_end" value="" placeholder="首件完成日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_first_opertor">首件操作者</label>
                          <input type="text" class="form-control" required name="smt_first_opertor" id="smt_first_opertor" value="" placeholder="首件操作者">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_batch_completion">批次完成量</label>
                          <input type="number" class="form-control" required name="smt_batch_completion" id="smt_batch_completion" value="" placeholder="批次完成量">
                        </div>
                        <div class="form-group col-md-3">
                          <label for=" smt_batch_end ">批次完成日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" required class="form-control" name="smt_batch_end" id="smt_batch_end" value="" placeholder="批次完成日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_opertor">操作者</label>
                          <input type="text" class="form-control" required name="smt_opertor" id="smt_opertor" value="" placeholder="操作者">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_turn_department">转序日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" required class="form-control" name="smt_turn_department" id="smt_turn_department" value="" placeholder="转序日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="smt_turn_volume">转序量</label>
                          <input type="number" required class="form-control" name="smt_turn_volume" id="smt_turn_volume" value="" placeholder="转序量">
                        </div>
                      </div>

                    </form>
                  </div>
                  <div class="card-footer border-top ">
                    <div class="col">
                      <button id="btn2" form="workshop-smt_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>确定</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="workshop-smt-search_check.php" class="main-navbar__search w-100" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="smt_id" id="smt_id" style="height:50px; border-radius:25px;" type="text" value="<?php echo $_SESSION['order_id'] ?>" placeholder="请输入订单号..." aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="dataTables_length" id="table_length">
            <div class="">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="#" data-toggle="modal" data-target="#modaladdnew" class="btn btn-primary "><i class="fa fa-plus mr-1"></i> 新增SMT </a>
              </div>
            </div>
          </div>

          <table id="smttable">
            <thead>
			        <tr>
                <th>订单号</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>领料时间</th>
                <th>准备时间</th>
                <th>产线号</th>
                <th>班次</th>
                <th>首件生产日期</th>
                <th>首件完成时间</th>
                <th>首件操作者</th>
                <th>批次完成量</th>
                <th>批次完成时间</th>
                <th>操作者</th>
                <th>转序日期</th>
                <th>转序量</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from smt where order_id='$id'";
              $result=mysqli_query($conn,$sql);
              $loginNum=mysqli_num_rows($result);
              if(!$result)
              {
                die('Could not connect:' .mysqli_error());
              }
              for($i=0; $i<$loginNum; $i++){
                $row = mysqli_fetch_assoc($result);
                echo "<tr>";
                echo "<td>{$row['order_id']}</td>";
                echo "<td>{$sql_arr['order_name']}</td>";
                echo "<td>{$sql_arr['order_type']}</td>";
                echo "<td>{$sql_arr['order_volume']}</td>";
                echo "<td>{$row['smt_get']}</td>";
                echo "<td>{$row['smt_readiness']}</td>";
                echo "<td>{$row['smt_line']}</td>";
                echo "<td>{$row['smt_classes']}</td>";
                echo "<td>{$row['smt_first_start']}</td>";
                echo "<td>{$row['smt_first_end']}</td>";
                echo "<td>{$row['smt_first_opertor']}</td>";
                echo "<td>{$row['smt_batch_completion']}</td>";
                echo "<td>{$row['smt_batch_end']}</td>";
                echo "<td>{$row['smt_opertor']}</td>";
                echo "<td>{$row['smt_turn_department']}</td>";
                echo "<td>{$row['smt_turn_volume']}</td>";
                echo "<td>
                <form action='javascript:dele({$row['id']})' method='post' id='del{$row['id']}'>
                </form>
                <div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                  <button type='button' data-toggle='modal' data-target='#modaledit{$i}' class='btn btn-white'>
                   <i class='material-icons'>&#xE254;</i>
                  </button>
                  <button form='del{$row['id']}' class='btn btn-white'>
                    <i class='material-icons'>&#xE872;</i>
                  </button>
                </div>
                </td>";
                echo "</tr>";
                echo "
                <div class='modal fade' id='modaledit{$i}' data-backdrop='static' tabindex='-1' role='dialog' aria-hidden='true'>
                  <div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
                    <div class='modal-content'>
                      <div class='modal-card card' data-toggle='lists' data-options='{'valueNames': ['name']}'>
                        <div class='card-header ' style='display: flex;'>
                          <!-- Title -->

                          <h5 class='modal-title col text-center' id='gridModalLabel'>修改问题反馈记录单</h5>
                          <!-- Close -->
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <!-- body  -->
                        <div class='card-body p-0'>
                          <form action='workshop-smt-edit_check.php?+id={$row['id']}' class='py-2' id='smt_edit{$i}' method='post'>


                            <div class='form-row mx-4'>
                              <div class='form-group col-md-3'>
                                <label for='order_id'>订单号</label>
                                <input type='text' class='form-control' name='order_id' id='order_id' value='{$sql_arr['order_id']}' placeholder='订单号' readonly='readonly'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='order_name'>品名</label>
                                <input type='text' class='form-control' name='order_name' id='order_name' value=' {$sql_arr['order_name']}' placeholder='品名' readonly='readonly'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='order_type'>规格/型号/图号</label>
                                <input type='text' class='form-control' name='order_type' id='order_type' value=' {$sql_arr['order_type']}' placeholder='规格/型号/图号' readonly='readonly'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='order_volume'>订单量</label>
                                <input type='number' class='form-control' name='order_volume' id='order_volume' value='{$sql_arr['order_volume']}' placeholder='订单量' readonly='readonly'>
                              </div>
                            </div>

                            <hr class='mx-4'>
                            <div class='form-row mx-4'>
                              <div class='form-group col-md-3'>
                                <label for='smt_get'>领料日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' type='text' required class='form-control' name='smt_get' id='smt_get' value='{$row['smt_get']}' placeholder='领料日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_readiness'>准备时间</label>
                                <input type='text' required class='form-control' name='smt_readiness' id='smt_readiness' value='{$row['smt_readiness']}' placeholder='准备时间'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for=' smt_line '>产线号</label>
                                <input type='text' class='form-control' required name='smt_line' id='smt_line' value='{$row['smt_line']}' placeholder='产线号'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_classes'>班次</label>
                                <input type='text' class='form-control' required name='smt_classes' id='smt_classes' value='{$row['smt_classes']}' placeholder='班次'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_first_start'>首件生产日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' class='form-control' required name='smt_first_start' id='smt_first_start' value='{$row['smt_first_start']}' placeholder='首件生产日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_first_finish'>首件完成日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' class='form-control' required name='smt_first_end' id='smt_first_end' value='{$row['smt_first_end']}' placeholder='首件完成日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_first_opertor'>首件操作者</label>
                                <input type='text' class='form-control' required name='smt_first_opertor' id='smt_first_opertor' value='{$row['smt_first_opertor']}' placeholder='首件操作者'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_batch_completion'>批次完成量</label>
                                <input type='number' class='form-control' required name='smt_batch_completion' id='smt_batch_completion' value='{$row['smt_batch_completion']}' placeholder='批次完成量'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for=' smt_batch_end '>批次完成日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' required class='form-control' name='smt_batch_end' id='smt_batch_end' value='{$row['smt_batch_end']}' placeholder='批次完成日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_opertor'>操作者</label>
                                <input type='text' class='form-control' required name='smt_opertor' id='smt_opertor' value='{$row['smt_opertor']}' placeholder='操作者'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_turn_department'>转序日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' required class='form-control' name='smt_turn_department' id='smt_turn_department' value='{$row['smt_turn_department']}' placeholder='转序日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='smt_turn_volume'>转序量</label>
                                <input type='number' required class='form-control' name='smt_turn_volume' id='smt_turn_volume' value='{$row['smt_turn_volume']}' placeholder='转序量'>
                              </div>
                            </div>

                          </form>
                        </div>
                        <div class='card-footer border-top '>
                          <div class='col'>
                            <button id='btn2' form='smt_edit{$i}' class='btn  btn-accent mx-auto d-table mr-3'><i class='fa fa-check mr-1'></i>确定</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                ";
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
