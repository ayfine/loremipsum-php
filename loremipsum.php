<?php

class lorem {

  const api_url = 'http://www.randomtext.me/api/lorem/';

  function request($url) {
    $object = curl_init();
    curl_setopt($object, CURLOPT_URL, $url);
    curl_setopt($object, CURLOPT_RETURNTRANSFER, true);
    $resp = curl_exec($object);
    curl_close($object);
    $text = json_decode($resp, true);
    return $text['text_out'];
  }

  function url($mode, $n, $min, $max) {
    $base = "http://www.randomtext.me/api/lorem/mode-n/min-max";
    $search = array("mode", "-n", "min", "max");
    if($mode == "h") {
      $number = $n;
    }
    else {
      $number = "-" . $n;
    }
    $replace = array($mode, $number, $min, $max);
    $url = str_replace($search, $replace, $base);
    return $url;
  }

  function p($n, $min, $max, $tags = true) {
    $url = $this->url('p', $n, $min, $max);
    $out = $this->request($url);
    if($tags == false) {
      $stripped = strip_tags($out);
      return $stripped;
    }
    else {
      return $out;
    }
  }

  function ul($n, $min, $max, $tags = true) {
    $url = $this->url('ul', $n, $min, $max);
    $out = $this->request($url);
    if($tags == false) {
      $stripped = strip_tags($out);
      return $stripped;
    }
    else {
      return $out;
    }
  }

  function ol($n, $min, $max, $tags = true) {
    $url = $this->url('ol', $n, $min, $max);
    $out = $this->request($url);
    if($tags == false) {
      $stripped = strip_tags($out);
      return $stripped;
    }
    else {
      return $out;
    }
  }

  function h($i, $min, $max, $tags = false) {
    $url = $this->url('h', $i, $min, $max);
    $out = $this->request($url);
    if($tags == false) {
      $stripped = strip_tags($out);
      return $stripped;
    }
    else {
      return $out;
    }
  }

}
?>
