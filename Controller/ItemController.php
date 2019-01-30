<?php

class ItemController extends PointsAppController
{
	
	public function admin_index()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            
            $this->loadModel('Points.PointsItem');
            $this->loadModel('Shop.Items');
           	$getItems = $this->PointsItem->find('all');
            foreach ($getItems as $v) {
                $itemName[$v['PointsItem']['id']] = $this->Items->find('first', array('conditions' => array('id' => $v['PointsItem']['item_id'])))['Items'];
            }
            $this->set(compact('getItems', 'itemName'));
			
		} else {
			$this->redirect('/');
		}
	}
    
    public function admin_add()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            $this->loadModel('Points.PointsItem');
            $this->loadModel('Shop.Items');
            $search_items = $this->Items->find('all');
            if($this->request->is('ajax')) {
				$this->response->type('json');
				$this->autoRender = null;
				if (!empty($this->request->data['item_id']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['icon'])) {
                    $this->PointsItem->add(
                        $this->request->data['item_id'],
                        $this->request->data['price_ig'],
                        $this->request->data['icon']
                    );
					$this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('GLOBAL__SUCCESS'))));
				} else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
			} else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
            $this->set(compact('search_items'));
			
		} else {
			$this->redirect('/');
		}
	}
    
    public function admin_edit($id)
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            $this->loadModel('Points.PointsItem');
            $this->loadModel('Shop.Items');
            $search_items = $this->Items->find('all');
            $getItem = $this->PointsItem->find('first', array('conditions' => array('id' => $id)));
			if ($this->request->is('ajax')) {
                $this->autoRender = false;
				if (!empty($this->request->data['item_id']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['icon'])) {
                    $this->PointsItem->edit(
                        $this->request->data['id'],
                        $this->request->data['item_id'],
                        $this->request->data['price_ig'],
                        $this->request->data['icon']
                    );
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('GLOBAL__SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
			} else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
			$this->set(compact('getItem', 'search_items'));
		} else {
			$this->redirect('/');
		}
	}
    
    public function admin_delete($id)
	{
        if($this->isConnected AND $this->User->isAdmin())
		{
			$this->loadModel('Points.PointsItem');
            $this->autoRender = null;
            $this->PointsItem->delete($id);
            $this->redirect('/admin/points/item');
			
        } else {
            $this->redirect('/');
        }
    }
    
}