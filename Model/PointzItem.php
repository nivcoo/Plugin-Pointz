<?php
class PointzItem extends PointzAppModel
{
    public $useTable = "items";
    public function edit($id, $item_id, $price_ig, $icon)
    {
		$item_id = $this->getDataSource()->value($item_id, 'integer');
        $price_ig = $this->getDataSource()->value($price_ig, 'integer');
		$icon = $this->getDataSource()->value($icon, 'integer');
		
		return $this->updateAll([
			'item_id' => $item_id,
            'price_ig' => $price_ig,
            'icon' => $icon
		], ['id' => $id]);
	}
    
    public function add($item_id, $price_ig, $icon)
    {
        $this->create();
        $this->set(array(
            'item_id' => $item_id,
            'price_ig' => $price_ig,
            'icon' => $icon
        ));
        $this->save();
	}
}