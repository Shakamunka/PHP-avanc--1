<?php
class image
{
    public function rangementImage()
    {
        $dir = '../images/';
        $destinationDir = '../collection/';
        
        if (is_dir($dir)) {
            $files = scandir($dir);
            if (count($files) <= 2) {
                echo 'Il n\'y a pas d\'image à trier dans le dossier images';
            } else {
                if ($handle = opendir($dir)) {
                    while (($file = readdir($handle)) !== false) {
                        if ($file != "." && $file != "..") {
                            $parts = explode("-", $file);
                            $serie = $parts[0];
                            $serieDir = $destinationDir . $serie . '/';
                            if (!is_dir($serieDir)) {
                                mkdir($serieDir);
                            }
                            rename($dir . $file, $serieDir . $file);
                            echo "L'image $file a été déplacée dans le répertoire $serieDir.<br>";
                        }
                    }
                    closedir($handle);
                }
            }
        }
    }
    public function upload($files)
{
    $upload_dir = 'images/';
    $success = true; // Initialiser le succès à vrai
    foreach ($_FILES['upload']['error'] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['upload']['tmp_name'][$key];
            $name = $_FILES['upload']['name'][$key];
            if (move_uploaded_file($tmp_name, $upload_dir . $name) == FALSE) {
                // Si le déplacement du fichier a échoué, définir le succès sur faux
                $success = false;
            }
        } else {
            // Si une erreur est détectée pour l'un des fichiers, définir le succès sur faux
            $success = false;
        }
    }
    return $success; // Retourner le statut de succès après avoir traité tous les fichiers
}
}    
?>