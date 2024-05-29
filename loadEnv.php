<?php

foreach (explode('\n', file_get_contents(__DIR__.'/.env')) as $variable)
    putenv($variable);