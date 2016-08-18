<?php
$huy = 'Quản Lý Người Dùng';
include('../inc/head.php');
echo'<div class="container">
<div class="row">
     <div class="col-sm-9">';
$check = new CheckNow();
$add = new Users();
$check->administrator();
   if (isset($_GET['act']))
       $act = $_GET['act'];
   else
       $act ='';
    switch ($act){
      case 'del':
          if (isset($_GET['act']))
       $id = $_GET['id'];
          else
       $act ='';
          if(isset($_POST['ok'])){
              $id1 = $_GET['id'];
              mysql_query("DELETE FROM users WHERE id='$id'");
              $check->redirect('office.php');
          }
          echo'<div class="panel panel-default">
  <div class="panel-heading"><a href="office.php">Quản Lý Người Dùng</a> >> Xóa Người Dùng</div> </div>';
    
          echo'<form class="login-form" role="form" action="office.php?act=del&id='.$id.'" method="post">
    <button class="btn btn-danger" type="submit" name="ok">Xóa</button></form></div>';
          break;
      default:
          echo'<div class="bs-example" data-example-id="table-within-panel">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Quản lý người dùng</div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên Người Dùng</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Tùy Chỉnh</th>
          </tr>
        </thead>
        <tbody>';
          if (!isset($_GET['page']))
{
    $page = 0;
}else{
    $page = $_GET['page'];
}
$trang = $page*8;
$i = 1;
$total = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` ORDER BY `time`"),0); 
$total_page = $total/8;
$rows= $add->show_all_users();
foreach ($rows as $res){
echo'
          <tr>
            <th scope="row">'.$i.'</th>
            <td><a href="personal.php?id='.$res['id'].'">'.$res['username'].'</a></td>
            <td><span style="color: red">'.$res['email'].'</span></td>
            <td>'.$res['diachi'].'</td>
            <td><a class="btn btn-primary" href="personal.php?act=edit&id='.$res['id'].'">Edit</a>  <a class="btn btn-danger" href="?act=del&id='.$res['id'].'">Delete</a></td>
                   
          </tr>';
            ++$i;
        }
        echo'
            <tr><td></td><td><b>Tổng Số: '.$total.' tài khoản</b></td></tr>
            </tbody>
      </table>
    </div>
  </div>
 </div>';
  if($total > 8){
    echo' <nav>
  <ul class="pagination"><li><a href="office.php?page='.($page-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
for ( $page = 0; $page <= $total_page; $page ++ )
{
    echo'<li><a href="office.php?page='.$page.'">'.($page+1).'</a></li>';
}
echo'<li><a href="office.php?page='.($page+1).'" aria-label="Previous"><span aria-hidden="true">»</span></a></li>';
}
 echo'</ul>
</nav>';
          break;
      
}
include('../inc/end.php');
?>

