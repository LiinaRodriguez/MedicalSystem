<?php
       class connection{
        
        public static function connect(){
             $pdo = new PDO("mysql:host=localhost; bdname=madicalsystemdb; charset=utf8", 'root', 'LOCALHOST');
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
             return $pdo;
            }
       }
?>


