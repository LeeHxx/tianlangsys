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
  <?php
  session_start();
  require_once('conn.php');
  $id = $_GET['id'];
  $sql="select * from user where user_id=$id";
  $result=mysqli_query($conn,$sql);
  $sql_arr = mysqli_fetch_assoc($result);
  ?>
  <div class="container-fluid">
    <div class="row">
      <!-- 侧栏 -->
      <?php include('sidebar.php') ?>
      <!-- End -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- 顶栏 -->
          <?php include('navbar.php') ?>
          <!-- End -->
        </div>
        <!-- Page -->

        <div class="main-content-container container-fluid px-4">

          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-4 mb-sm-0">
              <span class="text-uppercase page-subtitle">user</span>
              <h3 class="page-title">用户信息管理</h3>
            </div>
            <div class="col-12 col-sm-6 d-flex align-items-center">
              <div class="d-inline-flex mb-sm-0 mx-auto ml-sm-auto mr-sm-0" role="group" aria-label="Page actions">
                <a id="add-new-event" href="user.php" class="btn btn-outline-primary btn-pill"><i class="fa fa-arrow-left mr-1"></i> 返回 </a>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12 mx-auto">
              <!-- Edit User Details -->
              <div class="card card-small edit-user-details mb-4">
                <div class="card-header p-0">
                </div>
                <div class="card-body p-0">
                  <form action="user-edit_check.php?id=<?php echo $sql_arr['user_id'] ?>" class="py-4" id="user_save" method="post">
                    <div class="form-row mx-4">
                      <div class="col mb-3">
                        <h5 class="form-text m-0">基本信息</h5>
                        <p class="form-text text-muted m-0">Setup your general profile details.</p>
                      </div>
                    </div>
                    <div class="form-row mx-4">
                      <div class="col-lg-8">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="firstName">用户名</label>
                            <div class="input-group input-group-seamless">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="material-icons">person</i>
                                </div>
                              </div>
                              <input type="text" class="form-control" id="firstName" name="user_name" value="<?php echo $sql_arr['user_name'] ?>">
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="displayEmail">所属职位部门</label>
                            <div class="input-group ">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="material-icons">sort</i>
                                </div>
                              </div>
                            <select class="custom-select" name="job">
                              <option value="">请选择...</option>
                              <option value="总经理" <?php  if($sql_arr['job']=='总经理'){?>selected <?php }?>>总经理</option>
                              <option value="生产主管" <?php  if($sql_arr['job']=='生产主管'){?>selected <?php }?>>生产主管</option>
                              <option value="计划主管" <?php  if($sql_arr['job']=='计划主管'){?>selected <?php }?>>计划主管</option>
                              <option value="物料管理" <?php  if($sql_arr['job']=='物料管理'){?>selected <?php }?>>物料管理</option>
                              <option value="工艺管理" <?php  if($sql_arr['job']=='工艺管理'){?>selected <?php }?>>工艺管理</option>
                              <option value="仓库管理" <?php  if($sql_arr['job']=='仓库管理'){?>selected <?php }?>>仓库管理</option>
                              <option value="生产制造管理" <?php  if($sql_arr['job']=='生产制造管理'){?>selected <?php }?>>生产制造管理</option>
                              <option value="成品管理" <?php  if($sql_arr['job']=='成品管理'){?>selected <?php }?>>成品管理</option>
                            </select>
                          </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="phoneNumber">手机号码</label>
                            <div class="input-group input-group-seamless">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="material-icons">&#xE0CD;</i>
                                </div>
                              </div>
                              <input type="text" class="form-control" id="phoneNumber" name="tel" value="<?php echo $sql_arr['tel'] ?>">
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="emailAddress">电子邮箱</label>
                            <div class="input-group input-group-seamless">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="material-icons">&#xE0BE;</i>
                                </div>
                              </div>
                              <input type="email" class="form-control" id="emailAddress" name="email">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-row mx-4">
                      <div class="col mb-3">
                        <h5 class="form-text m-0">修改密码</h5>
                        <p class="form-text text-muted m-0">Change your current password.</p>
                      </div>
                    </div>
                    <div class="form-row mx-4">
                      <div class="col-lg-8 ">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="firstName">旧密码</label>
                            <input type="text" class="form-control" id="firstName"  value="<?php echo $sql_arr['user_password']?>" readonly="readonly">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="lastName">新密码</label>
                            <input type="text" class="form-control" id="lastName" value="<?php echo $sql_arr['user_password']?>" name="user_password" placeholder="新密码">
                          </div>
                        </div>
                      </div>

                    </div>
                    <hr>
                    <div class="form-row mx-4">
                      <div class="col mb-3">
                        <h5 class="form-text m-0">权限管理</h5>
                        <p class="form-text text-muted m-0">Authority management</p>
                      </div>
                    </div>

                    <div class="form-row mx-4">
                      <label for="orders" class="col col-form-label"> <a style="font-size:15px;">订单管理</a> <small class="form-text text-muted" style="color:#C0C0C0;"> 可以对订单进行增加修改删除操作的权限</small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="hidden" name="orders" value="0">
                          <input type="checkbox" id="orders" name="orders" value="1" class="custom-control-input" <?php if($sql_arr['orders']=='1'){?>checked <?php }?>>
                          <label class="custom-control-label" for="orders"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="material" class="col col-form-label"> <a style="font-size:15px;">物料管理</a> <small class="form-text text-muted"> 对物料信息增加删除修改的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="hidden" name="material" value="0">
                          <input type="checkbox" id="material" name="material" value="1" class="custom-control-input" <?php if($sql_arr['material']=='1'){?>checked <?php }?>>
                          <label class="custom-control-label" for="material"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="process" class="col col-form-label"> <a style="font-size:15px;">工艺管理</a> <small class="form-text text-muted"> 对工艺信息增加删除修改的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="hidden" name="process" value="0">
                          <input type="checkbox" id="process" name="process" value="1" class="custom-control-input" <?php if($sql_arr['process']=='1'){?>checked <?php }?>>
                          <label class="custom-control-label" for="process"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="warehouse" class="col col-form-label"><a style="font-size:15px;">仓库管理</a>  <small class="form-text text-muted"> 对仓库信息增加删除修改的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="hidden" name="warehouse" value="0">
                          <input type="checkbox" id="warehouse" name="warehouse" value="1" class="custom-control-input" <?php if($sql_arr['warehouse']=='1'){?>checked <?php }?>>
                          <label class="custom-control-label" for="warehouse"></label>
                        </div>
                      </div>
                    </div>

                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="making" class="col col-form-label"><a style="font-size:15px;">生产制造管理</a>  <small class="form-text text-muted"> 对生产制造流程管理的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="hidden" name="making" value="0">
                          <input type="checkbox" id="making" name="making" value="1" class="custom-control-input" <?php if($sql_arr['making']=='1'){?>checked <?php }?>>
                          <label class="custom-control-label" for="making"></label>
                        </div>
                      </div>
                    </div>
                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="quality" class="col col-form-label"><a style="font-size:15px;">质量管理</a>  <small class="form-text text-muted"> 对质量信息管理的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="hidden" name="quality" value="0">
                          <input type="checkbox" id="quality" name="quality" value="1" class="custom-control-input" <?php if($sql_arr['quality']=='1'){?>checked <?php }?>>
                          <label class="custom-control-label" for="quality"></label>
                        </div>
                      </div>
                    </div>
                    <div class="border-top form-row mx-4">
                      <hr>
                      <label for="product" class="col col-form-label"><a style="font-size:15px;">成品管理</a>  <small class="form-text text-muted"> 对成品信息管理的权限 </small>
                      </label>
                      <div class="col d-flex">
                        <div class="custom-control custom-toggle ml-auto my-auto">
                          <input type="hidden" name="product" value="0">
                          <input type="checkbox" id="product" name="product" value="1" class="custom-control-input" <?php if($sql_arr['product']=='1'){?>checked <?php }?>>
                          <label class="custom-control-label" for="product"></label>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
                <div class="card-footer border-top">
                  <div class="row">
                    <div class="col">
                      <button form="user_save" class="btn btn-sm btn-accent d-table mr-3"><i class="fa fa-check mr-1"></i>保存修改</button>
                    </div>
                    <div class="col text-right view-report">
                      <a href="user.php">返回上一级 &rarr;</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Edit User Details  -->
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <?php include('script.php') ?>
</body>
</html>
