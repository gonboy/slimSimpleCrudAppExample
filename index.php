<?php

// Load all third party libraries
require "vendor/autoload.php";

// Load other required project files
require "config.php";
require "classes/Database.php";

// Start session so flash messages work
session_start();

// Configure application
$app = new \Slim\Slim;

// Configure view to use Twig template engine
$app->config("view", New \Slim\Views\Twig());

// Register Twig helper functions
$view = $app->view();
$view->parserExtensions = [
  new \Slim\Views\TwigExtension(),
];

// Make database class a singleton
$app->container->singleton('db', function () {
  return new Database(DB_HOST, DB_PORT, DB_NAME, DB_USERNAME, DB_PASSWORD);
});

// Configure application routing
$app->get("/", function() use ($app) {
  $articles = $app->db->getArticles();
  // Truncate article summaries
  foreach ($articles as &$article) {
    $article["content"] = substr($article["content"], 0, 600) . "...";
  }
  $app->render("frontPage.twig", ["articles" => $articles]);
});

$app->get("/article/:articleId", function($articleId) use ($app) {
  $article = $app->db->getSingleArticle($articleId);
  $app->render("article.twig", ["article" => $article]);
});

$app->get("/admin/", function() use ($app) {
  $articles = $app->db->getArticles();
  $app->render("adminListArticles.twig", ["articles" => $articles]);
});

$app->get("/admin/new/", function() use ($app) {
  $dateObj = new DateTime();
  $currentDate = $dateObj->format("Y-m-d");
  $app->render("adminNewArticle.twig", ["currentDate" => $currentDate]);
});

$app->post("/admin/new/", function() use ($app) {
  $title = $app->request->post("title");
  $date = $app->request->post("date");
  $content = $app->request->post("content");
  $app->db->insertNewArticle($title, $date, $content);
  // Lisätään flash-message seuraavaan sivukyselyyn
  $app->flash("info", "Article has been successfully published");
  $app->redirect($app->request()->getRootUri() . "/admin/");
});

$app->get("/admin/edit/:articleId", function($articleId) use ($app) {
  $article = $app->db->getSingleArticle($articleId);
  $app->render("adminEditArticle.twig", ["article" => $article]);
});

$app->post("/admin/edit/:articleId", function($articleId) use ($app) {
  if ($app->request->post("submit") === "update") {
    $title = $app->request->post("title");
    $date = $app->request->post("date");
    $content = $app->request->post("content");
    $app->db->updateArticle($articleId, $title, $date, $content);
    $app->flash("info", "Article has been successfully updated");
    $app->redirect($app->request()->getRootUri() . "/admin/edit/" . $articleId);
  } elseif ($app->request->post("submit") === "delete") {
    $app->db->deleteArticle($articleId);
    $app->flash("info", "Article has been successfully deleted");
    $app->redirect($app->request()->getRootUri() . "/admin/");
  }
});

// Start application
$app->run();