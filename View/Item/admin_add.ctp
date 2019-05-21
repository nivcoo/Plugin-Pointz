<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('POINTZ__ADD_ITEM') ?> </h3>
        </div>
        <div class="box-body">
          <form action="<?= $this->Html->url(array('controller' => 'item', 'action' => 'add')) ?>" method="post" data-ajax="true" data-redirect-url="<?= $this->Html->url(array('controller' => 'item', 'action' => 'index', 'admin' => true)) ?>">

            <div class="ajax-msg"></div>

            <div class="form-group">
              <label><?= $Lang->get('POINTZ__ITEM_LIST') ?></label>
              <select class="form-control" name="item_id">
                <?php foreach ($search_items as $v) { ?>
                    <option value="<?= $v['Items']['id'] ?>"><?= $v['Items']['name'] ?></option>
                <?php } ?>
              </select>
            </div>
            
            <div class="form-group">
              <label><?= $Lang->get('POINTZ__ITEM_PRICEIG') ?></label>
              <input name="price_ig" class="form-control" type="text">
            </div>
            
            
            <div class="form-group">
              <label><?= $Lang->get('POINTZ__ITEM_ICON') ?></label>
              <input name="icon" class="form-control" type="text">
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
