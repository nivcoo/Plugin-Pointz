<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title"><?= $Lang->get('POINTZ__ADD_OFFER') ?> &nbsp;&nbsp;<a href="<?= $this->Html->url(array('controller' => 'offer', 'action' => 'add', 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-success"><?= $Lang->get('GLOBAL__ADD') ?></a></h3>
				</div>
				<div class="box-body">

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
                            <?php if(!empty($getOffers)) { ?>
                                <?php foreach ($getOffers as $v) { ?>
                                    <tr>
                                        <td><?= $v["PointzOffer"]["name"] ?></td>
                                        <td><?= $v["PointzOffer"]["icon"] ?></td>
                                        <td><?= $v["PointzOffer"]["price"] ?></td>
                                        <td><?= $v["PointzOffer"]["price_ig"] ?></td>
                                        <td><?= $v["PointzOffer"]["lores"] ?></td>
                                        <td><?= $v["PointzOffer"]["commands"] ?></td>
                                        <td class="right">
                                            <a href="<?= $this->Html->url(array('controller' => 'offer', 'action' => 'edit/'.$v["PointzOffer"]["id"], 'admin' => true, 'plugin' => 'pointz')) ?>" class="btn btn-info"><?= $Lang->get('GLOBAL__EDIT') ?></a>
                                            <a onClick="confirmDel('<?= $this->Html->url(array('controller' => 'offer', 'action' => 'delete/'.$v["PointzOffer"]["id"], 'admin' => true, 'plugin' => 'pointz')) ?>')" class="btn btn-danger"><?= $Lang->get('GLOBAL__DELETE') ?></a>
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
