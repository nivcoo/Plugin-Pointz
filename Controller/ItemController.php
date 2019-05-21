<?php

class ItemController extends PointzAppController
{
	
	public function admin_index()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            
            $this->loadModel('Pointz.PointzItem');
            $this->loadModel('Shop.Items');
           	$getItems = $this->PointzItem->find('all');
            foreach ($getItems as $v) {
                $itemName[$v['PointzItem']['id']] = $this->Items->find('first', array('conditions' => array('id' => $v['PointzItem']['item_id'])))['Items'];
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
            $this->loadModel('Pointz.PointzItem');
            $this->loadModel('Shop.Items');
            $search_items = $this->Items->find('all');
            if($this->request->is('ajax')) {
				$this->response->type('json');
				$this->autoRender = null;
				if (!empty($this->request->data['item_id']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['icon'])) {
                    $this->PointzItem->add(
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
            $this->loadModel('Pointz.PointzItem');
            $this->loadModel('Shop.Items');
            $search_items = $this->Items->find('all');
            $getItem = $this->PointzItem->find('first', array('conditions' => array('id' => $id)));
			if ($this->request->is('ajax')) {
                $this->autoRender = false;
				if (!empty($this->request->data['item_id']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['icon'])) {
                    $this->PointzItem->edit(
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
			$this->loadModel('Pointz.PointzItem');
            $this->autoRender = null;
            $this->PointzItem->delete($id);
            $this->redirect('/admin/pointz/item');
			
        } else {
            $this->redirect('/');
        }
    }
    
}