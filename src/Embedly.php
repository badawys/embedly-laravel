<?php namespace Badawy\Embedly;

use Ixudra\Curl\Facades\Curl;

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
     * constructor
     */
    function __construct()
    {
        $this->key = config('embedly.key');
        $this->api_url = 'http://api.embed.ly/1/';
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
    public function extract ($url, Array $parms) {

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
    public function oembed ($url, Array $parms) {

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
    protected function request (Array $url, Array $args, $type) {

        if (count($url) > 1){
            foreach ($url as $key => $value){
                $url[$key] = urlencode($value);
            }
            $parms ['urls'] = implode(',', $url);
        } else {
            $parms ['url'] = $url[0];
        }
        $parms ['key'] = $this->key;

        if(!empty($args))
            $parms ['args'] = http_build_query($args);

        $q = $this->api_url . $this->types[$type] . '?key=' . $parms['key'] . '&' . $parms['args'];

        if (count($url) > 1){
            $q .= '&urls='.$parms['urls'];
        } else {
            $q .= '&url='.$parms['url'];
        }

        $response = json_decode(Curl::get($q));

        return $response;
    }

}