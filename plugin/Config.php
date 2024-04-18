<?php

namespace mauricerenck\DarkVisitors;

class Config
{
    public function getUserConfig()
    {
        $userConfig = [];

        $customAgents = kirby()->option('mauricerenck.dark-visitors.agents', [
            [
                'userAgents' => ['*'],
                'disallow' => ['/kirby', '/site'],
            ],
        ]);
        $customSitemaps = kirby()->option('mauricerenck.dark-visitors.sitemaps', null);

        if (!is_null($customSitemaps)) {
            $userConfig['sitemaps'] = $customSitemaps;
        }

        $agents = [];
        foreach ($customAgents as $agent) {
            foreach ($agent['userAgents'] as $userAgent) {
                $agents[] = 'User-agent: ' . $userAgent;
            }

            if (isset($agent['disallow'])) {
                foreach ($agent['disallow'] as $rule) {
                    $agents[] = 'Disallow: ' . $rule;
                }
            }

            if (isset($agent['allow'])) {
                foreach ($agent['allow'] as $rule) {
                    $agents[] = 'Allow: ' . $rule;
                }
            }

            $agents[] = '';
        }

        $userConfig['userConfig'] = $agents;

        return $userConfig;
    }
}
