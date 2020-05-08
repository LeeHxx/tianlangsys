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
  // $("#btn2").click(function(){
  //   var quality_first_date=$("#quality_first_date").val();
  //   var quality_first_inspection=$("#quality_first_inspection").val();
  //   var quality_first_confirm=$("#quality_first_confirm").val();
  //   var quality_batch_inspect=$("#quality_batch_inspect").val();
  //   var quality_inspection=$("#quality_inspection").val();
  //   var quality_OK_volume=$("#quality_OK_volume").val();
  //   var quality_NG_volume=$("#quality_NG_volume").val();
  //   var quality_inspection_confirm=$("#quality_inspection_confirm").val();
  //   var quality_inspection_date=$("#quality_inspection_date").val();
  //   if(quality_first_date==""){
  //     $("#quality_first_date").focus();
  //     return false;
  //   }else if(quality_first_inspection==""){
  //     $("#quality_first_inspection").focus();
  //     return false;
  //   }else if(quality_first_confirm==""){
  //     $("#quality_first_confirm").focus();
  //     return false;
  //   }else if(quality_batch_inspect==""){
  //     $("#quality_batch_inspect").focus();
  //     return false;
  //   }else if(quality_inspection==""){
  //     $("#quality_inspection").focus();
  //     return false;
  //   }else if(quality_OK_volume==""){
  //     $("#quality_OK_volume").focus();
  //     return false;
  //   }else if(quality_NG_volume==""){
  //     $("#quality_NG_volume").focus();
  //     return false;
  //   }else if(quality_inspection_confirm==""){
  //     $("#quality_inspection_confirm").focus();
  //     return false;
  //   }else if(quality_inspection_date==""){
  //     $("#quality_inspection_date").focus();
  //     return false;
  //   }
  // });
  $('#qualitytable').DataTable( {
    responsive: !0,
    searching: false,
    // ordering: false,
    // info:false,
    paging: false,
    language: {
      "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
      "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
      "sEmptyTable": "订单暂无质检信息"
    }
  });
});
function dele(id) {
  if(confirm("确认删除吗？")){
  $.post("quality-del_check.php?id="+id,function(data){
    if($.trim(data)=='yes'){
      alert("删除成功！")
      window.location.href='quality-add.php';
      return true;
    }else{
      alert("该条记录无法删除 ！")
      window.location.href='quality-add.php';
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
              <span class="text-uppercase page-subtitle">quality</span>
              <h3 class="page-title">质量管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="quality-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
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

                    <h5 class="modal-title col text-center" id="gridModalLabel">新增质检信息</h5>
                    <!-- Close -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- body  -->
                  <div class="card-body p-0">
                    <form action="quality-add_check.php" class="py-4" id="quality_add0" method="post">


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
                          <label for="quality_first_date">首件送检日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" required class="form-control" name="quality_first_date" id="quality_first_date" value="" placeholder="首件送检日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="quality_first_inspection">首件送检者</label>
                          <input type="text" required class="form-control" name="quality_first_inspection" id="quality_first_inspection" value="" placeholder="首件送检者">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="quality_first_confirm">首件确认</label>
                          <select required class="custom-select" name="quality_first_confirm" id="quality_first_confirm" value="" placeholder="首件确认">
                            <option value="" selected="">请选择...</option>
                            <option value="已确认" >已确认</option>
                            <option value="未确认" >未确认</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="quality_batch_inspect">批次送检日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" required class="form-control" name="quality_batch_inspect" id="quality_batch_inspect" value="" placeholder="批次送检日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="quality_inspection">送检者</label>
                          <input type="text" required class="form-control" name="quality_inspection" id="quality_inspection" value="" placeholder="送检者">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="quality_OK_volume">合格数</label>
                          <input type="number" required class="form-control" name="quality_OK_volume" id="quality_OK_volume" value="" placeholder="合格数">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="quality_NG_volume">NG数</label>
                          <input type="number" required class="form-control" name="quality_NG_volume" id="quality_NG_volume" value="" placeholder="NG数">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="quality_inspection_confirm">检验确认</label>
                          <input type="text" required class="form-control" name="quality_inspection_confirm" id="quality_inspection_confirm" value="" placeholder="检验确认">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="quality_inspection_date">检验确认日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" required class="form-control" name="quality_inspection_date" id="quality_inspection_date" value="" placeholder="检验确认日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer border-top ">
                    <div class="col">
                      <button id="btn2" form="quality_add0" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>确定</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card mb-4" style="border-radius: 2rem;">
                <form action="quality-search_check.php" class="main-navbar__search w-100 " id="quality_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="quality_id" id="quality_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>




          <div class="dataTables_length" id="table_length">
            <div class="">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="#" data-toggle="modal" data-target="#modaladdnew" class="btn btn-primary "><i class="fa fa-plus mr-1"></i> 新增质检信息 </a>
              </div>
            </div>
          </div>

          <table id="qualitytable">
            <thead>
              <tr>
                <th>订单号</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>首件送检日期</th>
                <th>首件送检者</th>
                <th>首件确认</th>
                <th>批次送检日期</th>
                <th>送检者</th>
                <th>合格数</th>
                <th>NG数</th>
                <th>检验确认</th>
                <th>检验确认日期</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from quality where order_id='$id'";
              $result=mysqli_query($conn,$sql);
              $loginNum=mysqli_num_rows($result);
              if(!$result)
              {
                die('数据库连接失败:' .mysqli_error());
              }
              for($i=0; $i<$loginNum; $i++){
                $row = mysqli_fetch_assoc($result);
                echo "<tr>";
                echo "<td>{$row['order_id']}</td>";
                echo "<td>{$sql_arr['order_name']}</td>";
                echo "<td>{$sql_arr['order_type']}</td>";
                echo "<td>{$sql_arr['order_volume']}</td>";
                echo "<td>{$row['quality_first_date']}</td>";
                echo "<td>{$row['quality_first_inspection']}</td>";
                echo "<td>{$row['quality_first_confirm']}</td>";
                echo "<td>{$row['quality_batch_inspect']}</td>";
                echo "<td>{$row['quality_inspection']}</td>";
                echo "<td>{$row['quality_OK_volume']}</td>";
                echo "<td>{$row['quality_NG_volume']}</td>";
                echo "<td>{$row['quality_inspection_confirm']}</td>";
                echo "<td>{$row['quality_inspection_date']}</td>";
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

                          <h5 class='modal-title col text-center' id='gridModalLabel'>修改质检信息</h5>
                          <!-- Close -->
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <!-- body  -->
                        <div class='card-body p-0'>
                          <form action='quality-edit_check.php?+id={$row['id']}' class='py-2' id='quality_edit{$i}' method='post'>


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
                                <label for='quality_first_date'>首件送检日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' required class='form-control' name='quality_first_date' id='quality_first_date' value='{$row['quality_first_date']}' placeholder='首件送检日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-2'>
                                <label for='quality_first_inspection'>首件送检者</label>
                                <input type='text' required class='form-control' name='quality_first_inspection' id='quality_first_inspection' value='{$row['quality_first_inspection']}' placeholder='首件送检者'>
                              </div>
                              <div class='form-group col-md-2'>
                                <label for='quality_first_confirm'>首件确认</label>
                                <select required class='custom-select' name='quality_first_confirm' id='quality_first_confirm' value='{$row['quality_first_confirm']}' placeholder='首件确认'>
                                  <option value='' selected=''>请选择...</option>
                                  <option value='已确认' >已确认</option>
                                  <option value='未确认' >未确认</option>
                                </select>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='quality_batch_inspect'>批次送检日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' required class='form-control' name='quality_batch_inspect' id='quality_batch_inspect' value='{$row['quality_batch_inspect']}' placeholder='批次送检日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-2'>
                                <label for='quality_inspection'>送检者</label>
                                <input type='text' required class='form-control' name='quality_inspection' id='quality_inspection' value='{$row['quality_inspection']}' placeholder='送检者'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='quality_OK_volume'>合格数</label>
                                <input type='number' required class='form-control' name='quality_OK_volume' id='quality_OK_volume' value='{$row['quality_OK_volume']}' placeholder='合格数'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='quality_NG_volume'>NG数</label>
                                <input type='number' required class='form-control' name='quality_NG_volume' id='quality_NG_volume' value='{$row['quality_NG_volume']}' placeholder='NG数'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='quality_inspection_confirm'>检验确认</label>
                                <input type='text' required class='form-control' name='quality_inspection_confirm' id='quality_inspection_confirm' value='{$row['quality_inspection_confirm']}' placeholder='检验确认'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='quality_inspection_date'>检验确认日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' required class='form-control' name='quality_inspection_date' id='quality_inspection_date' value='{$row['quality_inspection_date']}' placeholder='检验确认日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                            </div>

                          </form>
                        </div>
                        <div class='card-footer border-top '>
                          <div class='col'>
                            <button id='btn2' form='quality_edit{$i}' class='btn  btn-accent mx-auto d-table mr-3'><i class='fa fa-check mr-1'></i>修改</button>
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
