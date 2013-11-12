<?php

class ZipLookup {

  // constant url for sending lookups, with replaceable values
  const LOOKUP_BASE = 'http://zipcodedistanceapi.redline13.com/rest/$api_key/distance.$format/$src_zip/$dest_zip/$units';

  // constant key for API access at above url
  const API_KEY = '2JLqY031p82uMaOi5WgX7GVNpOp3u1mwL7XJ80Ly9N2VYRd4Ou1VaWJAK8Ef91MV';

  //-----------------------------

  // potentially settable values
  private $src_zip = null;
  private $dest_zip = null;
  private $format = null;
  private $units = null;
  private $timeout = null;

  //-----------------------------

  // dynamically changed internal values
  private $lookup_url = null;
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
    $this->units = 'mile';
    $this->timeout = 4;
    $this->lookup_url = null;
    $this->response = null;
  }

  //-----------------------------

  // private functions
  private function set_url_parameters() {
    // check each value that doesn't have a default
    if (!$this->dest_zip)
      return false;

    $this->lookup_url = self::LOOKUP_BASE;
    $this->lookup_url = str_replace('$api_key', self::API_KEY, $this->lookup_url);
    $this->lookup_url = str_replace('$src_zip', $this->src_zip, $this->lookup_url);
    $this->lookup_url = str_replace('$dest_zip', $this->dest_zip, $this->lookup_url);
    $this->lookup_url = str_replace('$format', $this->format, $this->lookup_url);
    $this->lookup_url = str_replace('$units', $this->units, $this->lookup_url);

    // check that everything has been replaced
    if (strpos($this->lookup_url, '$') !== false)
      return false;

    return true;
  }

  private function parse_json($response) {
    if (!$response)
      $response = $this->response;

    if (!$response)
      return false;

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

  public function send_zip_lookup() {
    if (!$this->dest_zip)
      return false;

    // return value indicates whether lookup_url is now valid or not
    if (!$this->set_url_parameters())
      return false;

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
    $this->response = file_get_contents($this->lookup_url, false, $context);


    // false indicates any of several failures
    // we don't really care why it failed, the user is waiting
    if (!$this->response)
      return false;

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


}

?>
