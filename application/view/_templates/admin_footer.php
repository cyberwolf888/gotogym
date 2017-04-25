</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?= date('Y') ?> &copy; Wawan Aditya</div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="<?= URL;?>/assets/backend/global/plugins/respond.min.js"></script>
<script src="<?= URL;?>/assets/backend/global/plugins/excanvas.min.js"></script>
<script src="<?= URL;?>/assets/backend/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= URL;?>/assets/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= URL;?>/assets/backend/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= URL;?>/assets/backend/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?= URL;?>/assets/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= URL;?>/assets/backend/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= URL;?>/assets/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php
    if(isset($plugin_script)){
        require $plugin_script;
    }
?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= URL;?>/assets/backend/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php
if(isset($page_script)){
    require $page_script;
}
?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= URL;?>/assets/backend/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= URL;?>/assets/backend/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(".quick-sidebar-toggler").click(function () {
        window.location = "#";
    })
</script>
</body>
</html>