<!-- Affichage -->
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/css/style.css" />
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <base href="<?= $racineWeb ?>" >
        <title><?= $titre ?></title>   <!-- Élément spécifique -->
    </head>
<body>
     <div id="contenu">
        <?= $contenu ?>
    </div> 
</body>

</html>