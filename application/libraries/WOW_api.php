<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WOW_api
{

    protected $CI;
    protected $local = 'fr_FR';
    protected $apiKey = 'gf5ynqfqhzzrsmjr556c5t8nmf7fvrp5';

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function getCharacter($server, $character, $fields = array())
    {
        if (empty($fields)) {
            $fields = array('stats', 'items', 'progression');
        }

        $params = array(
            'method' => 'GET',
            'url'    => 'https://eu.api.battle.net/wow/character/' . $server . '/' . $character
                        . '?fields=' . implode(',', $fields) . '&locale=' . $this->local . '&apikey=' . $this->apiKey,
        );

        $this->CI->load->library('Curl', $params);

        $response = $this->CI->curl->send();

        $guild_members_json = json_decode($response['body'], true);

        return (array) $guild_members_json;
    }

    public function getRaces()
    {
        $params = array (
            'method' => 'GET',
            'url'    => 'https://eu.api.battle.net/wow/data/character/races?locale=' . $this->local . '&apikey=' . $this->apiKey,
        );

        $this->CI->load->library('Curl', $params);

        $response = $this->CI->curl->send();

        return (array) json_decode($response['body'], true);
    }

    public function getClasses()
    {
        $params = array (
            'method' => 'GET',
            'url'    => 'https://eu.api.battle.net/wow/data/character/classes?locale=' . $this->local . '&apikey=' . $this->apiKey,
        );

        $this->CI->load->library('Curl', $params);

        $response = $this->CI->curl->send();

        return (array) json_decode($response['body'], true);
    }

    public function getZones()
    {
        $params = array (
            'method' => 'GET',
            'url'    => 'https://eu.api.battle.net/wow/zone/?locale=' . $this->local . '&apikey=' . $this->apiKey,
        );

        $this->CI->load->library('Curl', $params);

        $response = $this->CI->curl->send();

        return (array) json_decode($response['body'], true);
    }

}