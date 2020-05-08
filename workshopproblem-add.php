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
    var problem_id=$("#problem_id").val();
    if(problem_id==""){
      $("#problem_id").focus();
      return false;
    }
  });
  $("#btn2").click(function(){
    var feedback_date=$("#feedback_date").val();
    var feedback=$("#feedback").val();
    var problem_type=$("#problem_type").val();
    var problem_description=$("#problem_description").val();
    var solving_time=$("#solving_time").val();
    var solution=$("#solution").val();
    var problem_responsible=$("#problem_responsible").val();
    if(feedback_date==""){
      $("#feedback_date").focus();
      return false;
    }else if(feedback==""){
      $("#feedback").focus();
      return false;
    }else if(problem_type==""){
      $("#problem_type").focus();
      return false;
    }else if(problem_description==""){
      $("#problem_description").focus();
      return false;
    }else if(solving_time==""){
      $("#solving_time").focus();
      return false;
    }else if(solution==""){
      $("#solution").focus();
      return false;
    }else if(problem_responsible==""){
      $("#problem_responsible").focus();
      return false;
    }

  });
  $('.datepicker').datepicker({
    format: "yyyy-mm-dd",
    orientation:" auto",
  });

  $('#problemtable').DataTable( {
    responsive: !0,
    searching: false,
    // ordering: false,
    // info:false,
    paging: false,
    language: {
      "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
      "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
      "sEmptyTable": "订单暂无问题反馈记录"
    }
  });
});
function dele(id) {
  if(confirm("确认删除吗？")){
  $.post("workshopproblem-del_check.php?id="+id,function(data){
    if($.trim(data)=='yes'){
      alert("删除成功！")
      window.location.href='workshopproblem-add.php';
      return true;
    }else{
      alert("该条记录无法删除 ！")
      window.location.href='workshopproblem-add.php';
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
              <span class="text-uppercase page-subtitle">problem</span>
              <h3 class="page-title">问题反馈记录单</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="workshopproblem-search.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
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

                    <h5 class="modal-title col text-center" id="gridModalLabel">问题反馈记录单</h5>
                    <!-- Close -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <!-- body  -->
                  <div class="card-body p-0">
                    <form action="workshopproblem-add_check.php" class="py-4" id="problem_add0" method="post">


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
                        <div class="col-lg-8">
                          <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="feedback_date">反馈日期</label>
                            <div class="input-group with-addon-icon-left" >
                            <input class="form-control" data-provide="datepicker" name="feedback_date" id="feedback_date" value="" placeholder="反馈日期">
                            <span class="input-group-append">
                              <span class="input-group-text">
                                  <i class="fa fa-calendar"></i>
                              </span>
                            </span>
                            </div>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="feedback">反馈者</label>
                            <input type="text" class="form-control" name="feedback" id="feedback" value="" placeholder="反馈者">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="problem_type">问题类型</label>
                            <select class="custom-select" name="problem_type" id="problem_type" value="" placeholder="问题类型">
                              <option value="" selected="">请选择...</option>
                              <option value="图纸标注不清">1.图纸标注不清</option>
                              <option value="图物不符">2.图物不符</option>
                              <option value="器件问题">3.器件问题</option>
                              <option value="PCB板问题">4.PCB板问题</option>
                            </select>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="solving_time">要求解决时间</label>
                            <div class="input-group with-addon-icon-left" >
                              <input class="form-control" data-provide="datepicker" name="solving_time" id="solving_time" placeholder="要求解决时间">
                              <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar"></i>
                                </span>
                              </span>
                            </div>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="solution">解决措施</label>
                            <input type="text" class="form-control" name="solution" id="solution" value="" placeholder="解决措施">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="problem_responsible">相关责任人</label>
                            <input type="text" class="form-control" name="problem_responsible" id="problem_responsible" value="" placeholder="相关责任人">
                          </div>
                        </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="problem_description">问题描述</label>
                            <textarea class="form-control" name="problem_description" id="problem_description" value="" placeholder="问题描述" rows="5"></textarea>
                          </div>
                          </div>
                        </div>

                      </div>

                    </form>
                  </div>
                  <div class="card-footer border-top ">
                    <div class="col">
                      <button id="btn2" form="problem_add0" class="btn  btn-accent mx-auto d-table mr-3"><i class="fa fa-check mr-1"></i>确定</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-lg-5 mx-auto">
              <div class="card mb-4" style="border-radius: 2rem;">
                <form action="workshopproblem-search_check.php" class="main-navbar__search w-100 " id="problem_add" method="post">
                  <div class="input-group input-group-seamless ">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-search ml-2 "></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control ml-3" name="problem_id" id="problem_id" style="height:50px; border-radius:25px;" type="text" placeholder="请输入订单号..." value="<?php echo $_SESSION['order_id'] ?>" aria-label="Search">
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="dataTables_length" id="addtable_length">
            <div class="">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="#" data-toggle="modal" data-target="#modaladdnew" class="btn btn-primary "><i class="fa fa-plus mr-1"></i> 新增问题反馈记录单 </a>
              </div>
            </div>
          </div>

          <table id="problemtable">
            <thead>
			        <tr>
                <th>订单号</th>
                <th>品名</th>
                <th>规格/型号/图号</th>
                <th>订单量</th>
                <th>反馈日期</th>
                <th>反馈者</th>
                <th>问题类型</th>
                <th>问题描述</th>
                <th>要求解决时间</th>
                <th>解决措施</th>
                <th>相关责任人</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>

              <?php
              require_once('conn.php');
              $sql="select * from problem where order_id='$id'";
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
                echo "<td>{$row['feedback_date']}</td>";
                echo "<td>{$row['feedback']}</td>";
                echo "<td>{$row['problem_type']}</td>";
				        echo "<td>{$row['problem_description']}</td>";
	        			echo "<td>{$row['solving_time']}</td>";
	        			echo "<td>{$row['solution']}</td>";
		        		echo "<td>{$row['problem_responsible']}</td>";
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
                          <form action='workshopproblem-edit_check.php?+id={$row['id']}' class='py-2' id='problem_edit{$i}' method='post'>


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
                              <div class='col-lg-8'>
                                <div class='form-row'>
                                <div class='form-group col-md-4'>
                                  <label for='feedback_date'>反馈日期</label>
                                  <div class='input-group with-addon-icon-left' >
                                  <input type='date' class='form-control' data-provide='datepicker' name='feedback_date' id='feedback_date' value='{$row['feedback_date']}' placeholder='反馈日期'>
                                  <span class='input-group-append'>
                                    <span class='input-group-text'>
                                        <i class='fa fa-calendar'></i>
                                    </span>
                                  </span>
                                  </div>
                                </div>
                                <div class='form-group col-md-4'>
                                  <label for='feedback'>反馈者</label>
                                  <input type='text' class='form-control' name='feedback' id='feedback' value='{$row['feedback']}' placeholder='反馈者'>
                                </div>
                                <div class='form-group col-md-4'>
                                  <label for='problem_type'>问题类型</label>
                                  <select class='custom-select' name='problem_type' id='problem_type' value='{$row['problem_type']}' placeholder='问题类型'>
                                    <option value='' selected=''>请选择...</option>
                                    <option value='图纸标注不清' >1.图纸标注不清</option>
                                    <option value='图物不符' >2.图物不符</option>
                                    <option value='器件问题' >3.器件问题</option>
                                    <option value='PCB板问题' >4.PCB板问题</option>
                                  </select>
                                </div>

                                <div class='form-group col-md-4'>
                                  <label for='solving_time'>要求解决时间</label>
                                  <div class='input-group with-addon-icon-left' >
                                    <input type='date' class='form-control' data-provide='datepicker' name='solving_time' id='solving_time' value='{$row['solving_time']}' placeholder='要求解决时间'>
                                    <span class='input-group-append'>
                                      <span class='input-group-text'>
                                          <i class='fa fa-calendar'></i>
                                      </span>
                                    </span>
                                  </div>
                                </div>
                                <div class='form-group col-md-4'>
                                  <label for='solution'>解决措施</label>
                                  <input type='text' class='form-control' name='solution' id='solution' value='{$row['solution']}' placeholder='解决措施'>
                                </div>
                                <div class='form-group col-md-4'>
                                  <label for='problem_responsible'>相关责任人</label>
                                  <input type='text' class='form-control' name='problem_responsible' id='problem_responsible' value='{$row['problem_responsible']}' placeholder='相关责任人'>
                                </div>
                              </div>
                              </div>
                              <div class='col-lg-4'>
                                <div class='form-row'>
                                <div class='form-group col-md-12'>
                                  <label for='problem_description'>问题描述</label>
                                  <textarea class='form-control' name='problem_description' id='problem_description' placeholder='问题描述' rows='5'>{$row['problem_description']}</textarea>
                                </div>
                                </div>
                              </div>

                            </div>

                          </form>
                        </div>
                        <div class='card-footer border-top '>
                          <div class='col'>
                            <button id='btn2' form='problem_edit{$i}' class='btn  btn-accent mx-auto d-table mr-3'><i class='fa fa-check mr-1'></i>确定</button>
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
