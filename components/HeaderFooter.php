<?php
function pageHeader($pageTitle){
?>
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/ressources/images/ifroceanLogo.png"/>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css"
          integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">

    <title><?php echo $pageTitle; ?></title>
</head>
<body>
<div class="content">

    <?php
    }

    function pageFooter(){
    ?>

</div>
</body>
</html>


<?php
}

?>

