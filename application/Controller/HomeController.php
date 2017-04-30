<?php

namespace Mini\Controller;


use Mini\Core\Controller;
use Mini\Model\Gym;
use Mini\Model\Users;

class HomeController extends Controller
{

    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function login()
    {
        $this->view([
            'content'=>'view/home/login.php'
        ]);
    }

    public function proses_login()
    {
        if(isset($_POST['username']))
        {
            $_user = new Users();
            $user = $_user->getOne(['username'=>$_POST['username'],'password'=>md5($_POST['password'])]);
            if($user){
                $_SESSION['user'] = $user;

                if($user->type == 1){
                    header('location: ' . URL . 'admin');
                }

                if($user->type == 2){
                    $_gym = new Gym();
                    $gym = $_gym->getOne(['user_id'=>$user->id]);
                    $_SESSION['gym'] = $gym;
                    header('location: ' . URL . 'operator');
                }
            }else{
                $this->flash('error_login', '<b>Failed to login. </b>Username or password is invalid.', 'alert-danger' );
                header('location: ' . URL . 'home/login');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('location: ' . URL . 'home/login');
    }
}
