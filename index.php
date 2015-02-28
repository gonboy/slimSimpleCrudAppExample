<?php

// Ladataan kaikki kolmannen osapuolen kirjastot
require "vendor/autoload.php";
require "config.php";
require "classes/Database.php";

// Käynnistetään sessio että flash-messaget toimii
session_start();

// Määritellään applikaatio
$app = new \Slim\Slim;

// Määritellään näkymä käyttämään Twig-templaatteja
$app->config("view", New \Slim\Views\Twig());

// Rekisteröidään Twigin helper-funktiot
$view = $app->view();
$view->parserExtensions = [
  new \Slim\Views\TwigExtension(),
];

//Luodaan tietokantaluokasta singleton
$app->container->singleton('db', function () {
  return new Database(DB_HOST, DB_PORT, DB_NAME, DB_USERNAME, DB_PASSWORD);
});

// Määritellään sivuston reititys
$app->get("/", function() use ($app) {
  $articles = $app->db->getArticles();
  //Tehdään artikkelien tekstistä tiivisteet
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

// Käynnistetään applikaatio
$app->run();