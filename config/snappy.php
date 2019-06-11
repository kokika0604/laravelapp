<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => base_path('vendor\wemersonjanuario\wkhtmltopdf-windows\bin\64bit\wkhtmltopdf'), 
        'timeout' => false,
        'options' => array(
            'enable-javascript' => true,
            'javascript-delay' => 0,
            'no-stop-slow-scripts' => true,
            'no-background' => false,
            'lowquality' => false,
            'encoding' => 'utf-8',
            'images' => true,
            'cookie' => array(),
            'dpi' => 300,
            'image-dpi' => 300,
            'enable-external-links' => true,
            'enable-internal-links' => true,
            'disable-smart-shrinking'=>true
            ),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => base_path('vendor/bin/wkhtmltoimage-amd64'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
