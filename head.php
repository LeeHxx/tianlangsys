<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>生产计划进度管理系统</title>
<meta name="description" content="tianlang">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="styles/all.css">
<link rel="stylesheet" href="styles/icon.css">
<link rel="stylesheet" href="styles/bootstrap.css">
<link rel="stylesheet" href="styles/shards-dashboards.1.3.1.css" id="main-stylesheet" data-version="1.3.1">
<link rel="stylesheet" href="styles/extras.1.3.1.min.css">
<link rel="stylesheet" href="styles/responsive.dataTables.css">
<link rel="stylesheet" href="styles/font-awesome.css">
<script src="scripts/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    //$(".aaa").find("a").each(function () {
    $(".aaa a").each(function () {
    //$(".aaa a").click(function () {
      //$(".aaa a").removeClass("active");
      //$(this).addClass("active");
      //alert(document.location.href.search(this.href));
      //alert(this.href);
      if (location.href.search(this.href) >= 0) {
                $(this).addClass('active'); // this.className = 'active';
            }
      //if (this.href == location.pathname || document.location.href.search(this.href) >= 0) {
      //          $(this).parent().addClass('active'); // this.className = 'active';
      //      }
      //if ($(a).attr("href") === location.pathname) {
      //  $(this).addClass("active");
      //} else {
      //  $(this).removeClass("active");
      //}
    });

});
</script>
