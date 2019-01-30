<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('POINTS__ADD_OFFER') ?></h3>
        </div>
        <div class="box-body">
          <form action="<?= $this->Html->url(array('controller' => 'offer', 'action' => 'add')) ?>" method="post" data-ajax="true" data-redirect-url="<?= $this->Html->url(array('controller' => 'offer', 'action' => 'index', 'admin' => true)) ?>">

            <div class="ajax-msg"></div>

            <div class="form-group">
              <label><?= $Lang->get('POINTS__OFFER_NAME') ?></label>
              <input name="name" class="form-control" type="text">
            </div>
            
            <div class="form-group">
              <label><?= $Lang->get('POINTS__ITEM_ICON') ?></label>
              <input name="icon" class="form-control" type="number">
            </div>
            
            <div class="form-group">
              <label><?= $Lang->get('POINTS__OFFER_PRICE') ?></label>
              <input name="price" class="form-control" type="number">
            </div>
            
            <div class="form-group">
              <label><?= $Lang->get('POINTS__ITEM_PRICEIG') ?></label>
              <input name="price_ig" class="form-control" type="number">
            </div>
            
             <div class="form-group">
                <label><?= $Lang->get('POINTS__OFFER_LORE') ?></label>
                <div class="input-group">
                    <input name="lores[0]" class="form-control" type="text">
                    <div class="input-group-btn">
                        <button data-j="1" type="button" id="addLore" class="btn btn-success"><?= $Lang->get('POINTS__ADD_OFFER') ?></button>
                    </div>
                </div>
                <div class="addLore"></div>
            </div>

            <div class="form-group">
                <label><?= $Lang->get('POINTS__OFFER_COMMANDS') ?></label>
                <div class="input-group">
                    <input name="commands[0]" class="form-control" type="text">
                    <div class="input-group-btn">
                        <button data-i="1" type="button" id="addCommand" class="btn btn-success"><?= $Lang->get('SHOP__ITEM_ADD_COMMAND') ?></button>
                    </div>
                </div>
                <div class="addCommand"></div>
                <small><b>{PLAYER}</b> = Pseudo <br><b><?= $Lang->get('GLOBAL__EXAMPLE') ?>:</b> <i>give {PLAYER} 1 1</i></small>
            </div>
            
            <div class="pull-right">
              <a href="<?= $this->Html->url(array('controller' => 'offer', 'action' => 'index', 'admin' => true)) ?>" class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
              <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

  $('#addCommand').on('click', function(e) {

    e.preventDefault();

    var i = parseInt($(this).attr('data-i'));

    var input = '';
    input += '<div style="margin-top:5px;" class="input-group" id="'+i+'">';
      input += '<input name="commands['+i+']" class="form-control" type="text">';
      input += '<span class="input-group-btn">';
        input += '<button class="btn btn-danger delete-cmd" data-id="'+i+'" type="button"><span class="fa fa-close"></span></button>';
      input += '</span>';
    input + '</div>';

    i++;

    $(this).attr('data-i', i);

    $('.addCommand').append(input);

    $('.delete-cmd').unbind('click');
    $('.delete-cmd').on('click', function(e) {

      var id = $(this).attr('data-id');

      $('#'+id).slideUp(150, function() {
        $('#'+id).remove();
      });
    });

  });

  $('.delete-cmd').on('click', function(e) {

    var id = $(this).attr('data-id');

    $('#'+id).slideUp(150, function() {
      $('#'+id).remove();
    });
  });
  
  $('#addLore').on('click', function(e) {

    e.preventDefault();

    var j = parseInt($(this).attr('data-j'));

    var input = '';
    input += '<div style="margin-top:5px;" class="input-group" id="lore-'+j+'">';
      input += '<input name="lores['+j+']" class="form-control" type="text">';
      input += '<span class="input-group-btn">';
        input += '<button class="btn btn-danger delete-lore" data-id2="'+j+'" type="button"><span class="fa fa-close"></span></button>';
      input += '</span>';
    input + '</div>';

    j++;

    $(this).attr('data-j', j);

    $('.addLore').append(input);

    $('.delete-lore').unbind('click');
    $('.delete-lore').on('click', function(e) {

      var id = $(this).attr('data-id2');

      $('#lore-'+id).slideUp(150, function() {
        $('#lore-'+id).remove();
      });
    });

  });

  $('.delete-lore').on('click', function(e) {

    var id = $(this).attr('data-id2');

    $('#lore-'+id).slideUp(150, function() {
      $('#lore-'+id).remove();
    });
  });

</script>
