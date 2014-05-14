<?php

/*

primary way to use this:

$zipob = new ZipLookup('10001'); // that's the destination zip

$zipob->send_zip_lookup('distance'); // or 'info'
this func returns false if lookup failed for any reason

$tmp = $zipob->get_distance(); // or get_city()

*/

class ZipLookup {

  // constant urls for sending lookups, with replaceable values
  const LOOKUP_BASE_DIST = 'http://zipcodedistanceapi.redline13.com/rest/$api_key/distance.$format/$src_zip/$dest_zip/$units';
  const LOOKUP_BASE_INFO = 'http://zipcodedistanceapi.redline13.com/rest/$api_key/info.$format/$dest_zip/$units';

  // constant key for API access at above url
  const API_KEY = '2JLqY031p82uMaOi5WgX7GVNpOp3u1mwL7XJ80Ly9N2VYRd4Ou1VaWJAK8Ef91MV';

  //-----------------------------

  // potentially settable values
  private $src_zip = null;
  private $dest_zip = null;
  private $format = null;
  private $units_dist = null;
  private $units_info = null;
  private $timeout = null;

  //-----------------------------

  // dynamically changed internal values
  private $lookup_dist_url = null;
  private $lookup_info_url = null;
  private $response = null;

  //-----------------------------

  // standard methods
  public function __construct($dest = null) {
    $this->set_default_values();
    $this->set_dest_zip($dest);
  }

  public function set_default_values() {
    // src_zip possibly a constant? var makes this code more reuseable
    $this->src_zip = '94704';
    $this->dest_zip = null;
    $this->format = 'json';
    $this->units_dist = 'mile';
    $this->units_info = 'degrees';
    $this->timeout = 4;
    $this->lookup_dist_url = null;
    $this->lookup_info_url = null;
    $this->response = null;
  }

  //-----------------------------

  // private functions
  private function set_url_parameters() {
    // check each value that doesn't have a default
    if (!$this->dest_zip)
      return false;

    if (!isset($this->lookup_dist_url)) {
      $this->lookup_dist_url = self::LOOKUP_BASE_DIST;
      $this->lookup_dist_url =
        str_replace('$api_key', self::API_KEY, $this->lookup_dist_url);
      $this->lookup_dist_url =
        str_replace('$src_zip', $this->src_zip, $this->lookup_dist_url);
      $this->lookup_dist_url =
        str_replace('$dest_zip', $this->dest_zip, $this->lookup_dist_url);
      $this->lookup_dist_url =
        str_replace('$format', $this->format, $this->lookup_dist_url);
      $this->lookup_dist_url =
        str_replace('$units', $this->units_dist, $this->lookup_dist_url);
    }

    if (!isset($this->lookup_info_url)) {
      $this->lookup_info_url = self::LOOKUP_BASE_INFO;
      $this->lookup_info_url =
        str_replace('$api_key', self::API_KEY, $this->lookup_info_url);
      $this->lookup_info_url =
        str_replace('$dest_zip', $this->dest_zip, $this->lookup_info_url);
      $this->lookup_info_url =
        str_replace('$format', $this->format, $this->lookup_info_url);
      $this->lookup_info_url =
        str_replace('$units', $this->units_info, $this->lookup_info_url);
    }

    // check that everything has been replaced
    $done_dist = (strpos($this->lookup_dist_url, '$') === false);
    $done_info = (strpos($this->lookup_info_url, '$') === false);

    if (!$done_dist) {
      $this->lookup_dist_url = null;
    }
    if (!$done_info) {
      $this->lookup_info_url = null;
    }

    return ($done_dist && $done_info);
  }

  private function parse_json($response) {
    if (!$response)
      $response = $this->response;

    if (!$response)
      return false;

    // TODO:
    // possible logic problem: if $response (above) then $response = something (below)

    $response = json_decode($response);
    if (!$response)
      return false;

    $this->response = (array) $response;

    return true;
  }

  //-----------------------------

  // public functions
  public function set_dest_zip($zip) {
    if (is_numeric($zip) && strlen($zip) == 5) {
      $this->dest_zip = $zip;
    }
  }

  public function clear_urls() {
    $this->lookup_dist_url = null;
    $this->lookup_info_url = null;
  }

  public function send_zip_lookup($which = 'distance') {
    
    if (!$this->dest_zip)
      return false;

    // return value indicates whether both lookup_urls are now valid or not
    if (!$this->set_url_parameters())
      return false;

    switch ($which) {
      default:
      case 'distance':
        $url = $this->lookup_dist_url;
      break;
      case 'info':
        $url = $this->lookup_info_url;
      break;
    }

    /*
    $this->response = http_get($this->lookup_url,
      array( 'timeout' => $this->timeout, )
    );
    */


    // ok, since http_get isn't guaranteed available,
    // we have to go through this BS:
    $copts = array('html' => array(
      'method' => 'GET',
      'timeout' => $this->timeout,
    ) );
    $context = stream_context_create($copts);
    $this->response = file_get_contents($url, false, $context);

    // false indicates any of several failures
    // we don't really care why it failed, the user is waiting
    if (!$this->response) {
      return false;
    }

    $func = 'parse_' . strtolower($this->format);

    if (!method_exists($this, $func))
      return false;

    return $this->$func($this->response);
  }

  public function get_distance() {
    if (!$this->response)
      return false;

    if (!array_key_exists('distance', $this->response))
      return false;

    return $this->response['distance'];
  }

  public function get_city() {
    if (!$this->response)
      return false;

    if (!array_key_exists('city', $this->response))
      return false;
    if (!array_key_exists('state', $this->response))
      return false;

    return $this->response['city'] . ', ' . $this->response['state'];
  }


}

?>
