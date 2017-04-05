<?php
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */
require_once('lib/user.class.php');
$user = new USER();
$user->is_logged('home.php');
$user->getHeader('');
if (isset($_POST['submit_login'])){
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        $email    = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $response = $user->getLogin($email, $password);
        switch ($response) {
            case '200':
                $_SESSION['success_message'] = 'User Logged In successfully';
                break;
            case '400':
                $_SESSION['error_message'] = 'Login authentication failed';
                break;
            default:
                $_SESSION['error_message'] = $response;
                break;
        }
    } else {
        // here assign error message & redirecting this page
        $_SESSION['error_message'] = 'Please enter required field(s)..!';
    }
    die($user->redirect('home.php'));
}
if (isset($_POST['submit_register'])){
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        $username = htmlspecialchars($_POST['username']);
        $email    = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $response = $user->getRegister($username, $email, $password);
        switch ($response) {
            case '200':
                $_SESSION['success_message'] = 'Registration completed successfully';
                break;
            case '300':
                $_SESSION['error_message'] = 'This User Already Registered';
                break;
            case '400':
                $_SESSION['error_message'] = 'User Registration failed';
                break;
            default:
                $_SESSION['error_message'] = $response;
                break;
        }
    } else {
        // here assign error message & redirecting this page
        $_SESSION['error_message'] = 'Please enter required field(s)..!';
    }
    die($user->redirect(SITE_URL));
} ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 div-box">
            <?php $user->sessionMessage(); ?>
            <ul class="nav nav-pills nav-justified">
                <li class="active"><a data-toggle="pill" href="#login">LOGIN</a></li>
                <li><a data-toggle="pill" href="#register">REGISTER</a></li>
            </ul><br>
            <div class="tab-content">
                <div id="login" class="tab-pane fade in active">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email Id</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Id" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_login">LOGIN</button>
                    </form>
                </div>
                <div id="register" class="tab-pane fade">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Id</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Id" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_register">REGISTER</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4 div-box">
            <code><strong>Default :</strong><br> Email Id: ramesh@coderseven.com<br>password: password</code>
        </div>
    </div>
</div>

<?php $user->getFooter(''); ?>