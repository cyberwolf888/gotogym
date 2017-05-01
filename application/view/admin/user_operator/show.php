<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>User Operator
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
        <a href="<?= URL ?>admin/user_operator">User Operator</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Detail</span>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE BASE CONTENT -->
<?php if($gym->alamat != ''): ?>
<div class="row">
    <div class="col-md-12">
        <div id='map_canvas' style="width: 100%;height: 300px;"></div>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">Detail Operator</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered m-n" cellspacing="0">
                            <tbody>
                            <tr>
                                <td>
                                    <h4><small>Full Name</small></h4>
                                    <h4><?= $gym->fullname ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><small>Category</small></h4>
                                    <h4><?= \Mini\Model\Gym::getCategory($gym->category_id) ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><small>Telp</small></h4>
                                    <h4><?= $gym->telp ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><small>Description</small></h4>
                                    <h4><?= $gym->description ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><small>Price</small></h4>
                                    <h4><?= $gym->price ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><small>Status</small></h4>
                                    <h4><?= $gym->status == 3 ? \Mini\Model\Gym::getStatus($gym->status) : \Mini\Model\Users::getStatus($model->status) ?></h4>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <table class="table table-bordered m-n" cellspacing="0">
                            <tbody>
                            <tr>
                                <td>
                                    <h4><small>Alamat</small></h4>
                                    <h4><?= $gym->alamat ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><small>Longitude</small></h4>
                                    <h4><?= $gym->longitude ?></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><small>Latitude</small></h4>
                                    <h4><?= $gym->latitude ?></h4>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

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
                </div>
            </div>
            <div class="portlet-body">
                <div class="row zoom-gallery">
                    <?php foreach ($images->getAll(['gym_id'=>$gym->id]) as $key=>$row): ?>
                        <div class="col-md-3" style="margin-bottom: 15px;">
                            <a href="<?= URL.'img/gym/'.$row->file ?>" data-source="<?= URL.'img/gym/'.$row->file ?>">
                                <img src="<?= URL.'img/gym/thumb_'.$row->file ?>" class="img-responsive" style="margin-bottom: 5px;">
                            </a>
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