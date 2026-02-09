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
            'Undocumented AI Agent'
        ]);
    }

    public function getRobotsTxt()
    {
        $apiCache = kirby()->cache('mauricerenck.darkvisitors');
        $apiData = $apiCache->get('apiData');

        if ($apiData === null) {
            $this->fetchRobotsTxt();
            $apiData = $apiCache->get('apiData');
        }

        return compact('apiData');
    }

    public function isAgentBlocked(string $userAgent): bool
    {
        $apiCache = kirby()->cache('mauricerenck.darkvisitors');
        $blockedAgents = $apiCache->get('agents');

        if ($blockedAgents === null) {
            $this->fetchRobotsTxt();
            $blockedAgents = $apiCache->get('agents');
        }

        foreach ($blockedAgents as $blockedAgent) {
            if (empty($blockedAgent)) {
                continue;
            }

            // Case-insensitive check to see if the user agent contains the blocked string
            if (stripos($userAgent, $blockedAgent) !== false) {
                return true;
            }
        }

        return false;
    }

    public function fetchRobotsTxt()
    {
        $apiCache = kirby()->cache('mauricerenck.darkvisitors');
        $apiData = $apiCache->get('apiData');
        $agents = $apiCache->get('agents');

        if ($apiData === null || $agents === null) {
            $apiResult = $this->getLatestAgents();
            $agentList = $this->parseRobotsTxt($apiResult);

            $apiCache->set('apiData', $apiResult, 1440);
            $apiCache->set('agents', $agentList, 1440);
        }
    }

    public function parseRobotsTxt(string $robotsTxt): array
    {
        $userAgents = [];
        $lines = explode("\n", $robotsTxt);

        foreach ($lines as $line) {
            $line = trim($line);

            // Ignoriere Kommentare und leere Zeilen
            if (empty($line) || str_starts_with($line, '#')) {
                continue;
            }

            // Suche nach "User-agent:" Zeilen
            if (preg_match('/^User-agent:\s*(.+)$/i', $line, $matches)) {
                $agent = trim($matches[1]);

                // Ignoriere den Wildcard Agent
                if ($agent !== '*' && !empty($agent)) {
                    $userAgents[] = $agent;
                }
            }
        }

        return array_unique($userAgents);
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

        $request = Remote::request('https://api.knownagents.com/robots-txts', [
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

        return Remote::request('https://api.knownagents.com/visits', [
            'method' => 'POST',
            'headers' => ['Content-Type: application/json', 'Authorization: Bearer ' . $this->token],
            'data' => json_encode($body),
        ]);
    }
}
