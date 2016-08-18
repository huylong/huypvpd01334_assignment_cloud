<?php
require_once($root.'models/db.php');
require_once($root.'inc/core.php');
require_once($root.'models/action.php');
require_once($root.'models/db_chuyenmmuc.php');
require_once($root.'models/db_sanpham.php');
require_once($root.'models/db_users.php');
require_once($root.'models/db_hoadon.php');
require_once($root.'controller/admin.php');
//thư viện
function vnd($strNum) {
        $changer = str_replace('VNĐ', '',$strNum);
        $changer = str_replace(',', '', $changer);
        $changer = trim(str_replace('.', '', $changer));
        $len = strlen($changer);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($changer, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($changer, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);   
        }
        return $result.' VNĐ';
}
function rvnd($strNum) {
        $changer = str_replace('VNĐ', '',$strNum);
        $changer = str_replace(',', '', $changer);
        $changer = trim(str_replace('.', '', $changer));
        return $changer;
}
function catchuoi($string, $count)
{
 $cutter = '#';
 $string_cut = wordwrap($string,$count,$cutter);
 $end_cut = explode($cutter,$string_cut,2);
 return $end_cut[0];
}
///chuyển tiếng việt không dấu
function khongdau($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            '-'=>' ',
        );
        
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
       }
		return $str;
    }
    ///resize ảnh
        function deletefile($filename){
            unlink($filename);
        }
?>

