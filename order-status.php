<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
  <script type="text/javascript">
  $(document).ready(function(){

    $('#ordertable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "表中数据为空"
      }
    } );
    $('#matable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "暂未填写物料信息"
      }
    } );
    $('#processtable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "此订单暂无工艺信息"
      }
    } );
    $('#waretable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "暂无仓库信息"
      }
    } );
    $('#semitable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "该订单暂无半成品库存信息"
      }
    } );
    $('#smtable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "该订单暂无SMT生产信息"
      }
    } );

    $('#diptable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "该订单暂无DIP生产信息"
      }
    } );

    $('#qualitytable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "该订单暂无质量信息"
      }
    } );

    $('#productable').DataTable( {
      responsive: !0,
      searching: false,
      // ordering: false,
      info:false,
      paging: false,
      language: {
        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
        "sEmptyTable": "该订单暂无成品信息"
      }
    } );
  });

  </script>
</head>
<body class="h-100">
  <div class="tl-loader">
    <div class="spinner-border" style="width:50px;height:50px;margin:auto;position:absolute;top:0;bottom:0;left:0;right:0;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <?php
  session_start();
  require_once('conn.php');
  $order_id = $_GET['id'];
  $sql="select * from orders where order_id='$order_id' ";
  $sql_material="select * from material where order_id='$order_id' ";
  $sql_process="select * from process where order_id='$order_id' ";
  $sql_warehouse="select * from warehouse where order_id='$order_id' ";
  $sql_semi="select * from semi where order_id='$order_id' ";
  $sql_smt="select * from smt where order_id='$order_id' ";
  $sql_quality="select * from quality where order_id='$order_id' ";
  $sql_product="select * from product where order_id='$order_id' ";
  $result_material=mysqli_query($conn,$sql_material);
  $result_process=mysqli_query($conn,$sql_process);
  $result_warehouse=mysqli_query($conn,$sql_warehouse);
  $result_semi=mysqli_query($conn,$sql_semi);
  $result_smt=mysqli_query($conn,$sql_smt);
  $result_quality=mysqli_query($conn,$sql_quality);
  $result_product=mysqli_query($conn,$sql_product);
  $result=mysqli_query($conn,$sql);
  $num_material=mysqli_num_rows($result_material);
  $num_warehouse=mysqli_num_rows($result_warehouse);
  $num_smt=mysqli_num_rows($result_smt);
  $num_quality=mysqli_num_rows($result_quality);
  $num_product=mysqli_num_rows($result_product);
  $row = mysqli_fetch_assoc($result);
  // $row_material = mysqli_fetch_assoc($result_material);
  // $row_warehouse = mysqli_fetch_assoc($result_warehouse);
  // $row_smt = mysqli_fetch_assoc($result_smt);
  // $row_quality = mysqli_fetch_assoc($result_quality);
  // $row_product = mysqli_fetch_assoc($result_product);
  // mysqli_close($conn);

  ?>

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
              <h3 class="page-title">订单 <?php echo $order_id;?> </h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="order.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>
          </div>
          <!-- End Page Header -->

