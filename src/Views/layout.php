<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exemple - Composer</title>
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/homepage.css">
    <link rel="icon" type="image/jpg" href="/image/FAVlogo.png" />

</head>
<body>
    <header>
        <img id="logo" src="/image/logo.jpg" alt="#">
        <h1>ExComposer</h1>
        <nav>
            <ul><li><a href="#">Home</a></li></ul>
            <ul><li><a href="#">Login</a></li></ul>
            <ul><li><a href="#">Inscription</a></li></ul>
        </nav>
        
    </header>

    <main>
        <?php echo $content; ?>
    </main>
     
</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
