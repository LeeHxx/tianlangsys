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
      var order_id=$("#order_id").val();
      var order_name=$("#order_name").val();
      var order_type=$("#order_type").val();
      var order_volume=$("#order_volume").val();
      var order_client=$("#order_client").val();
      var order_start=$("#order_start").val();
      var order_end=$("#order_end").val();
      if(order_id==""){
        $("#order_id").focus();
        return false;
      }else if(order_name==""){
        $("#order_name").focus();
        return false;
       }else if(order_type==""){
        $("#order_type").focus();
        return false;
      }else if(order_volume==""){
        $("#order_volume").focus();
        return false;
       }else if(order_client==""){
        $("#order_client").focus();
        return false;
       }else if(order_start==""){
        $("#order_start").focus();
        return false;
       }else if(order_end==""){
        $("#order_end").focus();
        return false;

      }

    });
  });

//   $('#modaledit').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Button that triggered the modal
//   var recipient = button.data('whatever') // Extract info from data-* attributes
//   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//   alert(recipient)
//   var modal = $(this)
//   // modal.find('.modal-title').text('New message to ' + recipient)
//   modal.$("#order_id").val(recipient)
// });

    function dele(id) {
      if(confirm("确认删除吗？")){
      $.post("order-del_check.php?id="+id,function(data){
        if($.trim(data)=='yes'){
          alert("删除成功！")
          window.location.href='order.php';
          return true;
        }else{
          alert("该条记录无法删除 ！")
          window.location.href='order.php';
          return false;
        }
      },"text");
      }
    }
  </script>
