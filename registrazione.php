<?php
// Connessione al database
$servername = "localhost"; // Inserisci il nome del server
$username = "username"; // Inserisci il nome utente del database
$password = "password"; // Inserisci la password del database
$dbname = "adam"; // Inserisci il nome del database

// Connessione al database
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Inizializza le variabili per la registrazione
$nome = $cognome = $email = $password = "";
$nome_err = $cognome_err = $email_err = $password_err = "";

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Controlla se il nome è stato inserito
    if (empty(trim($_POST["nome"]))) {
        $nome_err = "Inserisci il nome.";
    } else {
        $nome = trim($_POST["nome"]);
    }

    // Controlla se il cognome è stato inserito
    if (empty(trim($_POST["cognome"]))) {
        $cognome_err = "Inserisci il cognome.";
    } else {
        $cognome = trim($_POST["cognome"]);
    }

    // Controlla se l'email è stata inserita
    if (empty(trim($_POST["email"]))) {
        $email_err = "Inserisci l'email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Controlla se la password è stata inserita
    if (empty(trim($_POST["password"]))) {
        $password_err = "Inserisci la password.";
    } else {
        $password = md5(trim($_POST["password"])); // Cripta la password utilizzando MD5
    }

    // Verifica se ci sono errori di input prima di inserire nel database
    if (empty($nome_err) && empty($cognome_err) && empty($email_err) && empty($password_err)) {
        // Prepara e esegui l'istruzione SQL per l'inserimento
        $sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES (?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssss", $param_nome, $param_cognome, $param_email, $param_password);
            $param_nome = $nome;
            $param_cognome = $cognome;
            $param_email = $email;
            $param_password = $password;

            if ($stmt->execute()) {
                // Reindirizza alla pagina home dopo la registrazione
                header("location: home.php");
                exit();
            } else {
                echo "Qualcosa è andato storto. Riprova più tardi.";
            }
            // Chiudi lo statement
            $stmt->close();
        }
    }
    // Chiudi la connessione al database
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
</head>
<body>

<h2>Registrazione</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>">
        <span><?php echo $nome_err; ?></span>
    </div>
    <div>
        <label>Cognome</label>
        <input type="text" name="cognome" value="<?php echo $cognome; ?>">
        <span><?php echo $cognome_err; ?></span>
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span><?php echo $email_err; ?></span>
    </div>
    <div>
        <label>Password</label>
        <input type="password" name="password">
        <span><?php echo $password_err; ?></span>
    </div>
    <div>
        <input type="submit" value="Registrati">
    </div>
</form>

</body>
</html>
