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
                    <span class="caption-subject font-green sbold uppercase">Manage Images</span>
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
                <div class="row zoom-gallery">
                    <?php foreach ($model as $key=>$row): ?>
                        <div class="col-md-3" style="margin-bottom: 15px;">
                            <a href="<?= URL.'img/gym/'.$row->file ?>" data-source="<?= URL.'img/gym/'.$row->file ?>">
                                <img src="<?= URL.'img/gym/thumb_'.$row->file ?>" class="img-responsive" style="margin-bottom: 5px;">
                            </a>

                            <button class="btn btn-danger btn-small" onclick="window.location='<?= URL.'operator/delete_images/'.$row->id ?>'"><i class="fa fa-trash"></i>Delete</button>
                            <!-- <a class="btn btn-danger btn-small" href="<?= URL.'operator/delete_images/'.$row->id ?>"><i class="fa fa-trash"></i>Delete</a> -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div> <!-- end portlet-body -->
        </div>
        <!-- End: life time stats -->
    </div>
</div>

<!-- END PAGE BASE CONTENT -->