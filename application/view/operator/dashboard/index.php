<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Dashboard
            <small>Operator</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= URL ?>admin">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Dashboard</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <div id='map_canvas' style="width: 100%;height: 300px;"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light bordered">

            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Manage Profile </span>
                </div>
            </div>

            <div class="portlet-body form">
                <form action=" <?= URL.'operator/process_profile' ?>" method="post">
                    <div class="form-body">

                        <div class="row">
                            <!-- left -->
                            <div class="col-md-6">

                                <div class="form-group form-md-line-input">
                                    <input type="text" name="fullname" id="fullname" placeholder="" class="form-control" value="<?= $_SESSION['gym']->fullname ?>" required>
                                    <label for="label">Full Name</label>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input type="number" name="telp" id="telp" placeholder="" class="form-control" value="<?= $_SESSION['gym']->telp ?>" required>
                                    <label for="telp">Telephone</label>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input type="number" name="price" id="price" placeholder="" class="form-control" min="0" value="<?= $_SESSION['gym']->price ?>" required>
                                    <label for="price">Price</label>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input type="text" name="username" id="username" placeholder="" class="form-control" value="<?= $_SESSION['user']->username ?>" required>
                                    <label for="username">Username</label>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input type="password" name="password" id="password" placeholder="" class="form-control" value="">
                                    <label for="password">Password</label>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <textarea name="description" id="description" placeholder="" class="form-control" rows="3" required><?= $_SESSION['gym']->description ?></textarea>
                                    <label for="description">Description</label>
                                </div>

                            </div>

                            <!-- left -->
                            <div class="col-md-6">

                                <div class="form-group form-md-line-input">
                                    <input type="text" name="alamat" id="alamat" placeholder="" class="form-control" value="<?= $_SESSION['gym']->alamat ?>" required>
                                    <label for="label">Alamat</label>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input type="text" name="longitude" id="longitude" placeholder="" class="form-control" value="<?= $_SESSION['gym']->longitude ?>" readonly required>
                                    <label for="label">longitude</label>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input type="text" name="latitude" id="latitude" placeholder="" class="form-control" value="<?= $_SESSION['gym']->latitude ?>" readonly required>
                                    <label for="label">latitude</label>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue" name="bedebah">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

<!-- END PAGE BASE CONTENT -->