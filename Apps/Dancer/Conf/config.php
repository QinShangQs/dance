<?php
return array(
    'URL_ROUTER_ON' => TRUE,
    'URL_ROUTE_RULES' => array(
        'play/:id' => 'Play/index',
        'album/:keyword'=> 'Album/index',
        'search/:keyword'=> 'Search/index'
        
    )
);