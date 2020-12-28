<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header with-border">
					<h3 class="card-title"><?= $Lang->get('POINTZ__ADD_OFFER') ?> &nbsp;&nbsp;<a href="<?= $this->Html->url(array('controller' => 'pconverter', 'action' => 'add', 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>
				</div>
				<div class="card-body">

					<table class="table table-bordered dataTable">
						<thead>
							<tr>
								<th><?= $Lang->get('POINTZ__OFFER_NAME') ?></th>
								<th><?= $Lang->get('POINTZ__ITEM_ICON') ?></th>
								<th><?= $Lang->get('POINTZ__OFFER_PRICE') ?></th>
								<th><?= $Lang->get('POINTZ__ITEM_PRICEIG') ?></th>
                                <th><?= $Lang->get('POINTZ__OFFER_LORE') ?></th>
								<th><?= $Lang->get('POINTZ__OFFER_COMMANDS') ?></th>
								<th class="right"></th>
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($getItemsConverter)) { ?>
                                <?php foreach ($getItemsConverter as $v) { ?>
                                    <tr>
                                        <td><?= $v["PointzItemsConverter"]["name"] ?></td>
                                        <td><?= $v["PointzItemsConverter"]["icon"] ?></td>
                                        <td><?= $v["PointzItemsConverter"]["price"] ?></td>
                                        <td><?= $v["PointzItemsConverter"]["price_ig"] ?></td>
                                        <td><?= $v["PointzItemsConverter"]["lores"] ?></td>
                                        <td><?= $v["PointzItemsConverter"]["commands"] ?></td>
                                        <td class="right">
                                            <a href="<?= $this->Html->url(array('controller' => 'pconverter', 'action' => 'edit/'.$v["PointzItemsConverter"]["id"], 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                                            <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'pconverter', 'action' => 'delete/'.$v["PointzItemsConverter"]["id"], 'admin' => true, 'plugin' => 'pointz')) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
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
