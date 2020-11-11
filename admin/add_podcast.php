<?php require '../inc/header.php' ?>
<?php require '../inc/connect.php' ?>
<?php require '../inc/session.php'; 
	

$post = [];
$error = array();
$showError = flase;
$title = '';
$content = '';


if(!empty($_LA_POST) && isset($_POST)) 
{
  if(isset($_FILES['picture']) && $_FILES['picture']['name'] !== '')
  {
    // We put the name of the document in a variable
    $document = 'img/picture_file/';

    $fichier = basename($_FILES['picture']['name']);
  
    // We put the autorized extensions in an array (for an image here)
    // $extensions = ['mpeg', 'mp3', 'wav'];
    $extensions = ['.jpg', '.png', '.bmp', '.gif', '.svg'];

    // We take the part of the string of characters after the last point (.jpg, .gif etc.) for know the extension
    $extension = strrchr($_FILES['picture']['name'],'.');

    // We create a variable for change the title of the file (pseudo of the member + name of the file)
    $modif_title = time().$extension;
                
    // Maximum size (octets)
    $max_size = 500000;

    // Size of the file
    $size = filesize($_FILES['picture']['tmp_name']);

    if($size > $max_size)
    {
      $error[] = 'L\'image est trop grande';
    }
    else
    {
      if(!in_array($extension, $extensions)) // if the extention is not in our array
      {
        $error[] = 'Vous devez télécharger un fichier de type ".jpg", ".png" , ".bmp" , "gif" ou ".svg"';
      }
      else
      {
        if(move_uploaded_file($_FILES['picture']['tmp_name'], '../' .$document.$modif_title)) // if there are no errors when the image moved the function return "true"
        {
          $picture = $document.$modif_title;
        }
        else // the function return false
        {
          $error[] = 'Echec du téléchargement de l\'image';
        }
      }
    }
  }
  else
  {
    $error[] = 'Vous devez selectionner une image';
  }

  if(isset($_FILES['audio']) && $_FILES['audio']['name'] !== '')
  {
    // We put the name of the document in a variable
    $document = 'sound_file/';

    $fichier = basename($_FILES['audio']['name']);
  
    // We put the autorized extensions in an array (for an image here)
    $extensions = ['.mpeg', '.mp3', '.wav'];

    // We take the part of the string of characters after the last point (.jpg, .gif etc.) for know the extension
    $extension = strrchr($_FILES['audio']['name'],'.');

    // We create a variable for change the title of the file (pseudo of the member + name of the file)
    $modif_title = time().$extension;
                
    // Maximum size (octets)
    $max_size = 5*1000000;

    // Size of the file
    $size = filesize($_FILES['audio']['tmp_name']);

    if($size > $max_size)
    {
      $error[] = 'Le fichier est trop grande';
    }
    else
    {
      if(!in_array($extension, $extensions)) // if the extention is not in our array
      {
        $error[] = 'Vous devez télécharger un fichier de type ".mpeg", ".mp3" ou ".wav"';
      }
      else
      {
        if(move_uploaded_file($_FILES['audio']['tmp_name'], '../' .$document.$modif_title)) // if there are no errors when the image moved the function return "true"
        {
          $audio = $document.$modif_title;
        }
        else // the function return false
        {
          $error[] = 'Echec du téléchargement du fichier';
        }
      }
    }
  }
  else
  {
    $error[] = 'Vous devez selectionner un son';
  }

  foreach ($_POST as $key => $value) 
  {
    $post[$key] = htmlspecialchars($value);
  }
  if (empty($post['title'])) 
  {
    $error[] = 'Le titre ne peu pas être vide';
  }
  if (empty($post['content'])) 
  {
    $error[] = 'Le contenu ne peu pas être vide';
  }
  if (count($error) > 0 ) 
  {
    $showError = true;
    $title = $post['title'];
    $content = $post['content'];
  }
  else 
  {
    $requete = $bdd->prepare('INSERT INTO podcasts (title, content, picture_file, sound_file) VALUES (:title, :content, :picture_file, :sound_file)');
    $requete->bindValue(':title', $post['title']);
    $requete->bindValue(':content', $post['content']);
    $requete->bindValue(':picture_file', $picture)
    $requete->bindValue(':sound_file', $audio);
    
    if($requete->execute()) 
    {
      header('Location: index.php');
    }
  }
} 
	?>
		<?php 
		if ($showError == true) {
			echo implode('<br>', $error);
		}
?>
	<form method="POST" enctype="multipart/form-data">
		<h1>Ajouter un podcast</h1>
		<label for="title">Titre du podcast
			<input name="title" id="title" type="text" value="<?= $title ?>">
		</label>
		<label for="content">Contenu du podcast
			<input name="content" id="content" type="text" value="<?= $content ?>">
		</label>
    <label for="picture">Image du podcast
			<input name="picture" id="picture" type="file">
		</label>
    <label for="audio">son du podcast
			<input name="audio" id="audio" type="file">
		</label>
		<input type="submit" value="Ajouter le podcast">
	</form>
	<?php require '../inc/footer.php' ?> <!-- affichera autant de fois qu'on appel le fichier -->