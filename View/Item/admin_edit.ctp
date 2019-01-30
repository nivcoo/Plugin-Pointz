<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('POINTS__MODIFY_ITEM') ?> </h3>
        </div>
        <div class="box-body">
          <form action="<?= $this->Html->url(array('controller' => 'item', 'action' => 'add')) ?>" method="post" data-ajax="true" data-redirect-url="<?= $this->Html->url(array('controller' => 'item', 'action' => 'index', 'admin' => true)) ?>">

            <div class="ajax-msg"></div>

            <div class="form-group">
              <label><?= $Lang->get('POINTS__ITEM_LIST') ?></label>
              <select class="form-control" name="item_id">
                <?php foreach ($search_items as $v) { ?>
                    <option value="<?= $v['Items']['id'] ?>" <?= ($getItem['PointsItem']['item_id'] == $v['Items']['id']) ? 'selected' : '' ?>><?= $v['Items']['name'] ?></option>
                <?php } ?>
              </select>
            </div>
            
            <div class="form-group">
              <label><?= $Lang->get('POINTS__ITEM_PRICEIG') ?></label>
              <input name="price_ig" value="<?= $getItem['PointsItem']['price_ig'] ?>" class="form-control" type="text">
            </div>
            
            
            <div class="form-group">
              <label><?= $Lang->get('POINTS__ITEM_ICON') ?></label>
              <input name="icon" value="<?= $getItem['PointsItem']['icon'] ?>" class="form-control" type="text">
            </div>
            
			
            <div class="pull-right">
              <a href="<?= $this->Html->url(array('controller' => 'item', 'action' => 'index', 'admin' => true)) ?>" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
              <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
