<!-- START Central block -->
<div class="uk-container uk-container-center">
    <div class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
        <div class="tm-main uk-width-medium-1-1">
            <main class="tm-content uk-position-relative">
                <!-- START breadcrumb block -->
                <ul class="uk-breadcrumb">
                    <li><a href="<?= URL ?>">Home</a></li>
                    <li class="uk-active"><span>Search</span></li>
                </ul>
                <!-- END breadcrumb block -->

                <!-- Filter Box -->
                <div class="uk-grid">
                    <div class="uk-width-1-4">
                        <div class="uk-panel uk-panel-box">
                            <h3 class="uk-panel-title"><i class="uk-icon-bullhorn"></i> Search Sorting</h3>
                            <select name="sorting" id="#sorting" class="sorting">
                                <option value="1">Termurah</option>
                                <option value="2">Termahal</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-width-3-4">
                        <div class="uk-panel uk-panel-box">
                            <h3 class="uk-panel-title"><i class="uk-icon-bullhorn"></i> Search Filter</h3>
                            <div class="uk-grid">
                                <?php $facility = new \Mini\Model\Facility(); ?>
                                <?php foreach ($facility->getAll() as $f): ?>
                                    <div class="uk-width-1-6">
                                        <input type="checkbox" name="facility" value="<?= $f->id ?>" id="facil_<?= $f->id ?>" onclick="insertFacility(<?= $f->id ?>)"> <?= $f->label ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Box -->
                <div id="system-message-container"></div>


                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div class="uk-panel uk-panel-header">
                            <h1 class="tm-title">Search Result For "<?= $_GET['keyword'] ?>"</h1>
                        </div>
                    </div>
                </div>

                <!-- START Article Blog block -->
                <div class="uk-grid" data-uk-grid-match="" data-uk-grid-margin="" id="result" >

                    <?php foreach ($search as $row): ?>
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
                                <h4 class="tm-workouts-line tm-uppercase"><?= \Mini\Model\Gym::getCategory($row->category_id) ?></h4>
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
                <div id="loading" style="display: none;">
                    <br><br>
                    <center><h3>Loading....</h3></center>
                </div>
                <!-- END Article Blog block -->
            </main>
        </div>
    </div>
</div>
<!-- END Central block -->