<?php
echo '<title>Thông tin cá nhân</title>';
$huy = 'admin';
include('../inc/head.php');
$check = new CheckNow();
$add = new Users();
echo'<div class="container">
    <div class="row">
    <div class="col-sm-9">';
if (!isset($_SESSION['user_id']) )
{ 
    echo '<div class="well well-lg">Bạn chưa đăng nhập! <a href="'.$home.'login.php">Nhấp vào đây để đăng nhập</a></div>'; 
}
if (isset($_GET['act']))
       $act = $_GET['act'];
   else
       $act ='';
    switch ($act){
      case 'edit':
          if(isset($_POST['ok'])){
              //khai báo
              $email = $_POST['email'];
              $hoten = $_POST['hoten'];
              $ngaysinh = $_POST['ngaysinh'];
              $diachi = $_POST['diachi'];
              $sdt = $_POST['sdt'];
              $id1 = $_POST['id'];
              //ghi du liệu
             $add->update_user($email, $hoten, $ngaysinh, $diachi, $id1);
              // Thông báo đăng nhập thành công và chuyển trang
              $user_id = $id1;
              $member = $add->get_info_user($user_id);
              $adm_id = $_SESSION['user_admin'];
              $member_adm = $add->get_info_user($adm_id);
              
             if ($member_adm['admin'] == '1'){
                 echo $check->chuyentrang('office.php');
                 echo'<div class="well well-lg">Lưu thành công. Bạn sẽ được chuyển trang <span id="container"></span> giây</div></div>';
    }else{
                echo $check->chuyentrang('personal.php');
                echo'<div class="well well-lg">Lưu thành công. Bạn sẽ được chuyển trang <span id="container"></span> giây</div></div>';
       
             }
             include('../inc/end.php');
             exit();
             
          }
    echo'<div class="panel panel-default">
  <div class="panel-heading"><a href="personal.php">Cá Nhân</a> >> Chỉnh Sửa Thông Tin</div> </div>';
     $user_id = $_GET['id'];
     $adm_id = $_SESSION['user_admin'];
     $member = $add->get_info_user($user_id);
     $member_adm = $add->get_info_user($adm_id);
          echo'
    <form class="login-form" role="form" action="personal.php?act=edit" method="post">
    <div class="form-group">
    <label for="th">Tên Đăng Nhập:</label>';
    if ($member_adm['admin'] =='1'){
    echo'<input type="text" class="form-control " maxlength="100" name="email" value="'.$member['username'].'" required>';
    }else{
     echo'<input type="text" class="form-control " maxlength="100" name="email" value="'.$member['username'].'" required="" disabled>';
       
    }
    echo'</div>
    <div class="form-group">
    <label for="th">Email:</label>
    <input type="hidden" class="form-control" maxlength="100" name="id" value="'.$member['id'].'" required>
    <input type="text" class="form-control" maxlength="100" name="email" value="'.$member['email'].'" required>
    </div>
    <div class="form-group">
    <label for="th">Họ và tên:</label>
    <input type="text" class="form-control" maxlength="100" name="hoten" value="'.$member['name'].'" required>
    </div>
    <div class="form-group">
    <label for="th">Ngày sinh:</label>
    <input type="date" class="form-control" maxlength="100" name="ngaysinh" value="'.$member['ngaysinh'].'" required>
    </div>
    <div class="form-group">
    <label for="th">Địa chỉ:</label>
    <textarea class="form-control" rows="2" name="diachi" required>'.$member['diachi'].'</textarea>
    </div>
    <div class="form-group">
    <label for="th">Số điện thoại:</label>
    <input type="text" class="form-control" maxlength="100" name="sdt" value="'.$member['sdt'].'" required>
    </div>
    <button class="btn btn-primary" type="submit" name="ok">Lưu</button>
    <button class="btn btn-danger" type="reset" name="del">Reset</button></form></div>';
          break;
      default:
echo'<div class="bs-example" data-example-id="table-within-panel">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Cá Nhân</div>
      <div class="panel-body"><a href="personal.php?act=edit&id='.$user_id.'"> Chỉnh Sữa Thông Tin</a></div>
      
      <!-- Table -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Sđt</th>
            <th>Địa chỉ</th>
            <th>Ngày sinh</th>
          </tr>
        </thead>
        <tbody>';
    $user_id = intval($_SESSION['user_id']);
     $member = $add->get_info_user($user_id);
    echo'<tr>
            <th scope="row">'.$member['name'].'</th>
            <td>'.$member['email'].'</a></td>
            <td>'.$member['sdt'].'</td>
            <td>'.$member['diachi'].'</td>
            <td>'.$member['ngaysinh'].'</td>
                   
          </tr>';
                echo'</tbody>
      </table>
    </div>
  </div>
  </div>';
                break;
    }
                include('../inc/end.php');
?>