<?php

include ('../src/Slug.php');

var_dump(Slug::convert('olá léo e SOU 1123'));
echo '<br>';
echo '<br>';
var_dump(Slug::convert('olá léo e SOU 1123.jpg'));
echo '<br>';
var_dump(Slug::convert('olá léo e SOU 1123.jpg', false));
echo '<br>';
echo '<br>';
var_dump(Slug::convert('olá léo e SOU 1123.jpg', true));
echo '<br>';
echo '<br>';
var_dump(Slug::convert('olá léo e SOU 1123.jpg', true)[0]);
echo '<br>';
var_dump(Slug::convert('olá léo e SOU 1123.jpg', true)[1]);