<?php if($row['order_finished']=='0'){?>
          <div class="order__countdown">
            <h3>距离交货日期还有</h3>
            <h2>
              <span class=" " data-countdown="<?php echo $row['order_end']; ?>"></span>
            </h2>
          </div>
<?php }else {?>
  <div class="order__countdown">
    <h3>订单已完成</h3>
  </div>
  <?php }?>

          <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 col-sm-11">

              <div class="horizontal-steps mt-4 mb-4 pb-5">
                <div class="horizontal-steps-content">
                  <div class="step-item" id="no1">
                    <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $row['order_start']; ?> 接单">下达订单</span>
                  </div>
                  <div class="step-item" id="no2">
                    <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="21/08/2018 11:32 AM">物料来料 <br> 工艺确认</span>
                  </div>
                  <div class="step-item" id="no3">
                    <span>仓库确认</span>
                  </div>
                  <div class="step-item" id="no4">
                    <span>生产作业</span>
                  </div>
                  <div class="step-item" id="no5">
                    <span>质量确认</span>
                  </div>
                  <div class="step-item" id="no6">
                    <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo $row['order_end']; ?> 交货">成品出库</span>
                  </div>
                </div>

                <div class="process-line" id="processline"></div>
              </div>
            </div>
          </div>

          <?php if($num_product>0){
            echo "<script>$('#no6').addClass('current');$('#processline').attr('style','width: 99%;');</script>";
          }elseif ($num_quality>0) {
            echo "<script>$('#no5').addClass('current');$('#processline').attr('style','width: 80%;');</script>";
          }elseif ($num_smt>0) {
            echo "<script>$('#no4').addClass('current');$('#processline').attr('style','width: 60%;');</script>";
          }elseif ($num_warehouse>0) {
            echo "<script>$('#no3').addClass('current');$('#processline').attr('style','width: 40%;');</script>";
          }elseif ($num_material>0) {
            echo "<script>$('#no2').addClass('current');$('#processline').attr('style','width: 20%;');</script>";
          }else{
            echo "<script>$('#no1').addClass('current');$('#processline').attr('style','width: 0%;');</script>";} ?>







            <!-- Order Table -->
            <div class="dataTables_length" id="table_length">
              <h6 class="m-0">订单基本信息</h6>
            </div>
            <table id="ordertable">
              <thead>
                <tr>

                  <th>接单日期</th>
                  <th>客户</th>
                  <th>订单号</th>
                  <th>品名</th>
                  <th>规格/型号/图号</th>
                  <th>订单量</th>
                  <th>交货日期</th>
                  <!-- <th>操作</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                // while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><strong>{$row['order_start']}</strong></td>";
                echo "<td><strong>{$row['order_client']}</strong></td>";
                echo "<td><strong>{$row['order_id']}</strong></td>";
                echo "<td><strong>{$row['order_name']}</strong></td>";
                echo "<td><strong>{$row['order_type']}</strong></td>";
                echo "<td><strong>{$row['order_volume']}</strong></td>";
                echo "<td><strong>{$row['order_end']}</strong></td>";
                echo "</tr>";
                // }
                mysqli_free_result($result);
                ?>

              </tbody>
            </table>

            <!-- materialTable -->
            <div class="mt-4">
              <div class="dataTables_length" id="table_length">
                <h6 class="m-0">物料信息</h6>
              </div>
              <table id="matable">
                <thead>
                  <tr>
                    <th>来料日期</th>
                    <th>数量</th>
                    <th>品种</th>
                    <th>合格/NG</th>
                    <th>齐套状态</th>
                    <th>物管员</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  while ($row_material = mysqli_fetch_assoc($result_material)) {
                    echo "<tr>";
                    echo "<td><strong>{$row_material['material_come']}</strong></td>";
                    echo "<td><strong>{$row_material['material_volume']}</strong></td>";
                    echo "<td><strong>{$row_material['material_type']}</strong></td>";
                    if ($row_material['material_okng']=='合格') {
                      echo "<td><span class='badge badge-pill badge-success'>{$row_material['material_okng']}</span></td>";
                    }else {
                      echo "<td><span class='badge badge-pill badge-danger'>{$row_material['material_okng']}</span></td>";
                    }
                    echo "<td><strong>{$row_material['material_kitting']}</strong></td>";
                    echo "<td><strong>{$row_material['material_admin']}</strong></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result_material);
                  ?>
                </tbody>
              </table>
            </div>



            <!-- processTable -->
            <div class="mt-4">
              <div class="dataTables_length" id="table_length">
                <h6 class="m-0">工艺信息</h6>
              </div>
              <table id="processtable">
                <thead>
                  <tr>
                    <th>BOM版本</th>
                    <th>网板号</th>
                    <th>工装</th>
                    <th>人力配置</th>
                    <th>确认日期</th>
                    <th>确认者</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row_process = mysqli_fetch_assoc($result_process)) {
                    echo "<tr>";
                    echo "<td><strong>{$row_process['bom']}</strong></td>";
                    echo "<td><strong>{$row_process['stencil']}</strong></td>";
                    echo "<td><strong>{$row_process['tooling']}</strong></td>";
                    echo "<td><strong>{$row_process['personal_allocation']}</strong></td>";
                    echo "<td><strong>{$row_process['process_confirmation_data']}</strong></td>";
                    echo "<td><strong>{$row_process['process_confirmor']}</strong></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result_process);
                  ?>
                </tbody>
              </table>
            </div>



            <!-- warehouseTable -->
            <div class="mt-4">
              <div class="dataTables_length" id="table_length">
                <h6 class="m-0">仓库信息</h6>
              </div>
              <table id="waretable">
                <thead>
                  <tr>
                    <th>存放货位号</th>
                    <th>是否齐套</th>
                    <th>有无预处理</th>
                    <th>库管员</th>
                    <th>转序部门</th>
                    <th>转序量</th>
                    <th>转序日期</th>
                    <th>转序班组</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row_warehouse = mysqli_fetch_assoc($result_warehouse)) {
                    echo "<tr>";
                    echo "<td><strong>{$row_warehouse['warehouse_place']}</strong></td>";
                    echo "<td><strong>{$row_warehouse['warehouse_kitting']}</strong></td>";
                    echo "<td><strong>{$row_warehouse['warehouse_preprocessing']}</strong></td>";
                    echo "<td><strong>{$row_warehouse['warehouse_keeper']}</strong></td>";
                    echo "<td><strong>{$row_warehouse['warehouse_turn_department']}</strong></td>";
                    echo "<td><strong>{$row_warehouse['warehouse_turn_volume']}</strong></td>";
                    echo "<td><strong>{$row_warehouse['warehouse_turn_date']}</strong></td>";
                    echo "<td><strong>{$row_warehouse['warehouse_turn_group']}</strong></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result_warehouse);
                  ?>
                </tbody>
              </table>
            </div>



            <!-- semiTable -->
            <div class="mt-4">
              <div class="dataTables_length" id="table_length">
                <h6 class="m-0">半成品信息</h6>
              </div>
              <table id="semitable">
                <thead>
                  <tr>
                    <th>入库日期</th>
                    <th>存放货位号</th>
                    <th>领取时间</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row_semi = mysqli_fetch_assoc($result_semi)) {
                    echo "<tr>";
                    echo "<td><strong>{$row_semi['semi_income']}</strong></td>";
                    echo "<td><strong>{$row_semi['semi_place']}</strong></td>";
                    echo "<td><strong>{$row_semi['semi_receive']}</strong></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result_semi);
                  ?>
                </tbody>
              </table>
            </div>


            <!-- smtTable -->
            <div class="mt-4">
              <div class="dataTables_length" id="table_length">
                <h6 class="m-0">SMT</h6>
              </div>
              <table id="smtable">
                <thead>
                  <tr>
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
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row_smt = mysqli_fetch_assoc($result_smt)) {
                    echo "<tr>";
                    echo "<td><strong>{$row_smt['smt_get']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_readiness']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_line']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_classes']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_first_start']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_first_end']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_first_opertor']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_batch_completion']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_batch_end']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_opertor']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_turn_department']}</strong></td>";
                    echo "<td><strong>{$row_smt['smt_turn_volume']}</strong></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result_smt);
                  ?>
                </tbody>
              </table>
            </div>



            <!-- qualityTable -->
            <div class="mt-4">
              <div class="dataTables_length" id="table_length">
                <h6 class="m-0">质检信息</h6>
              </div>
              <table id="qualitytable">
                <thead>
                  <tr>
                    <th>首件送检日期</th>
                    <th>首件送检者</th>
                    <th>首件确认</th>
                    <th>批次送检日期</th>
                    <th>送检者</th>
                    <th>合格数</th>
                    <th>NG数</th>
                    <th>检验确认</th>
                    <th>检验确认日期</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row_quality = mysqli_fetch_assoc($result_quality)) {
                    echo "<tr>";
                    echo "<td><strong>{$row_quality['quality_first_date']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_first_inspection']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_first_confirm']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_batch_inspect']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_inspection']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_OK_volume']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_NG_volume']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_inspection_confirm']}</strong></td>";
                    echo "<td><strong>{$row_quality['quality_inspection_date']}</strong></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result_quality);
                  ?>
                </tbody>
              </table>
            </div>



            <!-- qualityTable -->
            <div class="mt-4">
              <div class="dataTables_length" id="table_length">
                <h6 class="m-0">成品信息</h6>
              </div>
              <table id="productable">
                <thead>
                  <tr>
                    <th>接料日期</th>
                    <th>接收者</th>
                    <th>包装日期</th>
                    <th>包装者</th>
                    <th>包装数量</th>
                    <th>出库日期</th>
                    <th>出库量</th>
                    <th>发货者</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row_product = mysqli_fetch_assoc($result_product)) {
                    echo "<tr>";
                    echo "<td><strong>{$row_product['product_receive_date']}</strong></td>";
                    echo "<td><strong>{$row_product['product_receiver']}</strong></td>";
                    echo "<td><strong>{$row_product['product_pack_date']}</strong></td>";
                    echo "<td><strong>{$row_product['product_packer']}</strong></td>";
                    echo "<td><strong>{$row_product['product_pack_volume']}</strong></td>";
                    echo "<td><strong>{$row_product['product_deliver']}</strong></td>";
                    echo "<td><strong>{$row_product['product_deliver_volume']}</strong></td>";
                    echo "<td><strong>{$row_product['product_shipper']}</strong></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($result_product);
                  mysqli_close($conn);
                  ?>
                </tbody>
              </table>
            </div>



          </div>
          <!-- end Page -->
        </main>
      </div>
    </div>
    <?php include('script.php') ?>
    <script>
        $('[data-countdown]').each(function(){
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D 天 %H:%M:%S'));
            });
        })

    </script>
  </body>
  </html>
