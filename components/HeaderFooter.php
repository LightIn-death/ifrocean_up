<?php
function pageHeader($pageTitle){
?>
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/ressources/images/ifroceanLogo.png"/>
    <link rel="stylesheet" href="/css/Style.css">

    <title><?php echo $pageTitle; ?></title>
</head>
<body>

<div id="content">
    <?php
    }

    function pageFooter(){
    ?>


</div>


</div>
</body>
</html>


<?php
}



function alert($msg)
{ ?>
    <script type="text/javascript">
        var msg = "<?php echo $msg ?>";
        alert(msg);
    </script>
    <?php
}




