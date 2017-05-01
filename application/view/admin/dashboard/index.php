<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Dashboard
            <small>Admin</small>
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
<div class="row widget-row">
    <div class="col-md-6">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">Total Facility</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-red icon-layers"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Unit</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?= $count_facility ?>">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
    <div class="col-md-6">
        <!-- BEGIN WIDGET THUMB -->
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4 class="widget-thumb-heading">Total Operator</h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                <div class="widget-thumb-body">
                    <span class="widget-thumb-subtitle">Gym</span>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?= $count_operator ?>">0</span>
                </div>
            </div>
        </div>
        <!-- END WIDGET THUMB -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Last 5 New Operator</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th> No </th>
                            <th> Full Name </th>
                            <th> No HP </th>
                            <th> Account Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no =1 ?>
                        <?php foreach($user->getLastOperator() as $row): ?>
                            <tr>
                                <td width="30"> <?= $no ?> </td>
                                <td> <?= $row->fullname ?> </td>
                                <td> <?= $row->no_hp ?> </td>
                                <td> <?= $row->status == 1 ? 'Active' : 'Suspend' ?> </td>
                                <td class="center" width="150" >
                                    <a href="<?= URL ?>admin/show_user_operator/<?= $row->id ?>" class="btn green-steel btn-xs"><i class="fa fa-eye"></i></a>
                                    <a href="<?= URL ?>admin/edit_user_operator/<?= $row->id ?>" class="btn yellow-saffron btn-xs"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->