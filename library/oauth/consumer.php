<?php
/**
 * Tumblr_API
 *
 * @version  1.0
 * @package Stilero
 * @subpackage Tumblr_API
 * @author Daniel Eliasson <daniel at stilero.com>
 * @copyright  (C) 2014-jan-06 Stilero Webdesign (http://www.stilero.com)
 * @license	GNU General Public License version 2 or later.
 * @link http://www.stilero.com
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

class StileroTumblrConsumer{
    
    protected $key;
    protected $secret;
    
    /**
     * 
     * @param string $oauth_consumer_key Oauth Consumer Key retrieved from Tumblr dev page
     * @param string $oauth_consumer_secret Oauth Consumer Secret retrieved from Tumblr dev page 
     */
    public function __construct($oauth_consumer_key, $oauth_consumer_secret) {
        $this->key = $oauth_consumer_key;
        $this->secret = $oauth_consumer_secret;
    }
}
