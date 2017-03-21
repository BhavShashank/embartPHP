<?php declare(strict_types=1);
	namespace embartPHP;
	require __DIR__ . '/../vendor/autoload.php';
	error_reporting(E_ALL);
	$enviroment = 'development';
	/*
	* Register Error Handler
	*/
	$whoops = new \Whoops\Run;
	if ($enviroment != 'production') {
		$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	} else {
		$whoops->pushHandler(function ($e) {
			echo 'Todo: A friendly error page. Send email to the developer';
		});
	}
	$whoops->register();
	throw new \Exception;
	$request = new Http\HttpRequest($_GET,$_POST,$_COOKIE,$_FILES,$_SERVER);
	$response = new Http\HttpResponse;
	$content = 'Hello Embart';
	$response->setContent($content);
	foreach ($response->getHeaders() as $header) {
		header($header, false);
	}
	echo $response->getContent();