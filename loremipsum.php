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

// example

$lorem = new lorem;

echo $lorem->h(1, 5, 10, true); // h1, 5-10 words, with html tags

echo $lorem->h(2, 5, 10, true); // h2, 5-10 words, with html tags

echo $lorem->h(3, 5, 15, true); // h3, 5-15 words, with html tags

echo $lorem->h(4, 5, 10, true); // h4, 5-10 words, with html tags

echo $lorem->h(4, 10, 15, false); // h4 10-15 words, without html tags

echo $lorem->p(3, 25, 30); // 3 paragraphs, 25-30 words each, with html tags

echo $lorem->ul(3, 10, 25); // 3 ul items, 10-25 words each, with html tags

echo $lorem->ol(3, 10, 25); // 3 ol items, 10-25 words each, with html tags

?>
