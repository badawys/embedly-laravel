<?php namespace Badawy\Embedly;

use \Curl\Curl;

class Embedly {

    /**
     * @var
     */
    protected $api_url;

    /**
     * @var
     */
    protected $key;

    /**
     * @var
     */
    protected $types;

    /**
     * @var Curl
     */
    protected $curl;

    /**
     * constructor
     */
    function __construct()
    {
        $this->curl = new Curl(); //Curl instance
        $this->key = config('embedly.key'); //Api key
        $this->api_url = 'http://api.embed.ly/1/'; //Api request base url
        //Embedly APIs types
        $this->types = [
            '1' => 'extract',
            '2' => 'oembed',
        ];
    }


    /**
     * @param $url
     * @param array $parms
     * @return mixed
     */
    public function extract ($url, Array $parms = null) {

        if (!is_array($url)) {
            $url = [$url];
        }
        return $this->request($url,$parms,1);

    }

    /**
     * @param $url
     * @param array $parms
     * @return mixed
     */
    public function oembed ($url, Array $parms = null) {

        if (!is_array($url)) {
            $url = [$url];
        }
        return $this->request($url,$parms,2);

    }


    /**
     * @param array $url
     * @param array $args
     * @param $type
     * @return mixed
     */
    protected function request (Array $url, Array $args = null, $type) {

        $parms ['key'] = $this->key;

        if (count($url) > 1){
            foreach ($url as $key => $value){
                $url[$key] = urlencode($value);
            }
            $parms ['urls'] = implode(',', $url);
        } else {
            $parms ['url'] = urlencode($url[0]);
        }

        if($args)
            $parms ['args'] = http_build_query($args);

        //make the request url string
        $q = $this->api_url . $this->types[$type] . '?key=' . $parms['key'];

        //add embedly query arguments to request url
        if (isset($parms['args']))
            $q .= '&'.$parms['args'];

        //add the url (or the urls) to request url
        if (count($url) > 1){
            $q .= '&urls='.$parms['urls'];
        } else {
            $q .= '&url='.$parms['url'];
        }

        //send the request and get the respond
        $response = $this->curl->get($q);

        return $response;
    }

}