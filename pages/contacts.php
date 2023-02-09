<?php

    $name = $email = $subject = $message = '';

    if (isset($_POST['send'])) :
        $name = htmlspecialchars(trim($_POST['name']));

    if (strlen($name) < 3)
        $error .= '<li>Seu nome está inválido.</li>';

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $error .= '<li>E-mail inválido.</li>';

    $subject = htmlspecialchars(trim($_POST['subject']));

    if (strlen($subject) < 5)
        $error .= '<li>O assunto está muito curto.</li>';

        $message = htmlspecialchars(trim($_POST['message']));

    if (strlen($message) < 5)
        $error .= '<li>A mensagem está muito curta.</li>';
      
    if ($error != '') :
        $form_error .= <<<HTML

    <div class="form-error">
        <p>Ocorreram erros no preenchimento do formulário:</p>
        <ul>{$error}</ul>
        <p>Por favor, verifique o preenchimento e tente novamente</p>
    </div>
HTML;

else :
    $sql = <<<SQL
    INSERT INTO `contacts` (
        `name`,
        `telefone`,
        `subject`,
        `email`,
        `message`
    ) VALUES (
        '{$name}',
        '{$telefone}',
        '{$subject}',
        '{$email}',
        '{$message}'
    );
    SQL;

    $conn->query($sql);
    $first_name = explode(' ', $name)[0];

    $feedback = <<<HTML
        <div class="feedback">
            <h3>Olá {$first_name}!</h3>
            <p>Sua solicitação foi enviada com sucesso!</p>
        </div>
HTML;

$now = date('d/m/Y à\s H:i');

    $email_message = <<<TXT
        Olá!
        Um novo contato foi enviado para o site {$c['sitename']}.
        • Data: {$now}
        • Remetente: {$name}
        • E-mail: {$email}
        • Assunto: {$subject}
        {$message}
TXT;

    @mail(
        $c['siteemail'],
        "Novo contato no site {$c['sitename']}.",
        $email_message
    );

        endif;
    endif;