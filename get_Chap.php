<?php



if(!empty($_POST["id_pays"])) {



?>
    <option value="">NON</option>
    <?php
    $fileexist = 'img/scan/' . $_POST["id_pays"];
    if (file_exists($fileexist)){
        $scandir = scandir('img/scan/' . $_POST["id_pays"]);
        foreach ($scandir as $fichier) {
            if ($fichier == "." or $fichier == "..") {

            } elseif ($fichier == "") {
            } else {
                ?>
                <option value="<?php echo $fichier; ?>"><?php echo $fichier; ?></option>
               <?php
            }
        }
    }
?>