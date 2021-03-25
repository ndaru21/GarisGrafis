<?php
    class Input{
        public static function get($name){
            if(isset($_POST[$name])){
                return $_POST[$name];
            }else if(isset($_GET[$name])){
                return $_GET[$name];
            }
            return false;
        }

        public static function required($name){
            $blank = !empty(trim($name));
            return $blank;
        }

        public static function randomCode($length = 7){
            $str = '';
            $character = array_merge(range('A', 'Z'), range('0', '9'));
            $max = count($character) -1;
            for($i = 0; $i<$length; $i++){
                $rand = mt_rand(0, $max);
                $str .= $character[$rand];
            }

            return $str;
            
        }
    }
?>