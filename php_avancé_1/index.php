<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
<H1>Bonjour</H1>
<h2>Bienvenu sur ce script de rangement d'image</h2>
<p>Veillez a bien charger des fichier dont le repond au format "nom_de_serie-00x.jpeg</p>


<?php 
require('class/rangement.php');
if(!empty($_FILES)) {
    $image = new image();
    $images = $image->upload($_FILES);
    if($images === true) {
        
        $msg_succes = 'Le chargement a réussi';
    } else {
        $msg_error = 'Le chargement a échoué';
    }
}
?>
<?php if(isset($msg_succes)): ?>
    <p class="msg_succes"><?php echo $msg_succes ?></p>
<?php endif; ?>

<?php if (isset($msg_error)): ?>
    <p class="msg_error"><?php echo $msg_error ?></p>
<?php endif; ?>

<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
    <p>Ajoutez des images</p>
    <input type="file" name="upload[]" multiple="multiple">
    <input id="uploadFormSubmit" name="uploadFormSubmit" type="submit">
</form>


<p>Pour ranger les image contenu dans le dossier image <a href="admin/admin.php">cliquez ici</a></p>
</body>
</html>