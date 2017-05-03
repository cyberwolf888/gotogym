
<!-- START Social block -->
<div class="tm-block tm-block-social">
    <div class="uk-container uk-container-center">
        <div class="uk-panel ak-social">
            <ul class="uk-subnav uk-subnav-line uk-text-center">
                <li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
                <li><a href="https://twitter.com/" target="_blank">Twitter</a></li>
                <li><a href="http://instagram.com/" target="_blank">Instagram</a></li>
                <li><a href="https://plus.google.com/" target="_blank">Google+</a></li>
                <li><a href="https://www.linkedin.com/" target="_blank">Linkedin</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- END Social block -->

<!-- START Footer block -->
<div class="ak-footer" style="padding: 10px 0;">
    <div class="uk-container uk-container-center">
        <footer class="tm-footer uk-grid tm-footer uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="" style="margin-bottom: 0; margin-top: 0;">
            <!-- START Footer About MaxxFitness block -->
            <div class="uk-hidden-small uk-hidden-medium uk-width-large-1-3" style="margin-bottom: 0; margin-top: 0;">
                <div class="uk-panel uk-hidden-medium uk-hidden-small" style="margin-bottom: 0; margin-top: 0;">
                    <div class="ak-copyright">©GO TO GYM  2017</div>
                </div>
            </div>
            <!-- END Footer About MaxxFitness block -->

        </footer>
    </div>
</div>
<!-- END Footer block -->

</div>

<script src="<?= URL;?>assets/frontend/js/jquery.min.js" type="text/javascript"></script><!-- jQuery v1.11.2 -->
<script src="<?= URL;?>assets/frontend/js/bootstrap.min.js" type="text/javascript"></script><!-- Bootstrap.js Custom version for HTML! -->

<!-- UIkit Version 2.19.0 -->
<script src="<?= URL;?>assets/frontend/js/uikit/js/uikit.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/components/slideshow.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/components/slideshow-fx.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/core/cover.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/core/modal.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/components/lightbox.js" type="text/javascript"></script>

<!-- Animated circular progress bars -->
<script src="<?= URL;?>assets/frontend/js/circle-progress.js" type="text/javascript"></script>

<!-- START Schedule block -->
<script src="<?= URL;?>assets/frontend/js/jquery.mousewheel.js" type="text/javascript"></script><!-- Uses for Schedule -->
<script src="<?= URL;?>assets/frontend/js/jquery.jscrollpane.min.js" type="text/javascript"></script><!-- Uses for Schedule -->
<!-- END Schedule block -->

<!-- Template scripts -->
<script src="<?= URL;?>assets/frontend/js/script.js" type="text/javascript"></script>

<?php
if(isset($plugin_script)){
    require $plugin_script;
}
?>

<?php
if(isset($page_script)){
    require $page_script;
}
?>
</body>

</html>