<?php

    /*
     * Plugin Name: Api
     * Description: Essential Functionality for the Website
     * Version: 1.0
     * Author: Diamadis Giorgos
     */

class API
{
    public function __construct()
    {
        add_action('rest_api_init', array($this, "registerRestAPI"));

    }

    function registerRestAPI()
    {
        register_rest_route('margetas/v1', '/sendMessage', [
            'methods' => WP_REST_Server::EDITABLE,
            'callback' => array($this, "api_sendMessage"),
        ]);

    }


    function api_sendMessage(WP_REST_Request $request): WP_REST_Response
    {
        $param = $request->get_body_params();

        $res = $this->sendmailbymailgun("margetas.giannis@gmail.com", $param["data"]["mail"], $param["data"]["body"]);

        $response = new WP_REST_Response($res, 200);
        $response->set_headers(['Cache-Control' => 'must-revalidate, no-cache, no-store, private']);
        return $response;
    }

    function sendmailbymailgun($to, $from, $text)
    {
        $array_data = array(
            'from' => $from,
            'to' => $to,
            'subject' => "Conact Support",
            'html' => "",
            'text' => $text,
            'o:tracking' => 'yes',
            'o:tracking-clicks' => 'yes',
            'o:tracking-opens' => 'yes',
            'o:tag' => "",
            'h:Reply-To' => ""
        );

        try {
            $session = curl_init(MAILGUN_URI . MAILGUN_DOMAIN . '/messages');
            curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($session, CURLOPT_USERPWD, 'api:' . MAILGUN_KEY);
            curl_setopt($session, CURLOPT_POST, true);
            curl_setopt($session, CURLOPT_POSTFIELDS, $array_data);
            curl_setopt($session, CURLOPT_HEADER, false);
            curl_setopt($session, CURLOPT_ENCODING, 'UTF-8');
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($session);
            curl_close($session);
            return json_decode($response, true);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

}

new Api();
