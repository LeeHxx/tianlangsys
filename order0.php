<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
  <script type="text/javascript">
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
                <a id="add-new-event" href="order-add.php" class="btn btn-primary"><i class="fa fa-plus mr-1"></i> 添加订单 </a>
              </div>
            </div>
          </div>



          <button class='btn btn-white' data-toggle='modal' data-target='#lee'>aaa</button>
          <div class="modal fade" id="lee" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">🤔 Think about it</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="order-edit_check.php" class="py-4" id="order_edit" method="post">
                    <!--<div class="form-row mx-4 ">
                      <div class="col  ">
                        <h5 class="form-text m-0">订单信息</h5>
                      </div>
                    </div>
                    <hr>-->
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Nope</button>
                  <button type="button" class="btn btn-success" data-dismiss="modal">Yep</button>
                </div>
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
                echo "<td>{$row['order_start']}</td>";
                echo "<td>{$row['order_client']}</td>";
                echo "<td>{$row['order_id']}</td>";
                echo "<td>{$row['order_name']}</td>";
                echo "<td>{$row['order_type']}</td>";
                echo "<td>{$row['order_volume']}</td>";
                echo "<td>{$row['order_end']}</td>";
                echo "<td>
                <form action='javascript:dele({$row['id']})' method='post' id='{$row['order_id']}'>
                </form>
                <form action='order-edit.php?id={$row['order_id']}' method='post' id='edit{$i}'>
                </form>

                <div class='btn-group btn-group-sm' role='group' aria-label='Table row actions'>
                <button form='edit{$i}' type='submit' class='btn btn-white' data-toggle='modal' data-target='#lee'>
                <i class='material-icons'>&#xE254;</i>
                </button>
                <button form='{$row['order_id']}' type='submit' class='btn btn-white'>
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
  <?php include('script.php') ?>
</body>
</html>
