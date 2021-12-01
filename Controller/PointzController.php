<?php

class PointzController extends PointzAppController
{


    function base64_decode_url($string)
    {
        return str_replace(['-', '_'], ['+', '/'], $string) . "=";
    }

    function asBin($str) {
        $byte_max = 127;
        $byte_min = -128;
        if($str == "") {
            return null;
        }
        $bytes = array();
        for($i = 0; $i < floor(strlen($str) / 2); $i++){
            $j = intval(substr($str, $i * 2, 1), 16);
            $k = intval(substr($str, $i * 2 + 1, 1), 16);
            $value = $j * 16 + $k;
            // emulation byte-overflow in java
            if ($value > $byte_max) {
                $value = $value - $byte_max + $byte_min - 1;
            }
            $bytes[$i] = $value;
        }
        return $bytes;
    }

    public function api()
    {

        $this->response->type('application/json');
        $this->autoRender = false;

        $this->loadModel('Pointz.PointzConfig');
        $configPointz = $this->PointzConfig->find('first');

        if (!$configPointz['PointzConfig']['id'])
            return $this->response->body(json_encode(['error' => true, 'message' => 'Syntax error']));

        $json = json_decode(base64_decode($this->base64_decode_url(array_keys($this->request->data)[0])), true);

        $key = base64_decode($json["key"]);
        openssl_public_decrypt($key, $decoded_key, $configPointz['PointzConfig']['public_key']);
        $data = base64_decode($json["data"]);
        $iv = base64_decode($json["iv"]);
        $data = openssl_decrypt($data, "AES-128-CBC", $decoded_key, OPENSSL_RAW_DATA, $iv);
        parse_str($data, $decoded_data);

        $type = $decoded_data['type'];

        if (!$type)
            return $this->response->body(json_encode(['error' => true, 'message' => 'Syntax error']));
        $response = $this->$type($decoded_data);

        return $this->response->body(json_encode($response));

    }

    private function check_key($params)
    {
        return ['error' => false, 'message' => 'Good ! The key is correct !'];

    }

    private function get_players_informations($params)
    {
        $players_username = explode(";", $params["players"]);
        $returnValues = [];
        foreach($players_username as $pseudo) {
            $username = $this->User->getFromUser('pseudo', $pseudo);
            if (!$username)
                $username = $pseudo;

            $money = $this->User->getFromUser('money', $pseudo);
            if (!$money)
                $money = 0;
            $returnValues[] = ['money' => $money, 'username' => $username];
        }


        return ['error' => false, "players" => $returnValues];

    }

    private function set_money_player($params)
    {
        $username = $this->User->getFromUser('pseudo', $params['username']);
        if (!$username)
            return ['error' => true, 'message' => "Not registered"];
        $money = $params['new_money'];

        $this->User->setToUser('money', $money, $username);


        return ['error' => false, 'new_money' => $money];

    }


    private function get_pointz_config($params)
    {

        $this->loadModel('Pointz.PointzConfig');
        $configPointz = $this->PointzConfig->find('first');

        $name_shop = $configPointz['PointzConfig']['name_shop'];
        $name_gui = $configPointz['PointzConfig']['name_gui'];

        return ['error' => false, 'name_shop' => "$name_shop", 'name_gui' => "$name_gui"];
    }


    private function get_pointz_items_converter($params)
    {


        $this->loadModel('Pointz.PointzItemsConverter');
        $getItemsConverter = $this->PointzItemsConverter->find('all');

        return ['error' => false, 'list' => $getItemsConverter];

    }

    private function get_pointz_items_shop($params)
    {


        $this->loadModel('Pointz.PointzItemsShop');
        $getItemsShop = $this->PointzItemsShop->find('all');

        return ['error' => false, 'list' => $getItemsShop];

    }

    private function get_pointz_item($params)
    {
        $this->loadModel('Shop.Item');
        $item_id = $params['item_id'];

        $getItem = $this->Item->find('first', ['conditions' => ['id' => $item_id]])['Item'];


        return ['error' => false, 'item' => $getItem];

    }

}
