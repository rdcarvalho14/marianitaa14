<?php
header('Content-Type: application/json');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_POST['option'] === 'sim') {
    $mail = new PHPMailer(true);
    
    try {
        // Configuração do servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Ajuste para seu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'raribeirocarvalho14@gmail.com'; // Seu email
        $mail->Password = 'aifz fdqn utam svxh'; // Sua senha ou senha de app
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        // Destinatários
        $mail->setFrom('raribeirocarvalho14@gmail.com', 'Rodrigo');
        $mail->addAddress('ribeirocarvalho2005@hotmail.com', 'Mariana');
        
        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = '💖 Confirmação do Date. 💖';
        
        $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { padding: 20px; }
            .header { color: #d4145a; font-size: 24px; }
            .content { margin: 20px 0; }
            .footer { font-style: italic; color: #666; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>🎉 Confirmação de Date - Status: APROVADO! 🎉</div>
            <div class='content'>
                <p>Prezada Mariana,</p>
                
                <p>É com grande satisfação que confirmamos sua reserva para o mais romântico dos encontros!</p>
                
                <p><strong>Detalhes do Compromisso:</strong><br>
                ⏰ Data: Amanhã<br>
                📍 Local: Junto ao seu amor<br>
                👔 Dress Code: Gata, o costume<br>
                🎯 Plano: Surpresa </p>
                
                <p>Observações importantes:</p>
                <ul>
                    <li>Sorrisos são obrigatórios</li>
                    <li>Beijos serão frequentes</li>
                    <li>Não me responsabilizarei por danos irreversiveis causados a sua visão pela minha beleza</li>
                </ul>
                
                <p>P.S.: amote, sem tracinho❤️</p>
            </div>
            <div class='footer'>
                Com todo amor do mundo,<br>
                Acólito
            </div>
        </div>
    </body>
    </html>";

    // Configuração para o Mercury (servidor local)
    ini_set('SMTP', 'localhost');
    ini_set('smtp_port', '25');
    
    $headers = array(
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: Rodrigo <admin@localhost>',
        'Reply-To: Rodrigo <admin@localhost>',
        'X-Mailer: PHP/' . phpversion()
    );

        $mail->Body = $message;
        $mail->CharSet = 'UTF-8';
        
        $success = $mail->send();
        echo json_encode(['success' => $success]);
        
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'error' => $mail->ErrorInfo
        ]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
