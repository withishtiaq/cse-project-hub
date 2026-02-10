<?php
// স্ট্যাটিক ফাইল (ইমেজ, সিএসএস) হ্যান্ডেল করার জন্য
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__ . '/../public' . $uri)) {
    return false;
}

require __DIR__ . '/../public/index.php';
