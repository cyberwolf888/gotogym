<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Category
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
        <a href="<?= URL ?>admin/facility">Facility</a>
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
                <form action=" <?= isset($model) ? URL.'admin/process_edit_facility/'.$model->id : URL.'admin/process_create_facility' ?>" method="post">
                    <div class="form-body">

                        <div class="form-group form-md-line-input">
                            <input type="text" name="label" id="label" placeholder="" class="form-control" value="<?= isset($model) ? $model->label : null ?>" required>
                            <label for="label">Label Category</label>
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