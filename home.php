<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>ADAM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* Stili CSS per la navbar */
        .navbar {
            overflow: hidden;
            background-color: #648cc0;
        }
        
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.centered {
    width: 80%; /* Regola la larghezza del riquadro centrale */
    height: 80%; /* Regola l'altezza del riquadro centrale */
    border: 1px solid #ccc; /* Aggiungi un bordo per evidenziare il riquadro */
}

iframe {
    width: 100%;
    height: 100%;
}

    </style>
</head>

<body>

<div class="navbar">
    <a href="prenotazioni.php">Prenotazioni</a>
    <a href="compra.php">Compra</a>
    <a href="FAQ.php">FAQ</a>
</div>

<!-- Contenuto della pagina -->
<h2>Benvenuto nella nostra piattaforma!</h2>
<p>Qui puoi navigare tra le diverse opzioni dal menu di navigazione sopra.</p>

<div class="container">
    <div class="centered">
        
        <iframe src="map.php" frameborder="0"></iframe>
    </div>
</div>


</body>
</html>
