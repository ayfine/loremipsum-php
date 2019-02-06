<?php
require("loremipsum.php");

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
