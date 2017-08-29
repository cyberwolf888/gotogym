<!-- START Central block -->
<div id='map_canvas' style="width: 100%;height: 300px;"></div>
<div class="uk-container uk-container-center">
    <div class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
        <div class="tm-main uk-width-medium-1-1">
            <main class="tm-content uk-position-relative">
                <!-- START breadcrumb block -->
                <ul class="uk-breadcrumb">
                    <li><a href="<?= URL ?>">Home</a></li>
                    <li class="uk-active"><span><?= $model->fullname ?></span></li>
                </ul>
                <!-- END breadcrumb block -->

                <div id="system-message-container"></div>


                <h1 style="margin-top: 0;margin-bottom: 0;"><?= $model->fullname ?></h1>
                <h4 style="margin-top: 10px;">
                    <?= $model->alamat ?>
                </h4>
                <!-- START Article Blog block -->
                <article class="uk-article">
                    <h3>
                        <?php
                            $category=new \Mini\Model\GymCategory();
                            $get_c = $category->getAll(['gym_id'=>$model->id]);
                            if(count($get_c)>0):
                                $print = "";
                                foreach ($get_c as $_c){
                                    $print.= \Mini\Model\Gym::getCategory($_c->category_id).', ';
                                }
                                echo substr($print, 0, -2);
                        ?>

                        <?php else: ?>
                            Operator belum memilih category
                        <?php endif; ?>
                    </h3>
                    <div>
                        <div class="uk-grid">
                            <div class="uk-width-6-10">
                                <p><?= $model->description ?></p>
                            </div>
                            <div class="uk-width-4-10">
                                <div class="uk-grid zoom-gallery" data-uk-grid-margin="">
                                    <?php $images = new \Mini\Model\Images(); foreach ($images->getAll(['gym_id'=>$model->id]) as $img): ?>
                                    <div class="uk-width-1-3">
                                        <a href="<?= URL.'img/gym/'.$img->file ?>" data-source="<?= URL.'img/gym/'.$img->file ?>">
                                        <img class="uk-thumbnail uk-float-right uk-margin-left" src="<?= URL.'img/gym/thumb_'.$img->file ?>" alt="workout-demo-1">
                                        </a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="uk-panel uk-width-1-1 tm-workouts-box nohover">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-2">
                                            <h6 class="tm-uppercase">PRICE</h6>
                                            <span class="tm-uppercase">Rp. <?= number_format($model->price, 0, ',', '.') ?></span>
                                        </div>
                                        <div class="uk-width-1-2">
                                            <h6 class="tm-uppercase">TELP</h6>
                                            <span class="tm-uppercase"><?= $model->telp ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <ul class="uk-list uk-list-line">
                                            <?php $facility = new \Mini\Model\GymFacility();foreach ($facility->manage($model->id) as $fcl): ?>
                                            <li><?= $fcl->label ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- END Article Blog block -->

            </main>
        </div>
    </div>
</div>
<!-- END Central block -->