<?php

require_once(__dir__ . '/vendor/autoload.php');

$mailer = new \App\Mailer();
$database = new \Database\Database();

$mails = $database->table('mails')
    ->select()
    ->where('status', 'mail_pending')
    ->limit(10);

if($mails->count() > 0) {
    $i = 0;

    foreach ($mails->get() as $mail) {

        $i++;

        echo "Send email to " . $mail["to"] . "...\n";

        $mailer->From("Barcelcargo Mailer", "dev@barcelcargo.com")
            ->To($mail["to"])
            ->Body($mail["body_html"], $mail["body_text"])
            ->send();

        echo "Mail sent  to " . $mail["to"] . ".\n\n";

        // Update mail status
        $database->table('mails')
            ->update(["status" => "mail_sent"])
            ->where('id', $mail['id'])
            ->save();

        sleep(2);

        echo "Counter: " . $i . "\n\n";
    }
}