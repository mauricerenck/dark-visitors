<?php

namespace mauricerenck\DarkVisitors;

use Kirby;
use Kirby\Http\Response;

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('mauricerenck/darkvisitors', [
    'options' => [
        'cache' => true,
    ],
    'routes' => [
        [
            'pattern' => 'robots.txt',
            'method' => 'GET',
            'action' => function () {
                $api = new Api();
                $apiEntries = $api->get();

                $config = new Config();
                $pluginConfig = $config->getUserConfig();
                $robotTxt = [];

                if (isset($pluginConfig['userConfig'])) {
                    $robotTxt = array_merge($robotTxt, $pluginConfig['userConfig']);
                }

                if (isset($pluginConfig['sitemaps'])) {
                    $robotTxt = array_merge($robotTxt, $pluginConfig['sitemaps']);
                }

                if (!is_null($apiEntries)) {
                    $robotTxt[] = '';
                    $robotTxt = array_merge($robotTxt, $apiEntries);
                }

                return new Response(join("\n", $robotTxt), 'text/plain', 200);
            },
        ],
    ],
]);
