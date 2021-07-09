<?php


namespace app\Controllers;



use app\core\Controller;
use app\core\Helper;
use app\core\Session;
use app\core\Validator;
use app\models\ArticleModel;
use app\models\NewsLetterInscriModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class NewsLetterInscriController extends Controller
{

    public function inscription()
    {
        $validator = new Validator();
        $data = $validator->sanitize($_POST);
        $errors = $validator->require($data);
        if(empty($errors))
        {
            $test = NewsLetterInscriModel::getByQuery("SELECT email FROM newsletter_inscription WHERE email = '".$data['email']."'");
            if(empty($test))
            {
                $new = new NewsLetterInscriModel();
                $new->setEmail($data['email']);
                if($new->register()){
                    echo json_encode("success");
                }else{
                    echo json_encode("repeat");
                };

            }else{
                echo json_encode("repeat");
            }
        }else{
                echo json_encode("empty");

        }
    }

    public function newsletterPage()
    {
        $arr['title'] = "NewsLetter";
        $arr['inscriptions'] = NewsLetterInscriModel::getAll();
        return $this->renderAdmin('newsletter',$arr);
    }

    public function sendEmails()
    {

        $emails = NewsLetterInscriModel::getByQuery("SELECT email FROM newsletter_inscription");

        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                        // Enable verbose debug output
            $mail->isSMTP();                                                // Send using SMTP
            $mail->CharSet    = "UTF-8";
            $mail->Host       = 'smtp.gmail.com';                           // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                       // Enable SMTP authentication
            $mail->Username   = 'hamzaeraoui2000@gmail.com';                // SMTP username
            $mail->Password   = '';                           // SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;
            //Recipients
            $mail->setFrom('siaNewsletter@lsia.com','labo sia');
            foreach ($emails as $eml){
                foreach ($eml as $em){
                    $mail->addAddress($em);
                }
            }
            $mail->addReplyTo('siaNewsletter@lsia.com', 'labo sia');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            /*
            $mail->addAttachment('/var/tmp/file.tar.gz');               //Add attachments
            */
            //$mail->addAttachment('/Storage/Statics/images/logo.jpg', 'new.jpg');    //Optional name


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'This msg from sia labo';

            $article = ArticleModel::getAll("Order by date DESC limit 1");
            $result =   $this->renderEmpty('emailTemplate',['title'=>'title','article' => $article]);
            //file_get_contents( "../Views/emailTemplate.php",false,$stream)
            $mail->Body    = $result;

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $session = new Session();
            $session->setFlash('msg_sent',"messages has been sent");
            Helper::redirect($_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            $session = new Session();
            $session->setFlash('msg_not_sent',"Message could not be sent. check your internet");
            Helper::redirect($_SERVER['HTTP_REFERER']);
            //echo "<br>Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function newsletterDelete(){
        if(isset($_POST['id']))
        {
            NewsLetterInscriModel::executeQuery("DELETE FROM newsletter_inscription WHERE id = ".$_POST['id']);
            NewsLetterInscriModel::deleteByPk($_POST['id']);
            $session = new Session();
            $session->setFlash('msg_sent',"email deleted with success");
            Helper::redirect($_SERVER['HTTP_REFERER']);
        }else{
            Helper::redirect($_SERVER['HTTP_REFERER']);
        }
    }


}