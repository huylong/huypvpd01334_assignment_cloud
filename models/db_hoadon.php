<?php
class HoaDon{
    //ghi dữ liệu vào giở hàng
    public function insert_data_cart($ten, $email, $sdt, $check, $diachi, $giohang) {
        mysql_query("INSERT INTO `hoadon` SET
            `name` = '$ten',
            `time` = '" . time() . "',
            `email` = '$email',
            `sdt` = '$sdt',
            `check` = '$check',
            `diachi` = '$diachi'
        ");
        $mahd = mysql_insert_id();
        $req = mysql_query("SELECT * FROM `sanpham` WHERE id in ({$giohang})");
        $a = '0';
        $huy = '';
        if (mysql_num_rows($req) != 0) {
            while ($res = mysql_fetch_array($req)) {
                $mota = trim($res['name']);
                $masp = trim($res['id']);
                $huy = explode(',', $giohang);
                $gia = $res['gia'];
                //lưu du liêu vào
             mysql_query("INSERT INTO `hoadon_chitiet` SET
            `tensp` = '$mota',
            `mahd` = '$mahd',
            `masp` = '$masp',
            `soluong` = '$huy[$a]',
            `gia` = '$gia'
                    ");
                ++$a;
            }
        }
    }
    //show all hoadon
    public function show_all_hoadon($check) {
        global $trang;
        $req = mysql_query("SELECT * FROM `hoadon` WHERE `check`='$check' ORDER BY `time` DESC LIMIT $trang, 8");
            $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }
    ///lấy thông tin hóa đơn
    public function get_hoadon_id($id) {
        $sql_query = mysql_query("SELECT * FROM hoadon WHERE id='$id'");
        $res = mysql_fetch_array($sql_query);
        return $res;
    }
    //update hóa đơn
    public function update_hoadon($check,$id){
        return mysql_query("UPDATE `hoadon` SET
            `check` = '$check'
            WHERE `id` = '$id' 
        ");
    }
       //hiện thị hóa đơn chi tiết
    public function show_all_hoadon_chitiet($id) {
        $req = mysql_query("SELECT * FROM hoadon_chitiet WHERE mahd='$id'");
            $rows = array();
        while ($res = mysql_fetch_array($req)) {
            $rows[] = $res;
        }
        return $rows;
    }
}
