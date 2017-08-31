<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Category;
use Mini\Model\Facility;
use Mini\Model\Gym;
use Mini\Model\Images;
use Mini\Model\Users;

class AdminController extends Controller
{
    function __construct()
    {
        if(isset($_SESSION['user'])){
            if(!$_SESSION['user']->type == 1){
                header('location: ' . URL . 'home/logout');
            }
        }else{
            header('location: ' . URL . 'home/login');
        }
    }

    /*
     *  Dashboard
     */
    public function index()
    {
        $facility = new Facility();
        $count_facility = count($facility->getAll());
        $user = new Users();
        $count_operator = count($user->getAll(['type'=>2]));

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/dashboard/index.php',
            'footer'=>'view/_templates/admin_footer.php',
            //'plugin_css'=>'view/admin/category/script/manage_plugin_css.php',
            'plugin_script'=>'view/admin/dashboard/script/plugin_script.php',
            'page_script'=>'view/admin/dashboard/script/page_script.php'
        ], [
            'count_facility'=>$count_facility,
            'count_operator'=>$count_operator,
            'user'=>$user
        ]);
    }
    /* -------------------------------------------------------------------------------------------------------------- */

    /*
     *  Category
     */
    public function category()
    {
        $category = new Category();
        $model = $category->getAll();

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/category/manage.php',
            'footer'=>'view/_templates/admin_footer.php',
            'plugin_css'=>'view/admin/category/script/manage_plugin_css.php',
            'plugin_script'=>'view/admin/category/script/manage_plugin_script.php',
            'page_script'=>'view/admin/category/script/manage_page_script.php'
        ], [
            'model'=>$model
        ]);
    }

    public function create_category()
    {
        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/category/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ]);
    }

    public function process_create_category()
    {
        if (isset($_POST["bedebah"])) {
            $model = new Category();
            $model->add(['label'=>$_POST['label']]);
        }

        header('location: ' . URL . 'admin/category');
    }

    public function edit_category($id)
    {
        $category = new Category();
        $model = $category->getOne($id);

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/category/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ], [
            'model'=>$model
        ]);
    }

    public function process_edit_category($id)
    {
        if (isset($_POST["bedebah"])) {
            $model = new Category();
            $model->update(['label'=>$_POST['label']],$id);
        }

        header('location: ' . URL . 'admin/category');
    }

    public function delete_category($id)
    {
        $category = new Category();
        $model = $category->delete($id);

        header('location: ' . URL . 'admin/category');
    }
    /* -------------------------------------------------------------------------------------------------------------- */


    /*
     *  Facility
     */
    public function facility()
    {
        $facility = new Facility();
        $model = $facility->getAll();

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/facility/manage.php',
            'footer'=>'view/_templates/admin_footer.php',
            'plugin_css'=>'view/admin/facility/script/manage_plugin_css.php',
            'plugin_script'=>'view/admin/facility/script/manage_plugin_script.php',
            'page_script'=>'view/admin/facility/script/manage_page_script.php'
        ], [
            'model'=>$model
        ]);
    }

    public function create_facility()
    {
        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/facility/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ], [

        ]);
    }

    public function process_create_facility()
    {
        if (isset($_POST["bedebah"])) {
            $model = new Facility();
            $model->add(['label'=>$_POST['label']]);
        }

        header('location: ' . URL . 'admin/facility');
    }

    public function edit_facility($id)
    {
        $category = new Facility();
        $model = $category->getOne($id);

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/facility/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ], [
            'model'=>$model
        ]);
    }

    public function process_edit_facility($id)
    {
        if (isset($_POST["bedebah"])) {
            $model = new Facility();
            $model->update(['label'=>$_POST['label']],$id);
        }

        header('location: ' . URL . 'admin/facility');
    }

    public function delete_facility($id)
    {
        $facility = new Facility();
        $facility->delete($id);
        header('location: ' . URL . 'admin/facility');
    }
    /* -------------------------------------------------------------------------------------------------------------- */


    /*
     *  User Admin
     */
    public function user_admin()
    {
        $users = new Users();
        $model = $users->getAll(['type'=>1]);

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/user_admin/manage.php',
            'footer'=>'view/_templates/admin_footer.php',
            'plugin_css'=>'view/admin/user_admin/script/manage_plugin_css.php',
            'plugin_script'=>'view/admin/user_admin/script/manage_plugin_script.php',
            'page_script'=>'view/admin/user_admin/script/manage_page_script.php'
        ], [
            'model'=>$model
        ]);
    }

    public function create_user_admin()
    {
        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/user_admin/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ], [
        ]);
    }

    public function process_create_user_admin()
    {
        if (isset($_POST["bedebah"])) {
            $model = new Users();
            $cekUsername = $model->getOne(['username'=>$_POST['username']]);
            if($cekUsername){
                $this->flash('error_user_admin', 'Username '.$_POST['username'].' already used.', 'alert-danger' );
                header('location: ' . URL . 'admin/create_user_admin');
            }else{
                $model->add([
                    'fullname'=>$_POST['fullname'],
                    'username'=>$_POST['username'],
                    'password'=>md5($_POST['password']),
                    'no_hp'=>$_POST['no_hp'],
                    'type'=>1,
                    'status'=>$_POST['status'],
                ]);
                header('location: ' . URL . 'admin/user_admin');
            }
        }
    }

    public function edit_user_admin($id)
    {
        $user = new Users();
        $model = $user->getOne($id);

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/user_admin/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ], [
            'model'=>$model
        ]);
    }

    public function process_edit_user_admin($id)
    {
        if (isset($_POST["bedebah"])) {
            $model = new Users();
            $user = $model->getOne($id);
            $data = [];

            if($user->username != $_POST['username']){
                $cekUsername = $model->getOne(['username'=>$_POST['username']]);
                if($cekUsername){
                    $this->flash('error_user_admin', 'Username '.$_POST['username'].' already used.', 'alert-danger' );
                    header('location: ' . URL . 'admin/edit_user_admin');
                }else{
                    $data['username'] = $_POST['username'];
                }
            }
            if(isset($_POST['password']) && !empty($_POST['password'])){
                $data['password'] = md5($_POST['password']);
            }

            $data['fullname'] = $_POST['fullname'];
            $data['no_hp'] = $_POST['no_hp'];
            $data['status'] = $_POST['status'];

            $model->update($data, $id);
            header('location: ' . URL . 'admin/user_admin');
        }

    }
    /* -------------------------------------------------------------------------------------------------------------- */


    /*
     *  User Operator
     */
    public function user_operator()
    {
        $users = new Users();
        $model = $users->getAll(['type'=>2]);

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/user_operator/manage.php',
            'footer'=>'view/_templates/admin_footer.php',
            'plugin_css'=>'view/admin/user_operator/script/manage_plugin_css.php',
            'plugin_script'=>'view/admin/user_operator/script/manage_plugin_script.php',
            'page_script'=>'view/admin/user_operator/script/manage_page_script.php'
        ], [
            'model'=>$model
        ]);
    }

    public function create_user_operator()
    {
        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/user_operator/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ], [
        ]);
    }

    public function process_create_user_operator()
    {
        if (isset($_POST["bedebah"])) {
            $model = new Users();
            $gym = new Gym();
            $cekUsername = $model->getOne(['username'=>$_POST['username']]);
            if($cekUsername){
                $this->flash('error_user_operator', 'Username '.$_POST['username'].' already used.', 'alert-danger' );
                header('location: ' . URL . 'admin/create_user_operator');
            }else{
                $user_id = $model->add([
                    'fullname'=>$_POST['fullname'],
                    'username'=>$_POST['username'],
                    'password'=>md5($_POST['password']),
                    'no_hp'=>$_POST['no_hp'],
                    'type'=>2,
                    'status'=>$_POST['status'],
                ]);
                $gym->add([
                    'user_id'=>$user_id,
                    'fullname'=>$_POST['fullname'],
                    'status'=>3
                ]);
                header('location: ' . URL . 'admin/user_operator');
            }
        }
    }

    public function edit_user_operator($id)
    {
        $user = new Users();
        $model = $user->getOne($id);
        $gym = new Gym();

        $this->view([
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/user_operator/form.php',
            'footer'=>'view/_templates/admin_footer.php'
        ], [
            'model'=>$model,
            'gym'=>$gym->getOne(['user_id' => $id])
        ]);
    }

    public function process_edit_user_operator($id)
    {
        if (isset($_POST["bedebah"])) {
            $model = new Users();
            $gym = new Gym();
            $gym_id = $gym->getOne(['user_id'=>$id])->id;
            $user = $model->getOne($id);
            $data = [];

            if($user->username != $_POST['username']){
                $cekUsername = $model->getOne(['username'=>$_POST['username']]);
                if($cekUsername){
                    $this->flash('error_user_admin', 'Username '.$_POST['username'].' already used.', 'alert-danger' );
                    header('location: ' . URL . 'admin/edit_user_admin');
                }else{
                    $data['username'] = $_POST['username'];
                }
            }
            if(isset($_POST['password']) && !empty($_POST['password'])){
                $data['password'] = md5($_POST['password']);
            }

            $data['fullname'] = $_POST['fullname'];
            $data['no_hp'] = $_POST['no_hp'];
            $data['status'] = $_POST['status'];

            $model->update($data, $id);
            $gym->update([
                'category_id'=>$_POST['category_id'],
                'fullname'=>$_POST['fullname'],
                'status'=>$_POST['status']
            ], $gym_id);

            header('location: ' . URL . 'admin/user_operator');
        }

    }

    public function show_user_operator($id)
    {
        $user = new Users();
        $model = $user->getOne($id);
        $gym = new Gym();
        $images = new Images();

        $view = [
            'header'=>'view/_templates/admin_header.php',
            'content'=>'view/admin/user_operator/show.php',
            'footer'=>'view/_templates/admin_footer.php',
            'page_css' => 'view/admin/user_operator/script/show_page_css.php',
            'page_script' => 'view/admin/user_operator/script/show_page_script.php',
            'plugin_css' => 'view/admin/user_operator/script/show_plugin_css.php',
            'plugin_script' => 'view/admin/user_operator/script/show_plugin_script.php',
        ];
        $this->view($view, [
            'model'=>$model,
            'gym'=>$gym->getOne(['user_id' => $id]),
            'images'=>$images
        ]);
    }
    /* -------------------------------------------------------------------------------------------------------------- */
}