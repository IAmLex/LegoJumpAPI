<?php 
    class Utilities {
        public static function SaveFile($filepath, $content) {
            $file = fopen($filepath, 'w');
            fwrite($file, $content);
            fclose($file);
        }

        public static function FormatString($string) {
            return str_replace(" ", "&#32;", $string); 
        }

        public static function DeformatString($string) {
            return str_replace("&#32;", " ", $string); 
        }
    }