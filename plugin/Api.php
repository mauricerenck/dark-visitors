<?php

namespace mauricerenck\DarkVisitors;

use Kirby\Http\Remote;

class Api
{
    private $agentTypes;

    public function __construct(private $token = null)
    {
        $this->token = $token ?? option('mauricerenck.dark-visitors.token', null);
        $this->agentTypes = option('mauricerenck.dark-visitors.aiTypes', [
            'AI Assistant',
            'AI Data Scraper',
            'AI Search Crawler',
        ]);
    }

    public function get()
    {
        $apiCache = kirby()->cache('mauricerenck.darkvisitors');
        $apiData = $apiCache->get('apiData');

        if ($apiData === null) {
            $apiResult = $this->getLatestAgents();
            $apiCache->set('apiData', $apiResult, 1440);

            $apiData = $apiResult;
        }

        return compact('apiData');
    }

    public function getLatestAgents()
    {
        if (count($this->agentTypes) === 0) {
            return null;
        }

        $body = [
            'agent_types' => $this->agentTypes,
            'disallow' => '/',
        ];

        $request = Remote::request('https://api.darkvisitors.com/robots-txts', [
            'method' => 'POST',
            'headers' => ['Content-Type: application/json', 'Authorization: Bearer ' . $this->token],
            'data' => json_encode($body),
        ]);

        if ($request->code() !== 200) {
            return null;
        }

        return $request->content();
    }

    public function trackAgent($requestPath, $requestMethod, $requestHeaders)
    {
        $body = [
            'request_path' => $requestPath,
            'request_method' => $requestMethod,
            'request_headers' => $requestHeaders,
        ];

        return Remote::request('https://api.darkvisitors.com/visits', [
            'method' => 'POST',
            'headers' => ['Content-Type: application/json', 'Authorization: Bearer ' . $this->token],
            'data' => json_encode($body),
        ]);
    }
}
