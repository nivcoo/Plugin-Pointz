<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?= $Lang->get('POINTZ__ADD_ITEM') ?> &nbsp;&nbsp;<a href="<?= $this->Html->url(array('controller' => 'item', 'action' => 'add', 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>
				</div>
				<div class="box-body">

					<table class="table table-bordered dataTable">
						<thead>
							<tr>
								<th><?= $Lang->get('POINTZ__ITEM_NAME') ?></th>
                                <th><?= $Lang->get('POINTZ__ITEM_PRICE') ?></th>
								<th><?= $Lang->get('POINTZ__ITEM_PRICEIG') ?></th>
								<th><?= $Lang->get('POINTZ__ITEM_ICON') ?></th>
								<th class="right"></th>
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($getItems)) { ?>
                                <?php foreach ($getItems as $v) { ?>
                                    <tr>
                                        <td><?= $itemName[$v['PointzItem']['id']]['name'] ?></td>
                                        <td><?= $itemName[$v['PointzItem']['id']]['price'] ?></td>
                                        <td><?= $v['PointzItem']["price_ig"] ?></td>
                                        <td><?= $v['PointzItem']["icon"] ?></td>
                                        <td class="right">
                                            <a href="<?= $this->Html->url(array('controller' => 'item', 'action' => 'edit/'.$v['PointzItem']["id"], 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                                            <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'item', 'action' => 'delete/'.$v['PointzItem']["id"], 'admin' => true, 'plugin' => 'pointz')) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</section>
