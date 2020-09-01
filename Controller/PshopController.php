<?php

class PshopController extends PointzAppController
{
	
	public function admin_index()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            
            $this->loadModel('Pointz.PointzItemsShop');
            $this->loadModel('Shop.Items');
           	$getItemsShop = $this->PointzItemsShop->find('all');
            foreach ($getItemsShop as $v) {
                $itemName[$v['PointzItemsShop']['id']] = $this->Items->find('first', array('conditions' => array('id' => $v['PointzItemsShop']['item_id'])))['Items'];
            }
            $this->set(compact('getItemsShop', 'itemName'));
			
		} else {
			$this->redirect('/');
		}
	}
    
    public function admin_add()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            $this->loadModel('Pointz.PointzItemsShop');
            $this->loadModel('Shop.Items');
            $search_items = $this->Items->find('all');
            if($this->request->is('ajax')) {
				$this->response->type('json');
				$this->autoRender = null;
				if (!empty($this->request->data['item_id']) AND !empty($this->request->data['icon'])) {
                    $this->PointzItemsShop->add(
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
    
    public function admin_edit($id = false)
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            $this->loadModel('Pointz.PointzItemsShop');
            $this->loadModel('Shop.Items');
            $search_items = $this->Items->find('all');
            $getItemShop = $this->PointzItemsShop->find('first', array('conditions' => array('id' => $id)));
			if ($this->request->is('ajax')) {
                $this->autoRender = false;
				if (!empty($this->request->data['item_id']) AND !empty($this->request->data['icon'])) {
                    $this->PointzItemsShop->edit(
                        $id,
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
			$this->set(compact('getItemShop', 'search_items', 'id'));
		} else {
			$this->redirect('/');
		}
	}
    
    public function admin_delete($id)
	{
        if($this->isConnected AND $this->User->isAdmin())
		{
			$this->loadModel('Pointz.PointzItemsShop');
            $this->autoRender = null;
            $this->PointzItemsShop->delete($id);
            $this->redirect('/admin/pointz/pshop');
			
        } else {
            $this->redirect('/');
        }
    }
    
}