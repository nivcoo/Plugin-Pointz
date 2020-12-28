<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title"><?= $Lang->get('POINTZ__MODIFY_ITEM') ?> </h3>
                </div>
                <div class="card-body">
                    <form action="<?= $this->Html->url(array('controller' => 'pshop', 'action' => 'edit/'.$id)) ?>" method="post" data-ajax="true" data-redirect-url="<?= $this->Html->url(array('controller' => 'pshop', 'action' => 'index', 'admin' => true)) ?>">

                        <div class="ajax-msg"></div>

                        <div class="form-group">
                            <label><?= $Lang->get('POINTZ__ITEM_LIST') ?></label>
                            <select class="form-control" name="item_id">
                                <?php foreach ($search_items as $v) { ?>
                                    <option value="<?= $v['Items']['id'] ?>" <?= ($getItemShop['PointzItemsShop']['item_id'] == $v['Items']['id']) ? 'selected' : '' ?>><?= $v['Items']['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?= $Lang->get('POINTZ__ITEM_PRICEIG') ?></label>
                            <input name="price_ig" value="<?= $getItemShop['PointzItemsShop']['price_ig'] ?>" class="form-control" type="text">
                        </div>


                        <div class="form-group">
                            <label><?= $Lang->get('POINTZ__ITEM_ICON') ?></label>
                            <input name="icon" value="<?= $getItemShop['PointzItemsShop']['icon'] ?>" class="form-control" type="text">
                        </div>


                        <div class="float-right">
                            <a href="<?= $this->Html->url(array('controller' => 'pshop', 'action' => 'index', 'admin' => true)) ?>" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                            <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
