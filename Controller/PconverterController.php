<?php

class PconverterController extends PointzAppController
{

    public function admin_index()
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';

            $this->loadModel('Pointz.PointzItemsConverter');
            $getItemsConverter = $this->PointzItemsConverter->find('all');
            $this->set(compact('getItemsConverter'));

        } else {
            $this->redirect('/');
        }
    }

    public function admin_add()
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';
            $this->loadModel('Pointz.PointzItemsConverter');
            $this->loadModel('Shop.Items');
            if ($this->request->is('ajax')) {
                $this->response->type('json');
                $this->autoRender = null;
                if (!empty($this->request->data['name']) AND !empty($this->request->data['icon']) AND !empty($this->request->data['price']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['lores']) AND !empty($this->request->data['commands'])) {
                    $commands = implode('[{+}]', $this->request->data['commands']);
                    $lores = implode('[{+}]', $this->request->data['lores']);
                    $this->PointzItemsConverter->add(
                        $this->request->data['name'],
                        $this->request->data['icon'],
                        $this->request->data['price'],
                        $this->request->data['price_ig'],
                        $lores,
                        $commands
                    );
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('GLOBAL__SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }

        } else {
            $this->redirect('/');
        }
    }

    public function admin_edit($id)
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';
            $this->loadModel('Pointz.PointzItemsConverter');
            $getItemsConverter = $this->PointzItemsConverter->find('first', array('conditions' => array('id' => $id)));
            $commands = $getItemsConverter['PointzItemsConverter']['commands'];
            $commands = explode('[{+}]', $commands);
            unset($getItemsConverter['PointzItemsConverter']['commands']);

            $lores = $getItemsConverter['PointzItemsConverter']['lores'];
            $lores = explode('[{+}]', $lores);
            unset($getItemsConverter['PointzItemsConverter']['lores']);

            if ($this->request->is('ajax')) {
                $this->autoRender = false;
                if (!empty($this->request->data['name']) AND !empty($this->request->data['icon']) AND !empty($this->request->data['price']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['lores']) AND !empty($this->request->data['commands'])) {
                    $commands = implode('[{+}]', $this->request->data['commands']);
                    $lores = implode('[{+}]', $this->request->data['lores']);
                    $this->PointzItemsConverter->edit(
                        $this->request->data['id'],
                        $this->request->data['name'],
                        $this->request->data['icon'],
                        $this->request->data['price'],
                        $this->request->data['price_ig'],
                        $lores,
                        $commands
                    );
                    $this->response->body(json_encode(array('statut' => true, 'msg' => $this->Lang->get('GLOBAL__SUCCESS'))));
                } else {
                    $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__FILL_ALL_FIELDS'))));
                }
            } else {
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
            $this->set(compact('getItemsConverter', 'commands', 'lores'));
        } else {
            $this->redirect('/');
        }
    }

    public function admin_delete($id)
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->loadModel('Pointz.PointzItemsConverter');
            $this->autoRender = null;
            $this->PointzItemsConverter->delete($id);
            $this->redirect('/admin/pointz/pconverter');

        } else {
            $this->redirect('/');
        }
    }

}