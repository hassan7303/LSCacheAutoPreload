<?php

/**
 * تو این صفحه من برا اینکه مشکل نخوره گوشی های قدیمی و ایفون اونارو هم به لیست گوشی ها اضافه کردم میتونید بردارید
 * Standalone background preload script (safe for LiteSpeed)
 */

if (!isset($argv[1])) {
    error_log('[LSCache Preload] ❌ No URL provided to run_preload.php');
    exit;
}

$url = $argv[1];

sleep(10);

// Request with desktop user-agent
$desktopUA = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/122.0 Safari/537.36';
$mobileUAs = [
    'iPhone'   => 'Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X)',
    'Android'  => 'Mozilla/5.0 (Linux; Android 13; Pixel 7) AppleWebKit/537.36 Chrome/122.0 Mobile Safari/537.36',
    'GenericMobile' => 'Mozilla/5.0 (Linux; U; Android 9; en-US; Nexus 5 Build/JOP40D) AppleWebKit/534.30 Mobile Safari/534.30'
];


function preload_request($url, $ua)
{
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_USERAGENT => $ua,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    $res = curl_exec($ch);
    $err = curl_error($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);

    $status = isset($headers['http_code']) ? $headers['http_code'] : 'N/A';
    // 	error_log("[LSCache Preload] → [$status] " . ($err ? "❌ $err" : "✅ Success") . " | UA=" . substr($ua, 0, 25));
}

preload_request($url, $desktopUA);
preload_request($url, $desktopUA);

foreach ($mobileUAs as $type => $ua) {
    preload_request($url, $ua);
}
