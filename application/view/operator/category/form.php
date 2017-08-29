<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Facility
            <small>Create</small>
        </h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= URL ?>operator">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= URL ?>operator/category">Category</a>
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
                <form action=" <?= URL.'operator/process_create_category' ?>" method="post">
                    <div class="form-body">
                        <?php if(isset($_SESSION['failed'])): ?>
                        <div class="alert alert-danger">Category ini sudah ada dalam daftar.</div>
                        <?php unset($_SESSION['failed']);endif; ?>

                        <div class="form-group form-md-line-input">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <?php $category = new \Mini\Model\Category(); ?>
                                <?php foreach ($category->getAll() as $row): ?>
                                <option value="<?= $row->id ?>"><?= $row->label ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="category_id">Category</label>
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