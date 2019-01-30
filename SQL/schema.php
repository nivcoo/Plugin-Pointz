<?php
class PointsAppSchema extends CakeSchema
{
	public $file = 'schema.php';

	public function before($event = [])
	{
		return true;
	}

	public function after($event = [])
	{
	}
	
	public $points__configurations = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
		'name_shop' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => false],
		'name_gui' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => false],
	];
    
    public $points__offers = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
		'name' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'unsigned' => false],
		'icon' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
        'price' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
        'price_ig' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
		'lores' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
        'commands' => ['type' => 'string', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false],
	];
    
    public $points__items = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => false, 'key' => 'primary'],
		'item_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
		'price_ig' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
        'icon' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'unsigned' => false],
	];
}