</head>
<body class="h-100">

  <!-- 新增订单modal -->
  <div class="modal fade" id="modaladdnew" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-card card" data-toggle="lists" data-options='{"valueNames": ["name"]}'>
          <div class="card-header " style="display: flex;">
            <!-- Title -->
            <h5 class="modal-title col text-center" id="gridModalLabel">新增订单</h5>

            <!-- Close -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- body  -->
          <div class="card-body p-0">
            <form action="order-add_check.php" class="py-4" id="order_add" method="post">

              <div class="form-row mx-4 mt-2">
                <div class="form-group col-md-3">
                  <label for="order_id">订单号</label>
                  <input type="text" class="form-control" name="order_id" id="order_id" value="" placeholder="订单号">
                </div>
                <div class="form-group col-md-3">
                  <label for="order_name">品名</label>
                  <input type="text" class="form-control" name="order_name" id="order_name" value="" placeholder="品名">
                </div>

                <div class="form-group col-md-3">
                  <label for="order_type">规格/型号/图号</label>
                  <input type="text" class="form-control" name="order_type" id="order_type" value="" placeholder="规格/型号/图号">
                </div>
                <div class="form-group col-md-3">
                  <label for="order_volume">订单量</label>
                  <input type="number" class="form-control" name="order_volume" id="order_volume" value="" placeholder="订单量">
                </div>
              </div>
              <div class="form-row mx-4">
                <div class="form-group col-md-4">
                  <label for="order_client">客户</label>
                  <input type="text" class="form-control" name="order_client" id="order_client" value="" placeholder="客户名称">
                </div>
                <div class="form-group col-md-8">
                  <label for="firstName">接交单日期</label>
                  <div class="input-daterange input-group" id="transaction-history-date-range">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                    <input type="text" class="input-sm form-control" name="order_start" id="order_start"  placeholder="接单日期" />
                    <span class="input-group-middle"><span class="input-group-text">-</span></span>
                    <input type="text" class="input-sm form-control" name="order_end" id="order_end" placeholder="交货日期" />
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
          <div class="card-footer border-top">
            <div class="col">
              <button id="btn1" form="order_add" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>确定</button>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

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
              <span class="text-uppercase page-subtitle">order</span>
              <h3 class="page-title">订单列表</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="order-add.php" data-toggle="modal" data-target="#modaladdnew" class="btn btn-primary"><i class="fa fa-plus mr-1"></i> 添加订单 </a>
              </div>
            </div>
          </div>
          <!-- End Page Header -->
          <!-- Order Table -->
          <table class="transaction-history d-none">
            <thead>
              <tr>
                <th>序号</th>
                <th>接单日期</th>
                <th>客户</th>
                <th>订单号</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>交货日期</th>
                <th>订单状态</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from orders";
              $result=mysqli_query($conn,$sql);
              $loginNum=mysqli_num_rows($result);
              for($i=0; $i<$loginNum; $i++){
                $row = mysqli_fetch_assoc($result);
                $ii=$i+1;
                echo "<tr>";
                echo "<td>{$ii}</td>";
                echo "<td><strong>{$row['order_start']}</strong></td>";
                echo "<td><strong>{$row['order_client']}</strong></td>";
                echo "<td><strong>{$row['order_id']}</strong></td>";
                echo "<td><strong>{$row['order_name']}</strong></td>";
                echo "<td><strong>{$row['order_type']}</strong></td>";
                echo "<td><strong>{$row['order_volume']}</strong></td>";
                echo "<td><strong>{$row['order_end']}</strong></td>";
                if ($row['order_finished']=='0') {
                  echo "<td>
                  <span class='text-warning'>生产中</span>
                  </td>";
                }else {
                  echo "<td><span class='text-success'>已完成</span></td>";
                }

                echo "<td>
                <form action='javascript:dele({$row['id']})' method='post' id='{$row['order_id']}'>
                </form>
                <form action='order-edit.php?id={$row['order_id']}' method='post' id='edit{$i}'>
                </form>
                <form action='order-status.php?id={$row['order_id']}' method='post' id='time{$i}'>
                </form>

                <div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                  <button form='time{$i}' type='submit' class='btn btn-white' data-toggle='tooltip' data-placement='top' title='' data-original-title='订单状态'>
                    <i class='material-icons'>menu</i>
                  </button>
                  <button form='edit{$i}' data-whatever='{$row['order_id']}' type='submit' class='btn btn-white' data-toggle='tooltip' data-placement='top' title='' data-original-title='修改订单'>
                    <i class='material-icons'>&#xE254;</i>
                  </button>
                  <button form='{$row['order_id']}' type='submit' class='btn btn-white' data-toggle='tooltip' data-placement='top' title='' data-original-title='删除订单'>
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
          <!-- End Order Table -->
        </div>
        <!-- end Page -->
      </main>
    </div>
  </div>





  <!-- 编辑订单modal (未完成)-->
  <div class="modal fade" id="modaledit" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-card card" data-toggle="lists" data-options='{"valueNames": ["name"]}'>
          <div class="modal-header">
            <!-- Title -->
            <h5 class="modal-title" id="gridModalLabel">修改订单</h5>
            <!-- Close -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- body  -->
          <div class="card-body p-0">
            <form action="order-edit_check.php" class="py-4" id="order_edit" method="post">

              <div class="form-row mx-4 mt-2">
                <div class="form-group col-md-3">
                  <label for="order_id">订单号</label>
                  <input type="text" class="form-control" name="order_id" id="order_id" value="<?php echo $sql_arr['order_id'] ?>" placeholder="订单号" readonly="readonly">
                </div>
                <div class="form-group col-md-3">
                  <label for="order_name">品名</label>
                  <input type="text" class="form-control" name="order_name" id="order_name" value="<?php echo $sql_arr['order_name'] ?>" placeholder="品名">
                </div>

                <div class="form-group col-md-3">
                  <label for="order_type">规格/型号/图号</label>
                  <input type="text" class="form-control" name="order_type" id="order_type" value="<?php echo $sql_arr['order_type'] ?>" placeholder="规格/型号/图号">
                </div>
                <div class="form-group col-md-3">
                  <label for="order_volume">订单量</label>
                  <input type="number" class="form-control" name="order_volume" id="order_volume" value="<?php echo $sql_arr['order_volume'] ?>" placeholder="订单量">
                </div>
              </div>
              <div class="form-row mx-4">
                <div class="form-group col-md-4">
                  <label for="order_client">客户</label>
                  <input type="text" class="form-control" name="order_client" id="order_client" value="<?php echo $sql_arr['order_client'] ?>" placeholder="客户名称">
                </div>
                <div class="form-group col-md-8">
                  <label for="firstName">接交单日期</label>
                  <div class="input-daterange input-group" id="transaction-history-date-range">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                    <input type="text" class="input-sm form-control" name="order_start" id="order_start" value="<?php echo $sql_arr['order_start'] ?>" placeholder="接单日期" />
                    <span class="input-group-middle"><span class="input-group-text">-</span></span>
                    <input type="text" class="input-sm form-control" name="order_end" id="order_end" value="<?php echo $sql_arr['order_end'] ?>" placeholder="交货日期" />
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
          <div class="card-footer border-top">
            <div class="col">
              <button id="btn1" form="order_edit" class="btn  btn-info mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>保存修改</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <?php include('script.php') ?>
</body>
</html>
