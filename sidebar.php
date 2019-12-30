<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
  <div class="main-navbar">
    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
      <a class="navbar-brand w-100 mr-0" href="index.php" style="line-height: 25px;">
        <div class="d-table m-auto">
          <!--<img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/logo.svg" alt="Shards Dashboard">-->
          <span class="  d-md-inline ml-1">生产管理系统</span>
        </div>
      </a>
      <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
        <i class="material-icons">&#xE5C4;</i>
      </a>
    </nav>
  </div>

  <div class="nav-wrapper">
    <ul class="nav nav--no-borders flex-column">
      <li class="nav-item dropdown aaa">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="order" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">insert_drive_file</i>
          <span>订单管理</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small ">
          <a class="dropdown-item " href="order.php">订单列表</a>
          <a class="dropdown-item " href="order-add.php">添加订单</a>
        </div>
      </li>
      <li class="nav-item  dropdown aaa">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="material" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">assignment_returned</i>
          <span>物料管理</span>
        </a>
        <div class="dropdown-menu  dropdown-menu-small ">
          <a class="dropdown-item " href="material.php">物料列表</a>
          <a class="dropdown-item " href="material-search.php">添加</a>
        </div>
      </li>
      <li class="nav-item dropdown aaa">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="process" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">straighten</i>
          <span>工艺管理</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
          <a class="dropdown-item " href="process.php">工艺列表</a>
          <a class="dropdown-item " href="process-add.php">添加</a>
        </div>
      </li>
      <li class="nav-item dropdown aaa">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="warehouse" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">home_work</i>
          <span>仓库管理</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
          <a class="dropdown-item " href="warehouse.php">仓库列表</a>
          <a class="dropdown-item " href="warehouse-add.php">添加</a>
        </div>
      </li>
      <li class="nav-item dropdown aaa">
        <a class="nav-link dropdown-toggle" data-submenu="true" data-toggle="dropdown" href="workshop" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">all_inclusive</i>
          <span>生产制造管理</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
          <div class="dropdown">
          <a class="dropdown-item  " data-toggle="dropdown" href="workshop">车间作业</a>
          <div class="dropdown-menu  dropdown-menu-small">
            <a class="dropdown-item " href="workshop-smt.php">SMT</a>
            <a class="dropdown-item " href="workshop-dip.php">DIP</a>
            <a class="dropdown-item " href="workshop-clean.php">清洗</a>
            <a class="dropdown-item " href="workshop-glue.php">打胶</a>
            <a class="dropdown-item " href="workshop-code.php">打码</a>
          </div>


          </div>

          <a class="dropdown-item " href="problem.php">问题反馈记录单</a>
          <a class="dropdown-item " href="addition.php">物料补领申请单</a>
        </div>
      </li>



      <li class="nav-item dropdown aaa">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="quality" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">playlist_add_check</i>
          <span>质量管理</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
          <a class="dropdown-item " href="quality.php">质量列表</a>
          <a class="dropdown-item " href="quality-add.php">添加</a>
        </div>
      </li>
      <li class="nav-item dropdown aaa">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="product" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="material-icons">local_shipping</i>
          <span>成品管理</span>
        </a>
        <div class="dropdown-menu dropdown-menu-small">
          <a class="dropdown-item " href="product.php">成品列表</a>
          <a class="dropdown-item " href="product-add.php">添加成品</a>
        </div>
      </li>
    </ul>
  </div>
</aside>