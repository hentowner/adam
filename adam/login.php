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

// Inizializza le variabili per l'email e la password
$email = $password = "";
$email_err = $password_err = "";

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        $password = trim($_POST["password"]);
    }

    // Verifica le credenziali dell'utente
    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT id, email, password FROM utenti WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password corretta, avvia una nuova sessione
                            session_start();

                            // Salva i dati dell'utente nella sessione
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            // Reindirizza alla pagina home
                            header("location: home.php");
                        } else {
                            // Mostra un errore se la password è sbagliata
                            $password_err = "La password inserita non è valida.";
                        }
                    }
                } else {
                    // Mostra un errore se l'email non è registrata
                    $email_err = "Nessun account trovato con questa email.";
                }
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
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
            <input type="submit" value="Login">
        </div>
    </form>
    <p>Non hai un account? <a href="registrazione.php">Registrati qui</a>.</p>
</body>

</html>
