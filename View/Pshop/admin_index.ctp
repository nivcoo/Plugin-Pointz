<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header with-border">
					<h3 class="card-title"><?= $Lang->get('POINTZ__ADD_ITEM') ?> &nbsp;&nbsp;<a href="<?= $this->Html->url(array('controller' => 'pshop', 'action' => 'add', 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>
				</div>
				<div class="card-body">

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
                            <?php if(!empty($getItemsShop)) { ?>
                                <?php foreach ($getItemsShop as $v) { ?>
                                    <tr>
                                        <td><?= $itemName[$v['PointzItemsShop']['id']]['name'] ?></td>
                                        <td><?= $itemName[$v['PointzItemsShop']['id']]['price'] ?></td>
                                        <td><?= $v['PointzItemsShop']["price_ig"] ?></td>
                                        <td><?= $v['PointzItemsShop']["icon"] ?></td>
                                        <td class="right">
                                            <a href="<?= $this->Html->url(array('controller' => 'pshop', 'action' => 'edit/'.$v['PointzItemsShop']["id"], 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                                            <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'pshop', 'action' => 'delete/'.$v['PointzItemsShop']["id"], 'admin' => true, 'plugin' => 'pointz')) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
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
