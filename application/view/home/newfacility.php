<!-- START Central block -->
<div class="uk-container uk-container-center">
    <div class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
        <div class="tm-main uk-width-medium-1-1">
            <main class="tm-content uk-position-relative">
                <!-- START breadcrumb block -->
                <ul class="uk-breadcrumb">
                    <li><a href="<?= URL ?>">Home</a></li>
                    <li class="uk-active"><span>New Facility</span></li>
                </ul>
                <!-- END breadcrumb block -->

                <div id="system-message-container"></div>


                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div class="uk-panel uk-panel-header">
                            <h1 class="tm-title">New Facility</h1>
                        </div>
                    </div>
                </div>

                <!-- START Article Blog block -->
                <div class="uk-grid" data-uk-grid-match="" data-uk-grid-margin="">

                    <?php foreach ($model as $row): ?>
                        <?php $image = \Mini\Model\Gym::getImage($row->id); ?>
                        <div class="uk-width-medium-1-3">
                            <!-- START Workout-1 block -->
                            <article class="uk-article">
                                <a class="uk-align-left" href="<?= URL.'home/detail/'.$row->id ?>" title=""><img src="<?= $image == '' ? URL.'img/noimagefound2.jpg' : URL.'img/gym/'.$image ?>" alt=""></a>
                                <div>
                                    <div class="uk-panel uk-width-1-1">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-2">
                                                <h6 class="tm-uppercase">Price</h6>
                                                <span class="tm-uppercase">Rp. <?= number_format($row->price, 0, ',', '.') ?></span>
                                            </div>
                                            <div class="uk-width-1-2">
                                                <h6 class="tm-uppercase">Telp</h6>
                                                <span class="tm-uppercase"><?= $row->telp ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="tm-workouts-line tm-uppercase"><?php
                                        $category=new \Mini\Model\GymCategory();
                                        $get_c = $category->getAll(['gym_id'=>$row->id]);
                                        if(count($get_c)>0):
                                            $print = "";
                                            foreach ($get_c as $_c){
                                                $print.= \Mini\Model\Gym::getCategory($_c->category_id).', ';
                                            }
                                            echo substr($print, 0, -2);
                                            ?>

                                        <?php else: ?>
                                            Operator belum memilih category
                                        <?php endif; ?></h4>
                                    <h3 class="tm-workouts-subline tm-uppercase"><?= $row->fullname ?></h3>
                                    <div class="jcomments-links">
                                        <a class="readmore-link" href="<?= URL.'home/detail/'.$row->id ?>" title="5 Unique Workauts to Improve your Deadlift">Read more ...</a>
                                    </div>
                                </div>
                            </article>
                            <!-- END Workout-1 block -->
                        </div>
                    <?php endforeach; ?>

                </div>
                <!-- END Article Blog block -->
            </main>
        </div>
    </div>
</div>
<!-- END Central block -->