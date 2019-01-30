<?php
class PointsOffer extends PointsAppModel
{
    public $useTable = "offers";
    public function edit($id, $name, $icon, $price, $price_ig, $lores, $commands)
    {
        
		$name = $this->getDataSource()->value($name, 'string');
		$icon = $this->getDataSource()->value($icon, 'integer');
        $price = $this->getDataSource()->value($price, 'integer');
		$price_ig = $this->getDataSource()->value($price_ig, 'integer');
        $lores = $this->getDataSource()->value($lores, 'string');
		$commands = $this->getDataSource()->value($commands, 'string');
		
		return $this->updateAll([
			'name' => $name,
            'icon' => $icon,
            'price' => $price,
            'price_ig' => $price_ig,
            'lores' => $lores,
            'commands' => $commands
		], ['id' => $id]);
	}
    
    public function add($name, $icon, $price, $price_ig, $lores, $commands)
    {
        $this->create();
        $this->set(array(
            'name' => $name,
            'icon' => $icon,
            'price' => $price,
            'price_ig' => $price_ig,
            'lores' => $lores,
            'commands' => $commands
        ));
        $this->save();
	}
}