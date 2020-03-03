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

          <!--  Table -->
          <div class="row">
            <div class="col-lg-10 mx-auto ">
              <div class="card card-small  h-100">
                <div class="card-header border-bottom">
                  <h6 class="m-0">账户列表</h6>
                  <div class="block-handle"></div>
                </div>
                <div class="card-body p-0">

                  <div class="container-fluid px-0">

                    <table class="table mb-0 lo-stats">
                      <thead class="py-2 bg-light text-semibold border-bottom">
                        <tr>
                          <th></th>
                          <th>用户名</th>
                          <th class="text-center">状态</th>
                          <th class="text-right"></th>
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
                          echo "<td class='lo-stats__image'>
                          <img class='border rounded' src='images/avatars/admin.png'>
                          </td>";
                          echo "<td class='lo-stats__order-details'>
                          <span>#{$row1['user_name']}</span>
                          <span>21 February 2018 20:32</span>
                          </td>";
                          echo "<td class='lo-stats__status'>
                          <div class='d-table mx-auto'>
                          <span class='badge badge-pill badge-success'>可用</span>
                          </div>
                          </td>";
                          echo "<td class='lo-stats__actions'>
                          <div class='btn-group d-table ml-auto' role='group' aria-label='Basic example'>

                          <button type='button' class='btn btn-sm btn-white'>管理</button>

                          <button type='submit' class='btn btn-sm btn-white' disabled>禁用</button>

                          <button type='button' class='btn btn-sm btn-white' disabled>删除</button>

                          </div>
                          </td>";
                          echo "</tr>";
                        };


                        for($i=0; $i<$loginNum0; $i++){
                          $row0 = mysqli_fetch_assoc($result0);
                          echo "<tr>";
                          echo "<td class='lo-stats__image'>
                          <img class='border rounded' src='images/avatars/admin.png'>
                          </td>";
                          echo "<td class='lo-stats__order-details'>
                          <span>#{$row0['user_name']}</span>
                          <span>21 February 2018 20:32</span>
                          </td>";
                          if ($row0['usable']==1) {
                            echo "<td class='lo-stats__status'>
                            <div class='d-table mx-auto'>
                            <span class='badge badge-pill badge-success'>可用</span>
                            </div>
                            </td>";
                            echo "<td class='lo-stats__actions'>
                            <form action='javascript:usable({$row0['user_id']})' method='post' id='u{$i}'>
                            </form>
                            <form action='user-edit.php?id={$row0['user_id']}' method='post' id='e{$i}'>
                            </form>
                            <div class='btn-group d-table ml-auto' role='group' aria-label='Basic example'>

                            <button form='e{$i}' type='submit' class='btn btn-sm btn-white'>管理</button>

                            <button form='u{$i}' type='submit' class='btn btn-sm btn-white'>停用</button>

                            <button type='button' class='btn btn-sm btn-danger'>删除</button>

                            </div>
                            </td>";
                          }else{
                            echo "<td class='lo-stats__status'>
                            <div class='d-table mx-auto'>
                            <span class='badge badge-pill badge-warning'>停用</span>
                            </div>
                            </td>";
                            echo "<td class='lo-stats__actions'>
                            <form action='javascript:usable({$row0['user_id']})' method='post' id='u{$i}'>
                            </form>
                            <div class='btn-group d-table ml-auto' role='group' aria-label='Basic example'>
                            <button type='button' class='btn btn-sm btn-white'>管理</button>
                            <button form='u{$i}' type='submit' class='btn btn-sm btn-white'>启用</button>
                            <button type='button' class='btn btn-sm btn-danger'>删除</button>
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
                  </div>
                </div>
                <div class="card-footer border-top">
                  <div class="row">
                    <div class="col text-right view-report">
                      <a href="order.php">返回主页 &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End table -->
        </div>
        <!--  End Page -->
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
