    <?php

    class CheckNow{
        //đường dần thư mục
        //kiểm tra sự tồn tại của admin
    public function administrator() {
        global $home;
        if (isset($_SESSION['user_admin']) && $_SESSION['user_admin'] !=='1'){
    echo '<div class="well well-lg">Bạn không có quyền truy cập yêu cầu BQT! <a href="'.$home.'">Nhấp vào đây để về trang chủ</a></div></div>';
    include('../inc/end.php');
    exit();
    }
    if (!isset($_SESSION['user_id'])) {
    echo "<div class='well well-lg'>Bạn chưa đăng nhập! <a href=''.$home.'login.php'>Nhấp vào đây để đăng nhập</a></div></div>";
    include('../inc/end.php');
    exit();
    }
    }
    //kiểm tra đăng nhập
    function checkadmin($username, $pass) {
        $sql_query = mysql_query("SELECT `id`, `username`, `password`, `admin` FROM users WHERE username='" . $username . "'");
        $member = mysql_fetch_array($sql_query);
        $total = mysql_num_rows($sql_query);
        if ($total <= 0) {
            echo "<div class='well well-lg'>Không tồn tại tài khoản này. <a href='javascript:history.go(-1)'>Nhấp vào đây để quay trở lại</a></div></div>";
        }else {
            return $member;
        }
    }
    //chuyển trang 
    public function chuyentrang($url) {
        return '<script type="text/javascript">
    var time = 3; //How long (in seconds) to countdown
    var page = "' . $url . '"; //The page to redirect to
    function countDown(){
    time--;
    gett("container").innerHTML = time;
    if(time == -1){
    window.location = page;
    }
    }
    function gett(id){
    if(document.getElementById) return document.getElementById(id);
    if(document.all) return document.all.id;
    if(document.layers) return document.layers.id;
    if(window.opera) return window.opera.id;
    }
    function init(){
    if(gett("container")){
    setInterval(countDown, 1000);
    gett("container").innerHTML = time;
    }
    else{
    setTimeout(init, 50);
    }
    }
    document.onload = init();
    </SCRIPT>';
    }
    //chuyển hướng trang bằng header
    public function redirect($url) {
        return header("Location: " . $url);
}
///tải lên tập tin
    public function upfile($source, $target){
        global $filename; 
      if(!empty($filename)){
          move_uploaded_file($source, $target);
          }
      }
      //rename file
      public function renamefile($old, $new){
          global $filename;
          rename($old, $new);
      }
    }


