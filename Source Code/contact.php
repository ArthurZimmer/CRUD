<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contato</h1>
    <form action="send_email.php" method="post">
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="subject">Assunto:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>
        
        <label for="message">Mensagem:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        
        <input type="submit" value="Send">
    </form>
</body>
</html>
