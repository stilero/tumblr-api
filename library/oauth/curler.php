<?php
/**
 * Curler Class for sending requests
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Tumblr_API
 * @author Daniel Eliasson <daniel at stilero.com>
 * @copyright  (C) 2014-jan-01 Stilero Webdesign (http://www.stilero.com)
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class StileroTumblrCurler{
    /**
     * Params to send in request
     * @var array 
     */
    protected $params;
    /**
     * URL to send the request to
     * @var string 
     */
    protected $url;
    /**
     * The curl handler
     * @var object 
     */
    protected $curl;
    
    /**
     * Initializes the curler and is ready to post
     */
    public function __construct() {
        $this->curl = curl_init();
        
    }
    /**
     * Sends the request and returns the response
     * @param string $url
     * @param array $params
     * @return string RAW response
     */
    protected function curlIt($url, array $params){
        $this->params = $params;
        $this->url = $url;
        curl_setopt($this->curl, CURLOPT_URL,$this->url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->params);
        $response=curl_exec($this->curl);
        curl_close ($this->curl);
        return $response;
    }
    /**
     * Sends a POST request
     * @param string $url URL to send the request to
     * @param array $params params for the request
     * @return string RAW Response
     */
    public function post($url, array $params){
        curl_setopt($this->curl, CURLOPT_POST,1);
        return $this->curlIt($url, $params);
    }
    /**
     * Sends a GET request
     * @param string $url URL to send the request to
     * @param array $params params for the request
     * @return string RAW Response
     */
    public function get($url, array $params){
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, 'GET');
        return $this->curlIt($url, $params);
    }
}