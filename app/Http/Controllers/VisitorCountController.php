<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorLog;
use Illuminate\Support\Str;

class VisitorCountController extends Controller
{
    public function index(Request $request)
    {
        $userAgent = $request->userAgent();
        $acceptLanguage = $request->header('Accept-Language');
        $referer = $request->headers->get('referer');
        $ip = $request->ip();
        $routeName = optional($request->route())->getName();
        $url = $request->fullUrl();
        $method = $request->method();
        $sessionId = $request->session()->getId();
        $userId = optional($request->user())->id;

        $ua = $this->parseUserAgent($userAgent);

        VisitorLog::create([
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'device_type' => $ua['device_type'] ?? null,
            'platform' => $ua['platform'] ?? null,
            'browser' => $ua['browser'] ?? null,
            'browser_version' => $ua['browser_version'] ?? null,
            'referer' => $referer,
            'url' => $url,
            'route_name' => $routeName,
            'method' => $method,
            'accept_language' => $acceptLanguage,
            'country' => null,
            'city' => null,
            'is_bot' => $ua['is_bot'] ?? false,
            'session_id' => $sessionId,
            'user_id' => $userId,
        ]);

        return response()->json(['ok' => true]);
    }

    private function parseUserAgent(?string $ua): array
    {
        $ua = $ua ?? '';
        $isBot = (bool) preg_match('/bot|crawl|spider|slurp|bing|crawler|facebookexternalhit|mediapartners/i', $ua);

        $platform = null;
        if (preg_match('/Windows/i', $ua)) $platform = 'Windows';
        elseif (preg_match('/Macintosh|Mac OS X/i', $ua)) $platform = 'macOS';
        elseif (preg_match('/Linux/i', $ua)) $platform = 'Linux';
        elseif (preg_match('/Android/i', $ua)) $platform = 'Android';
        elseif (preg_match('/iPhone|iPad|iPod/i', $ua)) $platform = 'iOS';

        $deviceType = 'desktop';
        if (preg_match('/Mobile|Android|iPhone|iPod/i', $ua)) $deviceType = 'mobile';
        if (preg_match('/iPad|Tablet/i', $ua)) $deviceType = 'tablet';
        if ($isBot) $deviceType = 'bot';

        $browser = null; $version = null;
        $browsers = [
            'Edge' => 'Edg',
            'Chrome' => 'Chrome',
            'Firefox' => 'Firefox',
            'Safari' => 'Version',
            'Opera' => 'OPR',
        ];
        foreach ($browsers as $name => $token) {
            if (preg_match('/' . preg_quote($token, '/') . '\\/([\\d.]+)/i', $ua, $m)) {
                $browser = $name;
                $version = $m[1] ?? null;
                break;
            }
        }
        if (!$browser && preg_match('/Safari/i', $ua)) $browser = 'Safari';

        return [
            'platform' => $platform,
            'device_type' => $deviceType,
            'browser' => $browser,
            'browser_version' => $version,
            'is_bot' => $isBot,
        ];
    }
}
