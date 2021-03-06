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
    var glue_id=$("#glue_id").val();
    if(glue_id==""){
      $("#glue_id").focus();
      return false;
    }
  });
  // $("#btn2").click(function(){
  //   var glue_get=$("#glue_get").val();
  //   var glue_readiness=$("#glue_readiness").val();
  //   var glue_opertor=$("#glue_opertor").val();
  //   var glue_completion=$("#glue_completion").val();
  //   var glue_end=$("#glue_end").val();
  //   var glue_turn_date=$("#glue_turn_date").val();
  //   var glue_turn_volume=$("#glue_turn_volume").val();
  //   if(glue_get==""){
  //     $("#glue_get").focus();
  //     return false;
  //   }else if(glue_readiness==""){
  //     $("#glue_readiness").focus();
  //     return false;
  //   }else if(glue_opertor==""){
  //     $("#glue_opertor").focus();
  //     return false;
  //   }else if(glue_completion==""){
  //     $("#glue_completion").focus();
  //     return false;
  //   }else if(glue_end==""){
  //     $("#glue_end").focus();
  //     return false;
  //   }else if(glue_turn_date==""){
  //     $("#glue_turn_date").focus();
  //     return false;
  //   }else if(glue_turn_volume==""){
  //     $("#glue_turn_volume").focus();
  //     return false;
  //   }
  // });
  $('#gluetable').DataTable( {
    responsive: !0,
    searching: false,
    // ordering: false,
    // info:false,
    paging: false,
    language: {
      "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
      "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
      "sEmptyTable": "订单暂无打胶信息"
    }
  });
  $('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    orientation:" auto",
    });
});
function dele(id) {
  if(confirm("确认删除吗？")){
  $.post("workshop-glue-del_check.php?id="+id,function(data){
    if($.trim(data)=='yes'){
      alert("删除成功！")
      window.location.href='workshop-glue-add.php';
      return true;
    }else{
      alert("该条记录无法删除 ！")
      window.location.href='workshop-glue-add.php';
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
              <span class="text-uppercase page-subtitle">workshop</span>
              <h3 class="page-title">打胶管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="workshop-glue-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
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

                    <h5 class="modal-title col text-center" id="gridModalLabel">新增</h5>
                    <!-- Close -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- body  -->
                  <div class="card-body p-0">
                    <form action="workshop-glue-add_check.php" class="py-4" id="workshop-glue_add" method="post">

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
                          <label for="glue_get">领料日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" type="text" required class="form-control" name="glue_get" id="glue_get" value="" placeholder="领料日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="glue_readiness">准备时间</label>
                          <input type="text" required class="form-control" name="glue_readiness" id="glue_readiness" value="" placeholder="准备时间">
                        </div>
                        <div class="form-group col-md-3">
                          <label for=" glue_opertor ">操作者</label>
                          <input type="text" class="form-control" required name="glue_opertor" id="glue_opertor" value="" placeholder="操作者">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="glue_completion">批次完成量</label>
                          <input type="number" class="form-control" required name="glue_completion" id="glue_completion" value="" placeholder="批次完成量">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="glue_end">批次完成日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" class="form-control" required name="glue_end" id="glue_end" value="" placeholder="批次完成日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="glue_turn_date">转序日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" class="form-control" required name="glue_turn_date" id="glue_turn_date" value="" placeholder="转序日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="glue_turn_volume">转序量</label>
                          <input type="number" class="form-control" required name="glue_turn_volume" id="glue_turn_volume" value="" placeholder="转序量">
                        </div>
                      </div>

                    </form>
                  </div>
                  <div class="card-footer border-top ">
                    <div class="col">
                      <button id="btn2" form="workshop-glue_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>确定</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="workshop-glue-search_check.php" class="main-navbar__search w-100" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="glue_id" id="glue_id" style="height:50px; border-radius:25px;" type="text" value="<?php echo $_SESSION['order_id'] ?>" placeholder="请输入订单号..." aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>



          <div class="dataTables_length" id="table_length">
            <div class="">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="#" data-toggle="modal" data-target="#modaladdnew" class="btn btn-primary "><i class="fa fa-plus mr-1"></i> 新增 </a>
              </div>
            </div>
          </div>

          <table id="gluetable">
            <thead>
			        <tr>
                <th>订单号</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>领料时间</th>
                <th>准备时间</th>
                <th>操作者</th>
                <th>批次完成量</th>
                <th>批次完成日期</th>
                <th>转序日期</th>
                <th>转序量</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from glue where order_id='$id'";
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
                echo "<td>{$row['glue_get']}</td>";
                echo "<td>{$row['glue_readiness']}</td>";
                echo "<td>{$row['glue_opertor']}</td>";
                echo "<td>{$row['glue_completion']}</td>";
                echo "<td>{$row['glue_end']}</td>";
                echo "<td>{$row['glue_turn_date']}</td>";
                echo "<td>{$row['glue_turn_volume']}</td>";
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

                          <h5 class='modal-title col text-center' id='gridModalLabel'>修改</h5>
                          <!-- Close -->
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <!-- body  -->
                        <div class='card-body p-0'>
                          <form action='workshop-glue-edit_check.php?+id={$row['id']}' class='py-2' id='glue_edit{$i}' method='post'>


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
                                <label for='glue_get'>领料日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' type='text' required class='form-control' name='glue_get' id='glue_get' value='{$row['glue_get']}' placeholder='领料日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='glue_readiness'>准备时间</label>
                                <input type='text' required class='form-control' name='glue_readiness' id='glue_readiness' value='{$row['glue_readiness']}' placeholder='准备时间'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for=' glue_opertor '>操作者</label>
                                <input type='text' class='form-control' required name='glue_opertor' id='glue_opertor' value='{$row['glue_opertor']}' placeholder='操作者'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='glue_completion'>批次完成量</label>
                                <input type='number' class='form-control' required name='glue_completion' id='glue_completion' value='{$row['glue_completion']}' placeholder='批次完成量'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='glue_end'>批次完成日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' class='form-control' required name='glue_end' id='glue_end' value='{$row['glue_end']}' placeholder='批次完成日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='glue_turn_date'>转序日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' class='form-control' required name='glue_turn_date' id='glue_turn_date' value='{$row['glue_turn_date']}' placeholder='转序日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='glue_turn_volume'>转序量</label>
                                <input type='number' class='form-control' required name='glue_turn_volume' id='glue_turn_volume' value='{$row['glue_turn_volume']}' placeholder='转序量'>
                              </div>
                            </div>

                          </form>
                        </div>
                        <div class='card-footer border-top '>
                          <div class='col'>
                            <button id='btn2' form='glue_edit{$i}' class='btn  btn-accent mx-auto d-table mr-3'><i class='fa fa-check mr-1'></i>确定</button>
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
