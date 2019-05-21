<?php

class ConfigController extends PointzAppController
{
	
	public function admin_index()
	{
		if ($this->isConnected AND $this->User->isAdmin()) {
			$this->layout = 'admin';
            
            $this->loadModel('Pointz.PointzConfig');
           	$configPointz = $this->PointzConfig->find('first');
            if ($this->request->is('ajax')) {
                $this->autoRender = false;
                $this->response->type('json');
				if (!empty($this->request->data['name_shop']) AND !empty($this->request->data['name_gui'])) {
                    if ($this->request->data['id']) {
                        $this->PointzConfig->edit(
                            $this->request->data['id'],
                            $this->request->data['name_shop'],
                            $this->request->data['name_gui']
                        );
                    } else {
                        $this->PointzConfig->add(
                            $this->request->data['name_shop'],
                            $this->request->data['name_gui']
                        );
                    }
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('GLOBAL__SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
			} else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
			$this->set(compact('configPointz'));
		} else {
			$this->redirect('/');
		}
	}
    
}