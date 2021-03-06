<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>User Admin
            <small>Manage</small>
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
        <a href="<?= URL ?>admin/user_admin">User Admin</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Create</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-6">
        <!-- Begin: life time stats -->
        <div class="portlet light bordered">

            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> <?= isset($model) ? 'Edit Data' : 'Add New Data' ?></span>
                </div>
            </div>

            <div class="portlet-body form">
                <form action=" <?= isset($model) ? URL.'admin/process_edit_user_admin/'.$model->id : URL.'admin/process_create_user_admin' ?>" method="post">
                    <div class="form-body">

                        <?= $this->flash('error_user_admin') ?>

                        <div class="form-group form-md-line-input">
                            <input type="text" name="fullname" id="fullname" placeholder="" class="form-control" value="<?= isset($model) ? $model->fullname : null ?>" required>
                            <label for="fullname">Full Name</label>
                        </div>

                        <div class="form-group form-md-line-input">
                            <input type="text" name="username" id="username" placeholder="" class="form-control" value="<?= isset($model) ? $model->username : null ?>" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="form-group form-md-line-input">
                            <input type="password" name="password" id="password" placeholder="" class="form-control" value="" <?= isset($model) ? '' : 'required' ?>>
                            <label for="password">Password</label>
                        </div>

                        <div class="form-group form-md-line-input">
                            <input type="text" name="no_hp" id="no_hp" placeholder="" class="form-control" value="<?= isset($model) ? $model->no_hp : null ?>" required>
                            <label for="no_hp">No HP</label>
                        </div>

                        <div class="form-group form-md-line-input">
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" <?= isset($model) && $model->status == 1 ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= isset($model) && $model->status == 0 ? 'selected' : '' ?>>Suspend</option>
                            </select>
                            <label for="status">Status</label>
                        </div>


                    </div>

                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue" name="bedebah">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

<!-- END PAGE BASE CONTENT -->