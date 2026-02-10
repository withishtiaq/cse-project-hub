// লারাভেল ভিউ সার্ভিস রেজিস্টার করা
$app->register(Illuminate\View\ViewServiceProvider::class);
// লারাভেল রাউটিং এবং সেশন সাপোর্ট
$app->register(Illuminate\Routing\RoutingServiceProvider::class);
$app->register(Illuminate\Session\SessionServiceProvider::class);

return $app;
