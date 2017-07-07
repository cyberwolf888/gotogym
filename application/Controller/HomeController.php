<?php

namespace Mini\Controller;

use PDO;
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
            'page_script'=> 'view/home/script/search_page_script.php',
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

    public function ajaxSearch()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        $keyword = $_POST['keyword'];
        $category = $_POST['category'];

        $_keyw = explode(' ', $keyword);
        $search = null;
        foreach ($_keyw as $key){
            $search.= 'fullname LIKE "%'.$key.'%" OR ';
        }
        $search = substr($search, 0, -4);

        $cat = '';
        if($category!=0){
            $cat = ' AND category_id = '.$category;
        }

        $order = "ORDER BY price ASC";
        if($_POST['sorting']==2){
            $order = "ORDER BY price DESC";
        }

        $sql = "SELECT * FROM gym WHERE ".$search.$cat." AND status = 1 $order";

        if(isset($_POST['facility']) && count($_POST['facility'])>0){
            $facility = $_POST['facility'];
            $_facility = "";
            foreach ($facility as $key => $value) {
                $_facility.= 'facility_id="'.$value.'" OR ';
            }
            $_facility = substr($_facility,0,-3);
            $sql = "SELECT f.facility_id,f.gym_id,g.* FROM gym_facility AS f JOIN gym AS g ON g.id=f.gym_id WHERE ".$search.$cat." AND $_facility AND status = 1  GROUP BY id $order";
        }

        $query = $db->prepare($sql);
        $query->execute([]);

        $reseult = $query->fetchAll();

        $this->view([
            'content'=>'view/home/ajaxSearch.php',
        ],[
            'model'=>$reseult
        ]);
    }
}
