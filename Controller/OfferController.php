<?php

class OfferController extends PointzAppController
{

    public function admin_index()
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';

            $this->loadModel('Pointz.PointzOffer');
            $getOffers = $this->PointzOffer->find('all');
            $this->set(compact('getOffers'));

        } else {
            $this->redirect('/');
        }
    }

    public function admin_add()
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->layout = 'admin';
            $this->loadModel('Pointz.PointzOffer');
            $this->loadModel('Shop.Items');
            if ($this->request->is('ajax')) {
                $this->response->type('json');
                $this->autoRender = null;
                if (!empty($this->request->data['name']) AND !empty($this->request->data['icon']) AND !empty($this->request->data['price']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['lores']) AND !empty($this->request->data['commands'])) {
                    $commands = implode('[{+}]', $this->request->data['commands']);
                    $lores = implode('[{+}]', $this->request->data['lores']);
                    $this->PointzOffer->add(
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
            $this->loadModel('Pointz.PointzOffer');
            $getOffer = $this->PointzOffer->find('first', array('conditions' => array('id' => $id)));
            $commands = $getOffer['PointzOffer']['commands'];
            $commands = explode('[{+}]', $commands);
            unset($getOffer['PointzOffer']['commands']);

            $lores = $getOffer['PointzOffer']['lores'];
            $lores = explode('[{+}]', $lores);
            unset($getOffer['PointzOffer']['lores']);

            if ($this->request->is('ajax')) {
                $this->autoRender = false;
                if (!empty($this->request->data['name']) AND !empty($this->request->data['icon']) AND !empty($this->request->data['price']) AND !empty($this->request->data['price_ig']) AND !empty($this->request->data['lores']) AND !empty($this->request->data['commands'])) {
                    $commands = implode('[{+}]', $this->request->data['commands']);
                    $lores = implode('[{+}]', $this->request->data['lores']);
                    $this->PointzOffer->edit(
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
            $this->set(compact('getOffer', 'commands', 'lores'));
        } else {
            $this->redirect('/');
        }
    }

    public function admin_delete($id)
    {
        if ($this->isConnected AND $this->User->isAdmin()) {
            $this->loadModel('Pointz.PointzOffer');
            $this->autoRender = null;
            $this->PointzOffer->delete($id);
            $this->redirect('/admin/pointz/offer');

        } else {
            $this->redirect('/');
        }
    }

}