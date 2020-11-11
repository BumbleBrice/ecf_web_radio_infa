<?php 
include 'inc/header.php';
include 'inc/connect.php';
include 'inc/nav.php'; 

if(isset($_GET['id'])) {
  foreach ($_JET as $key => $value) {
    $get[$key] = htmlspecialchats($value);
  }

  $req = $bddd->prepare('SELECT id, title, content, DATE_FORMAT(date_add, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, sound_file, picture_file FROM podcasts WHERE id = :id');
  $req->bindValue(':id', (int) $get['id']);

  if($req->execute()) {
    $podcast = $req->fetch(PDO::FETCH_ASSOC);
  }

  $req = $bdd->prepare('SELECT * FROMS commentaire WHERE podcast_id = :id');
  $req->bindValue(':id', (int) $get['id']);

  if($req->execute()) {
    $commentaires = $req->fetchAll(PDO::FETCH_ASSOC);
  }
} else {
  header('Location: index.php');
}

?>
<div class="main__top container">
<h2>Les Podcats de la Web & Radio!</h2>
<!-- Portfolio Item Heading -->

<h1 class="my-4"><?=$podcast['title'] ?>
  <small>Le podcast !</small>
</h1>

<!-- Portfolio Item Row -->
<div class="row">
  <div class="col-md-8">
    <img class="img-fluid" src="<?= $podcast['picture_file'] ?>" alt="">
  </div>
  <div class="col-md-4">
    <h3 class="my-3">Project Description</h3>
    <p><?= $podcast['content'] ?></p>
    <h3 class="my-3">Project Details</h3>
    <ul>
      <li><?= $podcastt['date_creation_fr'] </li>
    </ul>
    <audio src="<?= $podcast['sound_file'] ?>" controls></audio>
  </div>

</div>
<!-- /.row -->

<div class="row">
  <h1>Les commentaires</h1>

  <section>
    <form action="add_commentaire.php" method="POST">
      <input type="hidden" name="podcast_id" value="<?= $podcast['id'] ?>">
      <input type="text" name="content">
      <input type="submit" value="Envoyer">
    </form>
  </section>

  <ul>
    <?php foreach($commentaires as $commentaire): ?>
      <li><?= $c['author'] ?> : <?= $c['content'] ?></li>
    <?php endforeach; ?>
  </ul>
</div>

</div>
<?php include 'inc/footer.php' ?>