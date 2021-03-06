<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestra Carta</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1f59a7fced.js" crossorigin="anonymous"></script>
     <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <base href="{BASE_URL}">
</head>
<body>
    <header class="header dark">
        <div class="d-flex">
            <a class="nav-link ml-auto" href="logout">
                <button class="btn btn-check">{$smarty.session.USSER_EMAIL}</button>
            </a> 
        </div>

        <div id="logo" >
            <h1>|EL REFUGIO|</h1>
            <div id="pie-logo">BAR SERRANO</div>
        </div>
        <div class="navegador">
            <ul id="nav" >
                <a href="admin"><li>ADMINISTRAR PRODUCTOS</li></a>
                <a href="admincategory"><li>ADMINISTRAR CATEGORIAS</li></a>
                <a href="adminussers"><li>ADMINISTRAR USUARIOS</li></a>
            </ul>
        </div>
    </header>  