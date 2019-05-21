<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('POINTZ__CONFIG') ?></h3>
        </div>
        <div class="box-body">
          <form action="" method="post" data-ajax="true" data-redirect-url="<?= $this->Html->url(array('controller' => 'config', 'action' => 'index', 'admin' => true)) ?>">

            <div class="ajax-msg"></div>
            
            <input type="hidden" name="id" value="<?= $configPointz["PointzConfig"]['id'] ?>">
            <div class="form-group">
              <label><?= $Lang->get('POINTZ__SHOPGUI') ?></label>
              <input name="name_shop" class="form-control" type="text" value="<?= $configPointz["PointzConfig"]['name_shop'] ?>">
            </div>
            
            <div class="form-group">
              <label><?= $Lang->get('POINTZ__GUI') ?></label>
              <input name="name_gui" class="form-control" type="text" value="<?= $configPointz["PointzConfig"]['name_gui'] ?>">
            </div>
			
            <div class="pull-right">
              <a href="<?= $this->Html->url(array('controller' => 'links', 'action' => 'index', 'admin' => true)) ?>" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
              <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
