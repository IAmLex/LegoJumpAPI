<?php 
    include_once 'Config.php';

    class Utilities {
        public static function SaveFile($filepath, $content) {
            $filepath = Config::ROOT . $filepath;
            $file = fopen($filepath, 'w');
            fwrite($file, $content);
            fclose($file);
        }

        public static function ReadFile($filepath) {
            $filepath = Config::ROOT . $filepath;
            
            $file = fopen($filepath, 'r');
            $content = fread($file, filesize($filepath));
            fclose($file);

            return $content;
        }

        public static function FormatString($string) {
            return str_replace(" ", "&#32;", $string); 
        }

        public static function DeformatString($string) {
            return str_replace("&#32;", " ", $string); 
        }
    }