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
        $this->view([
            'content'=>'view/home/index.php'
        ]);
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

    public function search()
    {
        $gym = new Gym();
        $search = $gym->search($_GET['keyword'], $_GET['category']);

        $this->view([
            'header'=>'view/_templates/home_header.php',
            'content'=>'view/home/search.php',
            'footer'=>'view/_templates/home_footer.php',
        ],[
            'search'=>$search
        ]);
    }

    public function newfacility()
    {
        $gym = new Gym();
        $this->view([
            'header'=>'view/_templates/home_header.php',
            'content'=>'view/home/newfacility.php',
            'footer'=>'view/_templates/home_footer.php',
        ],[
            'model'=>$gym->newFacility()
        ]);
    }

    public function detail($id)
    {
        $gym = new Gym();
        $this->view([
            'header'=>'view/_templates/home_header.php',
            'content'=>'view/home/detail.php',
            'footer'=>'view/_templates/home_footer.php',
            'page_script'=> 'view/home/script/detail_page_script.php',
            'page_css'=> 'view/home/script/detail_page_css.php',
            'plugin_script'=> 'view/home/script/detail_plugin_script.php',
            'plugin_css'=> 'view/home/script/detail_plugin_css.php'
        ],[
            'model'=>$gym->getOne($id)
        ]);
    }

    public function contact()
    {
        $this->view([
            'header'=>'view/_templates/home_header.php',
            'content'=>'view/home/contact.php',
            'footer'=>'view/_templates/home_footer.php',
        ]);
    }

    public function mail()
    {
        echo "Pesan anda berhasil dikirim.";
    }
    public function logout()
    {
        unset($_SESSION['user']);
        header('location: ' . URL . 'home/login');
    }
}
