<?php
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */
require_once('connect.php');
class MAIN {

    protected $conn = null;
    public function __construct(){
        try{
            $this->conn = new PDO(DB_TYPE.":host=".DB_SERVER.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            $this->error_page('Database Not Connected','Please Check database connection before running this site ...'); exit;
        }
    }

    public function error_page($error_title, $error_message){
        require_once('lib/error_page.php');
        exit;
    }

    public function runQuery($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function getSlider(){
        require_once('slider.php');
    }

    public function redirect($url){
        header("Location: $url");
    }

    public function getStyle($url){
        require_once($url.'style.php');
    }

    public function getScript($url){
        require_once($url.'js.php');
    }

    public function getHeader($url){
        require_once($url.'header.php');
    }

    public function getFooter($url){
        require_once($url.'footer.php');
    }

    public function not_logged($url){
        if(!isset($_SESSION['logged_user'])){
            $this->redirect($url);
        }
    }

    public function is_logged($url){
        if(isset($_SESSION['logged_user'])){
            $this->redirect($url);
        }
    }

    public function logout(){
        if(isset($_SESSION['logged_user'])) {
            session_unset($_SESSION['logged_user']);
            $response = '200';
        } else {
            $response = '400';
        }
        return $response;
    }

    public function sessionMessage(){
        if (isset($_SESSION['success_message'])):
            $message = $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            $response =  $this->showMessage($message,'success');
            print $response;
        endif;
        if (isset($_SESSION['error_message'])):
            $message = $_SESSION['error_message'];
            unset($_SESSION['error_message']);
            $response =  $this->showMessage($message,'danger');
            print $response;
        endif;
        if (isset($_SESSION['warning_message'])):
            $message = $_SESSION['warning_message'];
            unset($_SESSION['warning_message']);
            $response =  $this->showMessage($message,'warning');
            print $response;
        endif;
    }

    public function showMessage($message, $type){
        $msg = '<div class="alert alert-'.$type.'  alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Info!</strong> '.$message.' 
          </div>';
        return $msg;
    }
}