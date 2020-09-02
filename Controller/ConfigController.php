<?php

class ConfigController extends PointzAppController
{

    public function admin_index()
    {
        if ($this->isConnected and $this->User->isAdmin()) {
            $this->layout = 'admin';

            $this->loadModel('Pointz.PointzConfig');
            $configPointz = $this->PointzConfig->find('first');
            if ($this->request->is('ajax')) {
                $this->autoRender = false;
                $this->response->type('json');
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
                $this->response->body(json_encode(array('statut' => false, 'msg' => $this->Lang->get('ERROR__BAD_REQUEST'))));
            }
            $this->set(compact('configPointz'));
        } else {
            $this->redirect('/');
        }
    }


    public function admin_generate_key()
    {
        if ($this->isConnected and $this->User->isAdmin()) {
            $this->layout = 'admin';

            $this->loadModel('Pointz.PointzConfig');
            $configPointz = $this->PointzConfig->find('first');

            $this->autoRender = false;
            if (!$configPointz['PointzConfig']['id']) {
                $this->PointzConfig->add();
            }
            $id = (!$configPointz['PointzConfig']['id'])? 1: $configPointz['PointzConfig']['id'];
            $config = array(
                "digest_alg" => "sha512",
                "private_key_bits" => 2048,
                "private_key_type" => OPENSSL_KEYTYPE_RSA,
            );

            $keys = openssl_pkey_new($config);

            openssl_pkey_export($keys, $private_key);

            $public_key = openssl_pkey_get_details($keys)["key"];


            $this->PointzConfig->edit_keys(
                $id,
                $public_key,
                $private_key
            );

            $this->redirect('/admin/pointz/config');
        } else {
            $this->redirect('/');
        }
    }

}