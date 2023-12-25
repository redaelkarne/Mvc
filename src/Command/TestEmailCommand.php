<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class TestEmailCommand extends Command
{
    protected static $defaultName = 'test:email';

    protected function configure()
    {
        $this->setDescription('Send a test email');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Sending a test email...');

        try {
            $mail = new PHPMailer(true);

          
            $mail->isSMTP();
            $mail->Host = '127.0.0.1';  
            $mail->Port = 1025;         
            $mail->SMTPAuth = false;

            
            $mail->setFrom('redaelkarne2000@gmail.com', 'Reda');
            $mail->addAddress('profphp@example.com', 'M lucas');

          
            $mail->isHTML(false);
            $mail->Subject = 'Test Email';
            $mail->Body = 'This is a test email.';

            $mail->send();

            $output->writeln('Test email sent successfully.');
        } catch (Exception $e) {
            $output->writeln("Error sending email: {$mail->ErrorInfo}");
        }

        return Command::SUCCESS;
    }
}
