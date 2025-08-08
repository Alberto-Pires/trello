<?php
namespace app\controllers;

use app\models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RecuperarController {
    public function index() {
        include_once __DIR__ . '/../views/index/recuperar.php';
    }

    public function enviar() {
        //echo "Método enviar foi chamado"; exit;
        $email = $_POST['email'] ?? '';
        if (empty($email)) {
            echo "Por favor, insira um e-mail.";
            return;
        }

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user) {
            echo "E-mail não encontrado.";
            return;
        }

        $token = bin2hex(random_bytes(16));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $userModel->saveResetToken($email, $token, $expira);

        $link = "http://localhost:1000/redefinir?token=$token";
        $mensagem = "
            <h3>Olá {$user['name']},</h3>
            <p>Clique no link abaixo para redefinir sua senha. Este link expirará em 1 hora.</p>
            <p><a href='$link'>$link</a></p>
        ";

        // Enviando com PHPMailer
        require_once __DIR__ . '/../../vendor/autoload.php';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Exemplo: smtp.gmail.com
            $mail->SMTPAuth = true;
            $mail->Username = 'carlos9053350@gmail.com'; // Seu e-mail
            $mail->Password = 'pbfzzmjcvwkrsemo'; // Sua senha ou app password
            $mail->SMTPSecure = 'tls'; // Ou 'ssl'
            $mail->Port = 587; // 465 para SSL

            $mail->setFrom('carlos9053350@gmail.com', 'TRELLO');
            $mail->addAddress($email, $user['name']);

            $mail->isHTML(true);
            $mail->Subject = 'Redefinição de senha';
            $mail->Body = $mensagem;

            $mail->send();
            echo "Um link de recuperação foi enviado para seu e-mail.";
        } catch (Exception $e) {
            // Em caso de erro, salve no log como backup
            file_put_contents(__DIR__ . '/../../logs/emails.txt', "Erro ao enviar para: $email\nErro: {$mail->ErrorInfo}\nMensagem: $mensagem\n\n", FILE_APPEND);
            echo "Erro ao enviar e-mail. Link salvo no log.";
        }
    }

    public function atualizar() {
        $token = $_POST['token'] ?? '';
        $novaSenha = $_POST['nova_senha'] ?? '';

        $userModel = new User();
        $user = $userModel->findByToken($token);

        if (!$user) {
            echo "Token inválido ou expirado.";
            return;
        }

        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $userModel->updatePassword($user['id'], $senhaHash);

        echo "Senha redefinida com sucesso!";
    }
}
