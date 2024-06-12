<?php

namespace mauricerenck\DarkVisitors;

use Kirby;
use Kirby\Http\Response;
use Amp;

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
        [
            'pattern' => '(:any)',
            'method' => 'GET',
            'action' => function () {
                $request = kirby()->request();
                $api = new Api();

                if (option('mauricerenck.dark-visitors.analytics', false)) {
                    $requestPath = $request->path()->toString(true);
                    $requestMethod = $request->method();
                    $requestHeaders = $request->headers();

                    try {
                        $future = Amp\async(function () use ($api, $requestPath, $requestMethod, $requestHeaders) {
                            $result = $api->trackAgent($requestPath, $requestMethod, $requestHeaders);
                            return $result;
                        });

                        $future->await();
                    } catch (\Throwable $e) {
                        echo 'Error' . $e->getMessage();
                    }
                }

                $this->next();
            },
        ],
    ],
]);
