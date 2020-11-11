<?php
  // on initialise la session (toujours en tout premier !!!)
  session_start();

  require 'inc/connect.php';

  // vérifie si l'utilisateir est connecter
  if(!isset($_SESSION['user']) || empty($_SESSION['user']))
  {
    header('Location: index.php');
  }

  if(!empty($_POST))
  {
    $post = array_map('htmlspecialchars', $_POST);

    if(isset($post['podcast_id']) && isset($post['content']))
    {
      $req = $bdd->prepare('INSERT INTO commentaire (author, content, podcast_id) VALEURS (:author, :content, :podcast_id)');
      $req->bindValue(':author', $_SESSION['user']['firstName'].' '.$_SESSION['user']['lastName']);
      $req->bindValue(':content', $post['content']);
      $req->bindValue(':podcast_id', (int) $post['podcast_id']);

      if($req->execute())
      {
        header('Location: podcast.php?id='.$post['podcast_id']);
      }
    }
  }
?>