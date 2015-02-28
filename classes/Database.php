<?php

Class Database {

  private $pdo;

  function __construct($address, $port, $name, $user, $password)
  {
    $this->pdo = new PDO("mysql:host=$address;port$=$port;dbname=$name;charset=utf8", $user, $password);
    $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getArticles(){
    $query = $this->pdo->query("SELECT id, date, title, content FROM article ORDER BY date DESC");
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
  }

  public function getSingleArticle($articleId){
    $query = $this->pdo->prepare("SELECT id, date, title, content FROM article WHERE id = ?");
    $query->bindParam(1, $articleId);
    $query->execute();
    $article = $query->fetch(PDO::FETCH_ASSOC);
    return $article;
  }

  public function updateArticle($articleId, $title, $date, $content) {
    $query = $this->pdo->prepare("UPDATE article SET date=:date, title=:title, content=:content WHERE id=:id");
    $query->bindParam(":title", $title);
    $query->bindParam(":date", $date);
    $query->bindParam(":content", $content);
    $query->bindParam(":id", $articleId);
    $query->execute();
  }

  public function deleteArticle($articleId){
    $query = $this->pdo->prepare("DELETE FROM article WHERE id = ?");
    $query->bindParam(1, $articleId);
    $query->execute();
  }

  public function insertNewArticle($title, $date, $content){
    $query = $this->pdo->prepare("INSERT INTO article (title, date, content) VALUES (:title, :date, :content)");
    $query->bindParam(":title", $title);
    $query->bindParam(":date", $date);
    $query->bindParam(":content", $content);
    $query->execute();
  }

}