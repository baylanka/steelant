<?php

namespace helpers\clients;

use model\User;
use PHPMailer\PHPMailer\PHPMailer;
use helpers\translate\Translate;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


class EmailClient
{

    public $mail;

    public function __construct()
    {
        global $env;
        $this->mail = new PHPMailer();
        $this->mail->SMTPDebug = 0;
        $this->mail->isSMTP();
        $this->mail->Host = $env["EMAIL_HOST"];
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $env["EMAIL_USER"];
        $this->mail->Password = $env["EMAIL_PASSWORD"];
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->isHTML(true);
        $this->mail->setFrom($env["EMAIL_USER"], $env["EMAIL_NAME"]);
    }

    public function send($to, $subject, $body)
    {
        $this->mail->addAddress($to);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->send();
    }


    public function sendVerificationMail($email, $key)
    {
        return $this->send($email, "Verification", '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Your Account</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <tr>
                    <td align="center">
                        <img src="https://www.steelwall.eu/de/images/sw%20logo%20rgb%20big-crop-u58751.jpg?crc=505838474" alt="Company Logo" style="max-width: 150px;">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2 style="color: #333333;">Verify Your Account</h2>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 10px;">
                        <p style="color: #666666;">To complete your account setup, please click the button below:</p>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 20px;">
                        <a href="'.url("/verify").'?key=' .User::KEY_PREFIX . $key . User::KEY_SUFFIX  . '" style="display: inline-block; background-color: #1d357c; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Verify Account</a>
                    </td>
                </tr>
                <tr style="padding-top: 50px;">
                    <td align="center">
                        <small style="color: #333333;">&copy; 2024 SteelWall. All rights reserved.</small>
                    </td>
                </tr>
            </table>
        </body>
        </html>

');
    }


    public function sendCredentials($email,$password)
    {
        return $this->send($email, "New Account Credentials", '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>New Account Credentials</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <tr>
                    <td align="center">
                        <img src="https://www.steelwall.eu/de/images/sw%20logo%20rgb%20big-crop-u58751.jpg?crc=505838474" alt="Company Logo" style="max-width: 150px;">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2 style="color: #333333;">Your Account Credentials</h2>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 10px;">
                        <p style="color: #666666;">Steelwall Admin has created an account for you. Please use these credentials to login.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 10px;">
                        <p style="color: #666666;"><b>Mail :</b> '.$email.'</p><br/>
                        <p style="color: #666666;"><b>Password :</b> '.$password.'</p><br/>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 10px;">
                        <small style="color: #333333;">This password is automatically generated. You can also update your password on the profile page. </small>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 20px;">
                        <a href="'.url("/login").'" style="display: inline-block; background-color: #1d357c; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Login</a>
                    </td>
                </tr>
                <tr style="padding-top: 50px;">
                    <td align="center">
                        <small style="color: #333333;">&copy; 2024 SteelWall. All rights reserved.</small>
                    </td>
                </tr>
            </table>
        </body>
        </html>

');
    }

    public function sendInquiryMail($request)
    {

        global $env;
        $mail = "";
        switch ($request->get("location")){
            case "eu":
                $mail = $env["EMAIL_EU"];
                break;
            case "north-america":
                $mail = $env["EMAIL_NORTH_AMERICA"];
                break;
        }



        return $this->send($mail, "Contact page - inquiry", '

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Information</title>
        </head>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <tr>
                    <td align="center">
                        <img src="https://www.steelwall.eu/de/images/sw%20logo%20rgb%20big-crop-u58751.jpg?crc=505838474" alt="Company Logo" style="max-width: 150px;">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2 style="color: #333333;">Contact Information</h2>
                    </td>
                </tr>
                <tr>

                        <table cellpadding="0" cellspacing="0" style="margin: 0 auto;">
                            <tr>
                                <td style="padding-right: 10px;"><strong>Name:</strong></td>
                                <td>' . $request->get("name") . '</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;"><strong>Job:</strong></td>
                                <td>' . $request->get("job") . '</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;"><strong>Division:</strong></td>
                                <td>' . $request->get("division") . '</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;"><strong>Company:</strong></td>
                                <td>' . $request->get("company") . '</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;"><strong>Country:</strong></td>
                                <td>' . $request->get("country") . '</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;"><strong>Email:</strong></td>
                                <td>' . $request->get("email") . '</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;"><strong>Phone:</strong></td>
                                <td>' . $request->get("phone") . '</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 10px;"><strong>Message:</strong></td>
                                <td>' . $request->get("message") . '</td>
                            </tr>
                        </table>
                </tr>
            </table>
        </body>
        </html>

');





    }


}