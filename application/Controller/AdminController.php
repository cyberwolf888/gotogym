<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Category;

class AdminController extends Controller
{
    /*
     *  Dashboard
     */
    public function dashboard()
    {

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
        ], [

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
    /* -------------------------------------------------------------------------------------------------------------- */
}