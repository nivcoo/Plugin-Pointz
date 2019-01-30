<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?= $Lang->get('POINTS__ADD_ITEM') ?> &nbsp;&nbsp;<a href="<?= $this->Html->url(array('controller' => 'item', 'action' => 'add', 'admin' => true)) ?>" class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>
				</div>
				<div class="box-body">

					<table class="table table-bordered dataTable">
						<thead>
							<tr>
								<th><?= $Lang->get('POINTS__ITEM_NAME') ?></th>
                                <th><?= $Lang->get('POINTS__ITEM_PRICE') ?></th>
								<th><?= $Lang->get('POINTS__ITEM_PRICEIG') ?></th>
								<th><?= $Lang->get('POINTS__ITEM_ICON') ?></th>
								<th class="right"></th>
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($getItems)) { ?>
                                <?php foreach ($getItems as $v) { ?>
                                    <tr>
                                        <td><?= $itemName[$v['PointsItem']['id']]['name'] ?></td>
                                        <td><?= $itemName[$v['PointsItem']['id']]['price'] ?></td>
                                        <td><?= $v['PointsItem']["price_ig"] ?></td>
                                        <td><?= $v['PointsItem']["icon"] ?></td>
                                        <td class="right">
                                            <a href="<?= $this->Html->url(array('controller' => 'item', 'action' => 'edit/'.$v['PointsItem']["id"], 'admin' => true, 'plugin' => 'points')) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                                            <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'item', 'action' => 'delete/'.$v['PointsItem']["id"], 'admin' => true, 'plugin' => 'points')) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
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
