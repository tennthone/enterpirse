<?php

require __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('temp');
$twig = new \Twig\Environment($loader,[
    'debug' => true,
    'auto_reload' => true,
]);

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$herodata = file_get_contents('temp/data/hero.json');
// Data to pass to the template
$data = [
    "hero_sec" => $herodata,
    'page_title' => 'My Twig Template',
    'greeting' => 'Hello, Twig!',
    'items' => ['Item 1', 'Item 2', 'Item 3'],
    "teams" => ['team1', 'team 2', 'team 3']
];

// Render the template
// $templateFile = 'pages/' . $page . '.html';
$templateFile = "index.html";
$template = $twig->load($templateFile);
echo $template->render($data);
?>
