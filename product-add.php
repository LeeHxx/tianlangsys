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
    var product_id=$("#product_id").val();
    if(product_id==""){
      $("#product_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var product_receive_date=$("#product_receive_date").val();
    var product_receiver=$("#product_receiver").val();
    var product_pack_date=$("#product_pack_date").val();
    var product_packer=$("#product_packer").val();
    var product_pack_volume=$("#product_pack_volume").val();
    var product_deliver=$("#product_deliver").val();
    var product_deliver_volume=$("#product_deliver_volume").val();
    var product_shipper=$("#product_shipper").val();
    if(product_receive_date==""){
      $("#product_receive_date").focus();
      return false;
    }else if(product_receiver==""){
      $("#product_receiver").focus();
      return false;
    }else if(product_pack_date==""){
      $("#product_pack_date").focus();
      return false;
    }else if(product_packer==""){
      $("#product_packer").focus();
      return false;
    }else if(product_pack_volume==""){
      $("#product_pack_volume").focus();
      return false;
    }else if(product_deliver==""){
      $("#product_deliver").focus();
      return false;
    }else if(product_deliver_volume==""){
      $("#product_deliver_volume").focus();
      return false;
    }else if(product_shipper==""){
      $("#product_shipper").focus();
      return false;
    }
  });
  $('#productable').DataTable( {
    responsive: !0,
    searching: false,
    // ordering: false,
    // info:false,
    paging: false,
    language: {
      "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
      "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
      "sEmptyTable": "订单暂无成品记录"
    }
  });
});
function dele(id) {
  if(confirm("确认删除吗？")){
  $.post("product-del_check.php?id="+id,function(data){
    if($.trim(data)=='yes'){
      alert("删除成功！")
      window.location.href='product-add.php';
      return true;
    }else{
      alert("该条记录无法删除 ！")
      window.location.href='product-add.php';
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
              <span class="text-uppercase page-subtitle">product</span>
              <h3 class="page-title">成品管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="product-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
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

                    <h5 class="modal-title col text-center" id="gridModalLabel">新增成品信息</h5>
                    <!-- Close -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- body  -->
                  <div class="card-body p-0">
                    <form action="product-add_check.php" class="py-4" id="product_add0" method="post">


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
                          <label for="product_receive_date">接料日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" class="form-control" name="product_receive_date" id="product_receive_date" value="" placeholder="首件送检日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="product_receiver">接收者</label>
                          <input type="text" class="form-control" name="product_receiver" id="product_receiver" value="" placeholder="接收者">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="product_pack_date">包装日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" class="form-control" name="product_pack_date" id="product_pack_date" value="" placeholder="包装日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="product_packer">包装者</label>
                          <input type="text" class="form-control" name="product_packer" id="product_packer" value="" placeholder="包装者">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="product_pack_volume">包装数量</label>
                          <input type="number" class="form-control" name="product_pack_volume" id="product_pack_volume" value="" placeholder="包装数量">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="product_deliver">出库日期</label>
                          <div class="input-group with-addon-icon-left" >
                          <input data-provide="datepicker" class="form-control" name="product_deliver" id="product_deliver" value="" placeholder="出库日期">
                          <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </span>
                          </span>
                          </div>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="product_deliver_volume">出库数量</label>
                          <input type="number" class="form-control" name="product_deliver_volume" id="product_deliver_volume" value="" placeholder="出库数量">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="product_shipper">发货人</label>
                          <input type="text" class="form-control" name="product_shipper" id="product_shipper" value="" placeholder="发货人">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="product_client">客户名</label>
                          <input type="text" required class="form-control" name="product_client" id="product_client" value="" placeholder="客户名">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer border-top ">
                    <div class="col">
                      <button id="btn2" form="product_add0" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>确定</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card card-small mb-4">
                <form action="product-search_check.php" class="main-navbar__search w-100 " id="product_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="product_id" id="product_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>" aria-label="Search">
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

          <table id="productable">
            <thead>
              <tr>
                <th>订单号</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>接料日期</th>
                <th>接收者</th>
                <th>包装日期</th>
                <th>包装者</th>
                <th>包装数量</th>
                <th>出库日期</th>
                <th>出库量</th>
                <th>发货者</th>
                <th>客户名</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from product where order_id='$id'";
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
                echo "<td>{$row['product_receive_date']}</td>";
                echo "<td>{$row['product_receiver']}</td>";
                echo "<td>{$row['product_pack_date']}</td>";
                echo "<td>{$row['product_packer']}</td>";
                echo "<td>{$row['product_pack_volume']}</td>";
                echo "<td>{$row['product_deliver']}</td>";
                echo "<td>{$row['product_deliver_volume']}</td>";
                echo "<td>{$row['product_shipper']}</td>";
                echo "<td>{$row['product_client']}</td>";
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

                          <h5 class='modal-title col text-center' id='gridModalLabel'>修改成品信息</h5>
                          <!-- Close -->
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                          </button>
                        </div>
                        <!-- body  -->
                        <div class='card-body p-0'>
                          <form action='product-edit_check.php?+id={$row['id']}' class='py-2' id='product_edit{$i}' method='post'>


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
                                <label for='product_receive_date'>接料日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' class='form-control' name='product_receive_date' id='product_receive_date' value='{$row['product_receive_date']}' placeholder='首件送检日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='product_receiver'>接收者</label>
                                <input type='text' class='form-control' name='product_receiver' id='product_receiver' value='{$row['product_receiver']}' placeholder='接收者'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='product_pack_date'>包装日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' class='form-control' name='product_pack_date' id='product_pack_date' value='{$row['product_pack_date']}' placeholder='包装日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='product_packer'>包装者</label>
                                <input type='text' class='form-control' name='product_packer' id='product_packer' value='{$row['product_packer']}' placeholder='包装者'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='product_pack_volume'>包装数量</label>
                                <input type='number' class='form-control' name='product_pack_volume' id='product_pack_volume' value='{$row['product_pack_volume']}' placeholder='包装数量'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='product_deliver'>出库日期</label>
                                <div class='input-group with-addon-icon-left' >
                                <input data-provide='datepicker' class='form-control' name='product_deliver' id='product_deliver' value='{$row['product_deliver']}' placeholder='出库日期'>
                                <span class='input-group-append'>
                                  <span class='input-group-text'>
                                      <i class='fa fa-calendar'></i>
                                  </span>
                                </span>
                                </div>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='product_deliver_volume'>出库数量</label>
                                <input type='number' class='form-control' name='product_deliver_volume' id='product_deliver_volume' value='{$row['product_deliver_volume']}' placeholder='出库数量'>
                              </div>
                              <div class='form-group col-md-3'>
                                <label for='product_shipper'>发货人</label>
                                <input type='text' class='form-control' name='product_shipper' id='product_shipper' value='{$row['product_shipper']}' placeholder='发货人'>
                              </div>
                              <div class='form-group col-md-4'>
                                <label for='product_client'>客户名</label>
                                <input type='text' required class='form-control' name='product_client' id='product_client' value='{$row['product_client']}' placeholder='客户名'>
                              </div>
                            </div>

                          </form>
                        </div>
                        <div class='card-footer border-top '>
                          <div class='col'>
                            <button id='btn2' form='product_edit{$i}' class='btn  btn-accent mx-auto d-table mr-3'><i class='fa fa-check mr-1'></i>修改</button>
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
