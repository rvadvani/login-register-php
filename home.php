<?php
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */
require_once('lib/user.class.php');
$user = new USER();
$user->not_logged(SITE_URL);
$user->getHeader('');
if (isset($_GET['logout'])){
    if (isset($_SESSION['logged_user'])) {
        $response = $user->logout();
        switch ($response) {
            case '200':
                $_SESSION['success_message'] = 'User Logged Out successfully';
                break;
            case '400':
                $_SESSION['error_message'] = 'Authentication failed';
                break;
            default:
                $_SESSION['error_message'] = 'Something Went Wrong!';
                break;
        }
        die($user->redirect(SITE_URL));
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 div-box">
                <?php $user->sessionMessage(); ?>
                <h4>Hi <?= $user->getUserName(); ?> ..</h4><hr>
                <a href="?logout" class="btn btn-primary" name="submit_login">Log Out</a>
            </div>
            <div class="col-md-4 col-md-offset-4 div-box">
                <code><strong>Thank You :</strong> for visiting...</code>
            </div>
        </div>
    </div>

<?php $user->getFooter(''); ?>