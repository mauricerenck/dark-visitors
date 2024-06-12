# Dark Visitors

Dark Visitors is a plugin for Kirby 3 and 4 that blocks unwanted AI Crawlers from your website using robots.txt. It uses the Dark Visitors API to identify and block unwanted visitors.

It also allows you to add custom rules and your sitemaps to your robots.txt file.

## Installation

```bash
composer require mauricerenck/darkvisitors
```

Or download the [latest release](https://github.com/mauricerenck/dark-visitors/releases) unzip it, copy it to `site/plugins/dark-visitors`

## Get the access token

You need a Dark Visitors access token to use this plugin.
Go to https://darkvisitors.com/ create an account and your own Project. Open your project and get your access token under settings.

## Usage

Edit your `config.php` and add the following line:

```php
'mauricerenck.dark-visitors.token' => 'YOUR TOKEN'
```

### AI crawlers

Set which types of AI crawlers you want to block:

```php
'mauricerenck.dark-visitors.aiTypes' => ['AI Assistant', 'AI Data Scraper', 'AI Search Crawler'],
```

### Your custom rules

Add your custom rules to the robots.txt file:

```php
'mauricerenck.dark-visitors.agents' => [
    [
        'userAgents' => ['Googlebot', 'Bingbot'],
        'disallow' => ['/admin'],
    ],
    [
        'userAgents' => ['Bingbot'],
        'allow' => ['/microsoft'],
    ],
],
```

Setting your custom rules will overwrite the default rules, which are:

```php
[
    'userAgents' => ['*'],
    'disallow' => ['/kirby', '/site'],
];
```

### Sitemaps

Add your sitemaps to the robots.txt file:

```php
'mauricerenck.dark-visitors.sitemaps' => [
    'Sitemap: https://your-site.tld/sitemap.xml',
    'Sitemap: https://your-site.tld/sitemap2.xml',
],
```

### Tracking/Analytics

Darkvisitors offers a tracking feature. If you want to use it, you can enable it in the config:

```php
'mauricerenck.dark-visitors.analytics' => true,
```

## Learn more about robots.txt and AI crawlers

-   [Google: Robots.txt specifications](https://developers.google.com/search/docs/advanced/robots/robots_txt)
-   [Dark Visitors](https://darkvisitors.com/)
