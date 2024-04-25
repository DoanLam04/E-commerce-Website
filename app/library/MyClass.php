<?php

namespace Application\Libraries;

class MyClass
{
    public static function set_flash($name, $arr = array())
    {
        $_SESSION[$name] = $arr;
    }
    public static function get_flash($name)

    {
        $arr = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $arr;
    }
    public static function exists_flash($name)
    {
        return isset($_SESSION[$name]);
    }
    //check
    public static function has_flash($name)
    {
        return isset($_SESSION[$name]);
    }
    public static function  word_limit($str, $limit = 10)
    {
        $str = strip_tags($str);
        while (strpos($str, ' ')) {
            $str = str_replace(' ', ' ', $str);
        }
        $array = explode(' ', $str);
        $limit = ($limit <= 0) ? count($array) : $limit;
        $limit = ($limit >= count($array)) ? count($array) : $limit;
        $a = array_slice($array, 0, $limit);
        return implode(' ', $a);
    }
    public static function str_limit($str, $limit = 10, $dot = false)
    {
        //Xoá tag
        $str = strip_tags($str);
        //xóa ký tự trăng 2 bên
        $str = trim($str);
        //xoá ký tự trăng nam gia
        while (strpos($str, '  ')) {
            $str = str_replace('  ', ' ', $str);
        }
        //Lấy theo từ
        //CHuoi thành mang
        if (str_word_count($str) < $limit) {
            return $str;
        } else {
            $arr_str = explode(' ', $str);
            $arr_new = array_splice($arr_str, 0, $limit);
            $str = implode(' ', $arr_new);
            if ($dot == true) {
                $str .= '...';
            }
            return  $str;
        }
    }
    public static function str_slug($str)
    {
        $str = html_entity_decode($str);
        $str = preg_replace("/(å|ä|ā|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|ä|ą)/", 'a', $str);
        $str = preg_replace("/(ß|ḃ)/", "b", $str);
        $str = preg_replace("/(ç|ć|č|ĉ|ċ|¢|©)/", 'c', $str);
        $str = preg_replace("/(đ|ď|ḋ|đ)/", 'd', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ę|ë|ě|ė)/", 'e', $str);
        $str = preg_replace("/(ḟ|ƒ)/", "f", $str);
        $str = str_replace("ķ", "k", $str);
        $str = preg_replace("/(ħ|ĥ)/", "h", $str);
        $str = preg_replace("/(ì|í|î|ị|ỉ|ĩ|ï|î|ī|¡|į)/", 'i', $str);
        $str = str_replace("ĵ", "j", $str);
        $str = str_replace("ṁ", "m", $str);
        $str = preg_replace("/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ö|ø|ō)/", 'o', $str);
        $str = str_replace("ṗ", "p", $str);
        $str = preg_replace("/(ġ|ģ|ğ|ĝ)/", "g", $str);
        $str = preg_replace("/(ü|ù|ú|ū|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ü|ų|ů)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|ÿ)/", 'y', $str);
        $str = preg_replace("/(ń|ñ|ň|ņ)/", 'n', $str);
        $str = preg_replace("/(ŝ|š|ś|ṡ|ș|ş|³)/", 's', $str);
        $str = preg_replace("/(ř|ŗ|ŕ)/", "r", $str);
        $str = preg_replace("/(ṫ|ť|ț|ŧ|ţ)/", 't', $str);
        $str = preg_replace("/(ź|ż|ž)/", 'z', $str);
        $str = preg_replace("/(ł|ĺ|ļ|ľ)/", "l", $str);
        $str = preg_replace("/(ẃ|ẅ)/", "w", $str);
        $str = str_replace("æ", "ae", $str);
        $str = str_replace("þ", "th", $str);
        $str = str_replace("ð", "dh", $str);
        $str = str_replace("£", "pound", $str);
        $str = str_replace("¥", "yen", $str);
        $str = str_replace("ª", "2", $str);
        $str = str_replace("º", "0", $str);
        $str = str_replace("¿", "?", $str);
        $str = str_replace("µ", "mu", $str);
        $str = str_replace("®", "r", $str);
        $str = preg_replace("/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Ą|Å|Ā)/", 'A', $str);
        $str = preg_replace("/(Ḃ|B)/", 'B', $str);
        $str = preg_replace("/(Ç|Ć|Ċ|Ĉ|Č)/", 'C', $str);
        $str = preg_replace("/(Đ|Ď|Ḋ)/", 'D', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ę|Ë|Ě|Ė|Ē)/", 'E', $str);
        $str = preg_replace("/(Ḟ|Ƒ)/", "F", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ|Ï|Į)/", 'I', $str);
        $str = preg_replace("/(Ĵ|J)/", "J", $str);
        $str = preg_replace("/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ø)/", 'O', $str);
        $str = preg_replace("/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ū|Ų|Ů)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ|Ÿ)/", 'Y', $str);
        $str = str_replace("Ł", "L", $str);
        $str = str_replace("Þ", "Th", $str);
        $str = str_replace("Ṁ", "M", $str);
        $str = preg_replace("/(Ń|Ñ|Ň|Ņ)/", "N", $str);
        $str = preg_replace("/(Ś|Š|Ŝ|Ṡ|Ș|Ş)/", "S", $str);
        $str = str_replace("Æ", "AE", $str);
        $str = preg_replace("/(Ź|Ż|Ž)/", 'Z', $str);
        $str = preg_replace("/(Ř|R|Ŗ)/", 'R', $str);
        $str = preg_replace("/(Ț|Ţ|T|Ť)/", 'T', $str);
        $str = preg_replace("/(Ķ|K)/", 'K', $str);
        $str = preg_replace("/(Ĺ|Ł|Ļ|Ľ)/", 'L', $str);
        $str = preg_replace("/(Ħ|Ĥ)/", 'H', $str);
        $str = preg_replace("/(Ṗ|P)/", 'P', $str);
        $str = preg_replace("/(Ẁ|Ŵ|Ẃ|Ẅ)/", 'W', $str);
        $str = preg_replace("/(Ģ|G|Ğ|Ĝ|Ġ)/", 'G', $str);
        $str = preg_replace("/(Ŧ|Ṫ)/", 'T', $str);
        if (empty($str)) return $str;
        // if (is_array($str)) {
        //     foreach (array_keys($str) as $key) {
        //         $str[$key] = nv_unhtmlspecialchars($str[$key]);
        //     }
        // } else {
        //     $search = array(
        //         '&amp;', '&#039;', '&quot;', '&lt;', '&gt;', '&#x005C;', '&#x002F;',
        //         '&#40;', '&#41;', '&#42;', '&#91;', '&#93;', '&#33;', '&#x3D;', '&#x23;',
        //         '&#x25;', '&#x5E;', '&#x3A;', '&#x7B;', '&#x7D;', '&#x60;', '&#x7E;'
        //     );
        //     $replace = array(
        //         '&', '\'', '"', '<', '>', '\\', '/', '(', ')', '*',
        //         '[', ']', '!', '=', '#', '%', '^', ':', '{', '}', '`', '~'
        //     );
        //     $str = str_replace($search, $replace, $str);
        // }
        $str = preg_replace("/(!|\"|#|$|%|'|̣)/", '', $str);
        $str = preg_replace("/(̀|́|̉|$|>)/", '', $str);
        $str = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $str);
        $str = str_replace("----", " ", $str);
        $str = str_replace("---", " ", $str);
        $str = str_replace("--", " ", $str);
        $str = preg_replace('/(\W+)/i', '-', $str);
        $str = str_replace(array(
            '-8220-', '-8221-', '-7776-'
        ), '-', $str);
        //$str = preg_replace( '/[^a-zA-Z0-9\-]+/e', '', $str );
        $str = str_replace(array(
            'dAg', 'DAg', 'uA', 'iA', 'yA', 'dA', '--', '-8230'
        ), array(
            'dong', 'Dong', 'uon', 'ien', 'yen', 'don', '-', ''
        ), $str);
        $str = preg_replace('/(\-)$/', '', $str);
        $str = preg_replace('/^(\-)/', '', $str);
        return strtolower($str);
    }
}
