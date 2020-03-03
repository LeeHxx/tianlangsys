<?php
require_once('session.php');
session_start();?>
<!DOCTYPE html>
<html class="no-js h-100" lang="zh-CN">
<head>
  <?php include('head.php') ?>
  <script type="text/javascript">
  function usable (id) {
    $.post("usable.php?id="+id,function(data){
      if($.trim(data)=='yes'){

        window.location.href='user.php';
        return true;
      }else{

        window.location.href='user.php';
        return false;
      }
    },"text");
  };
  function dele(id) {
    if(confirm("确认删除吗？")){
    $.post("user-del_check.php?id="+id,function(data){
      if($.trim(data)=='yes'){
        alert("删除成功！")
        window.location.href='user.php';
        return true;
      }else{
        alert("该条记录无法删除 ！")
        window.location.href='user.php';
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
      <!-- 侧栏 -->
      <?php include('sidebar.php') ?>
      <!-- End 侧栏 -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- 顶栏 -->
          <?php include('navbar.php') ?>
        </div>
        <!-- Page -->
        <div class="main-content-container container-fluid px-4 mb-4">

          <!-- Page Header End Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">user</span>
              <h3 class="page-title">用户管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="welcome.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回主页 </a>
              </div>
            </div>
          </div>


          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer" style="overflow:auto; ">
            <div class="dataTables_length">
              <h6 class="m-0">用户列表</h6>
            </div>

            <table class="file-manager-list d-none table-responsive dataTable  " id="DataTables_Table_0">
              <thead>

                <tr>
                  <th style="width: 7.8px;"  rowspan="1" colspan="1"></th>
                  <th class="text-left" rowspan="1" colspan="1" style="width: 382.8px;">用户名</th>
                  <th class="" rowspan="1" colspan="1" style="width: 106.8px;" >用户类型</th>
                  <th class="" rowspan="1" colspan="1" style="width: 123.8px;" >状态</th>
                  <th class="text-right " rowspan="1" colspan="1" style="width: 175.8px; ">操作</th>
                </tr>
              </thead>
              <tbody>


                <?php
                require_once('conn.php');
                $sql1="select * from user where admin=1";
                $sql0="select * from user where admin=0";
                $result1=mysqli_query($conn,$sql1);
                $result0=mysqli_query($conn,$sql0);
                $loginNum1=mysqli_num_rows($result1);
                $loginNum0=mysqli_num_rows($result0);
                for($i=0; $i<$loginNum1; $i++){
                  $row1 = mysqli_fetch_assoc($result1);
                  echo "<tr>";
                  echo "
                  <td class='file-manager__item-icon'>
                  <div>
                  <i class='material-icons'>person</i>
                  </div>
                  </td>";
                  echo "
                  <td class='text-left'>
                  <h5 class='file-manager__item-title'>{$row1['user_name']}</h5>
                  <span class='file-manager__item-meta'>Last opened 2 weeks ago.</span>
                  </td>";
                  echo "<td>{$row1['job']}</td>";
                  echo "
                  <td>
                  <div class='d-table mx-auto'>
                  <span class='badge badge-pill badge-success'>可用</span>
                  </div>
                  </td>";
                  echo "
                  <td class='file-manager__item-actions' >
                  <div class='btn-group btn-group-sm d-flex' role='group'>
                  <button type='button' class='btn btn-white active-light'>管理</button>
                  <button type='submit' class='btn btn-white' disabled>禁用</button>
                  <button type='button' class='btn btn-white' disabled>删除</button>
                  </div>
                  </td>";
                  echo "</tr>";
                };


                for($i=0; $i<$loginNum0; $i++){
                  $row0 = mysqli_fetch_assoc($result0);
                  echo "<tr>";
                  echo "
                  <td class='file-manager__item-icon'>
                  <div>
                  <i class='material-icons'>person</i>
                  </div>
                  </td>";
                  echo "
                  <td class='text-left'>
                  <h5 class='file-manager__item-title'>{$row0['user_name']}</h5>
                  <span class='file-manager__item-meta'>Last opened 2 weeks ago.</span>
                  </td>";
                  echo "<td>{$row0['job']}</td>";
                  if ($row0['usable']==1) {
                    echo "
                    <td>
                    <div class='d-table mx-auto'>
                    <span class='badge badge-pill badge-success'>可用</span>
                    </div>
                    </td>";
                    echo "
                    <td class='file-manager__item-actions' >
                    <form action='javascript:usable({$row0['user_id']})' method='post' id='u{$i}'>
                    </form>
                    <form action='user-edit.php?id={$row0['user_id']}' method='post' id='e{$i}'>
                    </form>
                    <form action='javascript:dele({$row0['user_id']})' method='post' id='d{$i}'>
                    </form>
                    <div class='btn-group btn-group-sm d-flex' role='group'>

                    <button form='e{$i}' type='submit' class='btn btn-white active-light'>管理</button>

                    <button form='u{$i}' type='submit' class='btn btn-white active-light'>停用</button>

                    <button form='d{$i}' type='submit' class='btn btn-danger'>删除</button>

                    </div>
                    </td>";
                  }else{
                    echo "
                    <td>
                    <div class='d-table mx-auto'>
                    <span class='badge badge-pill badge-warning'>停用</span>
                    </div>
                    </td>";
                    echo "
                    <td class='file-manager__item-actions' >
                    <form action='javascript:usable({$row0['user_id']})' method='post' id='u{$i}'>
                    </form>
                    <form action='javascript:dele({$row0['user_id']})' method='post' id='d{$i}'>
                    </form>
                    <div class='btn-group btn-group-sm d-flex' role='group'>
                    <button type='button' class='btn btn-white active-light'>管理</button>
                    <button form='u{$i}' type='submit' class='btn btn-white active-light'>启用</button>
                    <button form='d{$i}' type='submit' class='btn btn-danger'>删除</button>
                    </div>
                    </td>";
                  }
                  echo "</tr>";
                }
                mysqli_free_result($result0);
                mysqli_free_result($result1);
                mysqli_close($conn);
                ?>


              </tbody>
            </table>
            <div class="dataTables_paginate" id="DataTables_Table_0_paginate">
            </div>
          </div>

        </div>
        <!--  End Page -->
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
