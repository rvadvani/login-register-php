<?php
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */

require_once('lib/main.class.php');
class USER extends MAIN {

	public function getLogin($email, $password){
	    try {
            $q = $this->runQuery("SELECT * FROM tbl_users WHERE user_email = '$email' AND user_password = '$password' ");
            $q->execute();
            if($q->rowCount()){
                $_SESSION['logged_user'] = $q->fetchObject()->user_id;
                $response = '200';
            } else {
                $response = '400';
            }
        } catch (PDOException $e){
	        $response = "ERROR: ".$e->getMessage();
        }
        return $response;
	} // login method closed here

	public function getRegister($username, $email, $password){
	    try {
            $stmt = $this->runQuery("SELECT * FROM `tbl_users` WHERE `user_email` = '$email' ");
            $stmt->execute();
            if ($stmt->rowCount()){
                $response = '300';
            } else {
                $q = $this->runQuery("INSERT INTO `tbl_users`(`user_name`, `user_email`, `user_password`) VALUES ('$username', '$email', '$password') ");
                $res = $q->execute();
                if($res){
                    $response = '200';
                } else {
                    $response = '400';
                }
            }
        } catch (PDOException $e){
            $response = "ERROR: ".$e->getMessage();
        }
        return $response;
    } // register method closed here

    public function getUserName(){
	    $user_id = $_SESSION['logged_user'];
        try {
            $q = $this->runQuery("SELECT * FROM tbl_users WHERE user_id = '$user_id' ");
            $q->execute();
            if($q->rowCount()){
                $response = $q->fetchObject()->user_name;
            }
        } catch (PDOException $e){
            $response = "ERROR: ".$e->getMessage();
        }
        print $response;
    }
} //USER class closed here