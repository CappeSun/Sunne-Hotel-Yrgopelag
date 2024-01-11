<?php

header('Access-Control-Allow-Origin: *');

$woofs = ['Warf!', 'Ruffrrr!', 'Bull!', 'Grroww!', 'Brroff!'];

echo $woofs[rand(0,4)];