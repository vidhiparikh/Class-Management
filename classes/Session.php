<?php
/**
 * Created by PhpStorm.
 * User: Vidhi
 * Date: 11-03-2018
 * Time: 20:05
 */
class Session{
    public static function startSession(){
        if(!Session::isSessionStart()){
            session_start();
        }
    }
    public static function isSessionStart(){
        if(isset($_SESSION['login'])){
            return true;
        }
        return false;
    }
}
?>