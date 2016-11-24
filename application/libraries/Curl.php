<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curl {
    protected $method;
    protected $url;
    protected $data;

    public function __construct($params)
    {
        if (!empty($params['method'])) {
            $this->setMethod($params['method']);
        }

        if (!empty($params['url'])) {
            $this->setURL($params['url']);
        }

        return $this;
    }

    public function setURL($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            log_message('error', 'Curl library - setUrl : param must be a valid URL');
                var_dump('ok');
            return $this;
        }

        $this->url = $url;
    }

    public function setMethod($method)
    {
        $method = strtoupper($method);

        if (!in_array($method, array('GET', 'POST', 'PUT', 'DELETE', 'HEAD'))) {
            log_message('error', 'Curl library - setMethod : this method does not exist or is not allowed');

            return $this;
        }

        $this->method = $method;

        return $this;
    }

    public function send()
    {
        if (empty($this->method) || empty($this->url)) {
            log_message('error', 'Curl library - Send : URL, method and SSL must be defined');
            return false;
        }

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        switch($this->method) {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            case 'HEAD':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'HEAD');
                break;
        }


        $response    = curl_exec($curl);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $code        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $header      = curl_header_to_array(substr($response, 0, $header_size));
        $body        = substr($response, $header_size);

        curl_close($curl);

        return array(
            'header' => $header,
            'body' => $body,
            'code' => $code,
        );
    }
}

/**
 * [curl_header_to_array description]
 * @param  [type] $header [description]
 * @return [type]         [description]
 */
function curl_header_to_array($header)
{
    $headers_array = array();

    foreach (explode("\r\n", $header) as $i=> $line) {

        if (empty($line))
            continue;

        if ($i === 0) {
            $headers_array['http_code'] = $line;
        } else {
            list($key, $value) =explode(': ', $line);
            $headers_array[$key] = $value;
        }
    }

    return $headers_array;
}