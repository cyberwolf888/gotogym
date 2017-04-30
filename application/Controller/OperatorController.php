<?php

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Model\Gym;
use Mini\Model\GymFacility;
use Mini\Model\Images;
use Mini\Model\Users;
use Intervention\Image\ImageManagerStatic as Image;

class OperatorController extends Controller
{
    function __construct()
    {
        if (isset($_SESSION['user'])) {
            if (!$_SESSION['user']->type == 2) {
                header('location: ' . URL . 'home/logout');
            }
        } else {
            header('location: ' . URL . 'home/login');
        }
    }

    /*
     *  Dashboard
     */
    public function index()
    {
        $this->view([
            'header' => 'view/_templates/operator_header.php',
            'content' => 'view/operator/dashboard/index.php',
            'footer' => 'view/_templates/operator_footer.php',
            'page_script' => 'view/operator/dashboard/script/index_page_script.php'
        ]);
    }

    public function process_profile()
    {
        var_dump($_POST);
        if (!is_null($_POST)) {
            $user = new Users();
            $gym = new Gym();

            $gym->update([
                'fullname' => $_POST['fullname'],
                'alamat' => $_POST['alamat'],
                'longitude' => $_POST['longitude'],
                'latitude' => $_POST['latitude'],
                'telp' => $_POST['telp'],
                'description' => $_POST['description'],
                'price' => $_POST['price']
            ], $_SESSION['gym']->id);

            $data_user = [
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'no_hp' => $_POST['telp']
            ];
            if (isset($_POST['password']) && $_POST['password'] != '') {
                $data_user['password'] = md5($_POST['password']);
            }
            $user->update($data_user, $_SESSION['user']->id);

            $_SESSION['gym'] = $gym->getOne($_SESSION['gym']->id);
            $_SESSION['user'] = $user->getOne($_SESSION['user']->id);

            header('location: ' . URL . 'operator');
        }
    }
    /* -------------------------------------------------------------------------------------------------------------- */


    /*
     *  Facility
     */
    public function facility()
    {
        $model = new GymFacility();
        $this->view([
            'header' => 'view/_templates/operator_header.php',
            'content' => 'view/operator/facility/manage.php',
            'footer' => 'view/_templates/operator_footer.php',
            'plugin_css' => 'view/operator/facility/script/manage_plugin_css.php',
            'plugin_script' => 'view/operator/facility/script/manage_plugin_script.php',
            'page_script' => 'view/operator/facility/script/manage_page_script.php'
        ], [
            'model' => $model->manage($_SESSION['gym']->id)
        ]);
    }

    public function create_facility()
    {
        $this->view([
            'header' => 'view/_templates/operator_header.php',
            'content' => 'view/operator/facility/form.php',
            'footer' => 'view/_templates/operator_footer.php'
        ]);
    }

    public function process_create_facility()
    {
        if (isset($_POST['facility_id'])) {
            $model = new GymFacility();
            $model->add([
                'facility_id' => $_POST['facility_id'],
                'gym_id' => $_SESSION['gym']->id
            ]);
        }
        header('location: ' . URL . 'operator/facility');
    }

    public function delete_facility($id)
    {
        $model = new GymFacility();
        $model->delete($id);
        header('location: ' . URL . 'operator/facility');
    }
    /* -------------------------------------------------------------------------------------------------------------- */


    /*
     *  Dashboard
     */
    public function images()
    {
        $model = new Images();
        $this->view([
            'header' => 'view/_templates/operator_header.php',
            'content' => 'view/operator/images/manage.php',
            'footer' => 'view/_templates/operator_footer.php',
            'plugin_css' => 'view/operator/images/script/manage_plugin_css.php',
            'plugin_script' => 'view/operator/images/script/manage_plugin_script.php',
            'page_script' => 'view/operator/images/script/manage_page_script.php'
        ], [
            'model' => $model->getAll(['gym_id'=>$_SESSION['gym']->id])
        ]);
    }

    public function create_images()
    {
        $this->view([
            'header' => 'view/_templates/operator_header.php',
            'content' => 'view/operator/images/form.php',
            'footer' => 'view/_templates/operator_footer.php',
            'plugin_css' => 'view/operator/images/script/form_plugin_css.php',
            'plugin_script' => 'view/operator/images/script/form_plugin_script.php',
        ]);
    }

    public function process_create_images()
    {
        $target_dir = "img/gym/";
        $chace_file = "img/chace/" . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($chace_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if(isset($_POST["bedebah"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $this->flash('error_images', 'File is not an image.', 'alert-danger' );
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($chace_file)) {
            $this->flash('error_images', 'Sorry, file already exists.', 'alert-danger' );
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $this->flash('error_images', 'Sorry, your file is too large.', 'alert-danger' );
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $this->flash('error_images', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.', 'alert-danger' );
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $this->flash('error_images', 'Sorry, your file was not uploaded.', 'alert-danger' );
            header('location: ' . URL . 'operator/create_images');
        // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $chace_file)) {
                //$watermark = Image::make('img/watermark.png')->opacity(50);

                $file = Image::make($chace_file)->resize(800, 600)
                    ->insert('img/watermark.png', 'bottom-right', 10, 10)
                    ->encode('jpg', 80)
                    ->save($target_dir.md5(microtime(true) * 1000).'.jpg');

                Image::make($chace_file)->resize(300, 240)
                    ->encode('jpg', 80)
                    ->save($target_dir.'thumb_'.$file->basename);

                if(is_file($chace_file)){
                    unlink($chace_file);
                }

                $model = new Images();
                $model->add([
                    'gym_id'=>$_SESSION['gym']->id,
                    'file'=>$file->basename
                ]);

                header('location: ' . URL . 'operator/images');
            } else {
                $this->flash('error_images', 'Sorry, there was an error uploading your file.', 'alert-danger' );
                header('location: ' . URL . 'operator/create_images');
            }

        }
    }

    public function delete_images($id)
    {

    }

}