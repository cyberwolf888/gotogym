<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Images
            <small>Manage</small>
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
        <a href="<?= URL ?>operator/images">Images</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Manage</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">Manage Facility</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided">
                        <a href="<?= URL ?>operator/create_images" class="btn btn-circle green">
                            <i class="fa fa-plus"></i> Add new data
                        </a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <?php $line = 0; foreach ($model as $key=>$row): ?>
                    <?php if($key == $line): ?>
                        <div class="row">
                    <?php  $line+=3; endif; ?>
                            <div class="col-md-3">
                                <img src="<?= URL.'img/gym/thumb_'.$row->file ?>" class="img-responsive">
                            </div>
                    <?php if($key == $line): ?>
                        <div class="row">
                    <?php $line+=3;endif; ?>
                <?php endforeach; ?>
            </div> <!-- end portlet-body -->
        </div>
        <!-- End: life time stats -->
    </div>
</div>

<!-- END PAGE BASE CONTENT -->