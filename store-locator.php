<?php include 'libs/header.php' ?>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['msg_submit'])) {
    $msg_name = $_POST['msg_name'];
    $msg_email = $_POST['msg_email'];
    $msg_contact_no = $_POST['msg_contact_no'];
    $msg_city = $_POST['msg_city'];
    $msg_country = $_POST['msg_country'];
    $msg_subject = $_POST['msg_subject'];
    $msg_details = $_POST['msg_details'];

    $mail = new PHPMailer(true);

    try {

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'berettastore.com.pk';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@berettastore.com.pk';
        $mail->Password   = 'Pakistan@1947';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('info@berettastore.com.pk', 'Beretta Store Pakistan');
        $mail->addAddress('info@berettastore.com.pk');
        $mail->addReplyTo('info@berettastore.com.pk', 'Information');
        $mail->addCC('info@vis2020.com.pk');


        //Content
        $mail->isHTML(true);
        $mail->Subject = "New Message!";
        $mail->Body    =  "<table style='border: 1px solid gray; width: 800px; margin: 30px auto; padding: 30px;'>
        <thead>
        <tr>
        <th colspan='2' style='text-align: center;'><img src='https://berettastore.com.pk/_img/logo.png' style='width: 50%; margin: 20px auto;'></th>
        </tr>
        </thead>
        <tbody>
        <tr style='background: #152f44;'>
        <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px;'>
        CONTACT DETAILS
        </td>
        </tr>
        <tr>
        <td style='padding: 10px 30px;'>
        Full Name
        </td>
        <td style='padding: 10px 30px;'>
        $msg_name
        </td>
        </tr>
        <tr>
        <td style='padding: 10px 30px;'>
        Mobile Number
        </td>
        <td style='padding: 10px 30px;'>
        $msg_contact_no
        </td>
        </tr>
        <tr>
        <td style='padding: 10px 30px;'>
        Email Address
        </td>
        <td style='padding: 10px 30px;'>
        $msg_email
        </td>
        </tr>
        
        <tr>
        <td style='padding: 10px 30px;'>
        Country, City
        </td>
        <td style='padding: 10px 30px;'>
        $msg_country, $msg_city
        </td>
        </tr>
        <tr>
        <td style='padding: 10px 30px;'>
        Subject :
        </td>
        <td style='padding: 10px 30px;'>
        $msg_subject
        </td>
        </tr>
        <tr>
        <td style='padding: 10px 30px;'>
        Message:
        </td>
        <td style='padding: 10px 30px;'>
        $msg_details
        </td>
        </tr>
        <tr>
        <tr style='background: #f3f3f3;'>
        <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px; color: black;'>
        Email is Powered By <a href='https://www.swismax.com' style='color: red;'>Swismax Solutions FZE</a>
        </td>
        </tr>
        </tbody>
        </table>";

        if (!$mail->send()) {
            echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Something went wrong!"); </script>';
        } else {

            ///////////////////////////////////////----CUTOMER MAIL----///////////////////////////////////////////////

            $mail = new PHPMailer(true);

            try {

                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'berettastore.com.pk';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'info@berettastore.com.pk';
                $mail->Password   = 'Pakistan@1947';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                //Recipients
                $mail->setFrom('info@berettastore.com.pk', 'Beretta Store Pakistan');
                $mail->addAddress($msg_email);
                $mail->addReplyTo('info@berettastore.com.pk', 'Information');


                //Content
                $mail->isHTML(true);
                $mail->Subject = "Thank you for contacting Beretta Store Pakistan";
                $mail->Body    =  "<table style='border: 1px solid gray; width: 800px; margin: 30px auto; padding: 30px;'>
                <thead>
                <tr>
                <th colspan='2' style='text-align: center;'><img src='https://berettastore.com.pk/_img/logo.png' style='width: 50%; margin: 20px auto;'></th>
                </tr>
                </thead>
                <tbody>
                <tr style='background: #152f44;'>
                <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px;'>
                THANK YOU MESSAGE
                </td>
                </tr>
                <tr>
                <td colspan='2' style='padding: 10px 30px;'>
                <p>
                Dear $msg_name,<BR>
                Your message has been submitted successfully.<BR>Thank you for contacting Beretta Store Pakistan<BR><BR>
                <strong>Kindest Regards,</strong><BR>
                Beretta Store Pakistan
                </p>
                </td>
                </tr>
                <tr>
                <tr style='background: #f3f3f3;'>
                <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px; color: black;'>
                Email is Powered By <a href='https://www.swismax.com' style='color: red;'>Swismax Solutions FZE</a>
                </td>
                </tr>
                </tbody>
                </table>";
                if (!$mail->send()) {
                    echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Something went wrong!"); </script>';
                } else {
                    echo '<script> $("#success").show().delay(3000).fadeOut("slow"); $("#success_msg").html("Thankyou for messaging."); </script>';
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<section class="bg-pri">
    <div class="contaienr py-4">
        <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">Store Locator</h2>
    </div>
</section>

<section class="bg-gray-50">
    <div class="container py-16">
        <div class="w-full lg:w-2/3 mx-auto bg-white border p-6 lg:p-8">
            <h1 class="text-center font-bold lg:text-3xl text-2xl mb-8">
                LEAVE US<BR class="block lg:hidden"> MESSAGE
            </h1>
            <form method="post">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm lg:text-base mb-2">Your Full Name</label>
                        <input type="text" name="msg_name" class="border w-full py-2 px-4 text-sm lg:text-base focus:bg-gray-50 outline-none">
                    </div>

                    <div class="mb-4 ">
                        <label for="email" class="block text-sm lg:text-base mb-2">Email <small>(Business/Personal)</small></label>
                        <input type="email" id="email" name="msg_email" class="border w-full py-2 px-4 text-sm lg:text-base focus:bg-gray-50 outline-none">
                    </div>
                </div>


                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm lg:text-base mb-2">Contact No.</label>
                        <input type="number" name="msg_contact_no" class="border w-full py-2 px-4 text-sm lg:text-base focus:bg-gray-50 outline-none">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm lg:text-base mb-2">Country</label>
                        <input type="text" name="msg_country" class="border w-full py-2 px-4 text-sm lg:text-base focus:bg-gray-50 outline-none">
                    </div>
                </div>



                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm lg:text-base mb-2">City</label>
                        <input type="text" name="msg_city" class="border w-full py-2 px-4 text-sm lg:text-base focus:bg-gray-50 outline-none">
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm lg:text-base mb-2">Subject</label>
                        <input type="text" name="msg_subject" class="border w-full py-2 px-4 text-sm lg:text-base focus:bg-gray-50 outline-none">
                    </div>
                </div>

                <div class="mb-8">
                    <label for="message" class="block text-sm lg:text-base mb-2">Message <small>(Details)</small></label>
                    <textarea id="message" name="msg_details" name="message" class="border w-full py-2 px-4 text-sm lg:text-base focus:bg-gray-50 outline-none resize-none" rows="5"></textarea>
                </div>


                <div class="flex justify-center">
                    <button type="submit" name="msg_submit" class="bg-pri text-white text-sm lg:text-base py-2 px-6">Send Message</button>
                </div>
            </form>

        </div>
    </div>
</section>

<section>
    <div class="container py-16">
        <img src="imgs/store-locator.jpg" class="grayscale" alt="">
    </div>
</section>


<section class="bg-pri">

    <div class="container py-16">
        <h3 class="text-center font-bold lg:text-3xl text-2xl mb-12 text-white">Opening Hours</h3>

        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-7 text-center gap-5 text-white">
            <div>
                <h3 class="font-bold text-xl lg:text-2xl">Sunday</h3>
                <p class="mt-2 text-sm lg:text-base">11:00 - 19:00</p>
            </div>

            <div>
                <h3 class="font-bold text-xl lg:text-2xl">Monday</h3>
                <p class="mt-2 text-sm lg:text-base">11:00 - 19:00</p>
            </div>

            <div>
                <h3 class="font-bold text-xl lg:text-2xl">Tuesday</h3>
                <p class="mt-2 text-sm lg:text-base">11:00 - 19:00</p>
            </div>

            <div>
                <h3 class="font-bold text-xl lg:text-2xl">Wednesday</h3>
                <p class="mt-2 text-sm lg:text-base">11:00 - 19:00</p>
            </div>

            <div>
                <h3 class="font-bold text-xl lg:text-2xl">Thursday</h3>
                <p class="mt-2 text-sm lg:text-base">11:00 - 19:00</p>
            </div>

            <div>
                <h3 class="font-bold text-xl lg:text-2xl">Friday</h3>
                <p class="mt-2 text-sm lg:text-base">11:00 - 19:00</p>
            </div>

            <div>
                <h3 class="font-bold text-xl lg:text-2xl">Saturday</h3>
                <p class="mt-2 text-sm lg:text-base">11:00 - 19:00</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="bg-gray-100 border p-5 lg:col-span-2">
                <div class="flex flex-col lg:flex-row justify-between gap-5 items-start lg:items-center">
                    <h3 class="text-pri text-xl lg:text-2xl font-bold">Vision 2020 - Master Distributor</h3>
                    <div class="flex flex-col lg:flex-row gap-2 lg:gap-5">
                        <p class="leading-relaxed text-base lg:text-lg">
                            <span class="font-bold">Tel:</span> +92 51 84 87 781-2
                        </p>
                        <p class="leading-relaxed text-base lg:text-lg">
                            <span class="font-bold">Fax:</span> +92 51 84 87 783
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 border p-5">
                <h3 class="text-pri text-xl lg:text-2xl font-bold mb-3">Karachi Address</h3>
                <p class="leading-relaxed text-sm lg:text-base mb-3 lg:mb-0">
                    Beretta At Karachi<BR>
                    Lower Ground Floor, Ocean Towers, Clifton, Karachi.
                </p>
                <p class="leading-relaxed text-sm lg:text-base mb-8">
                    <span class="font-bold">Tel:</span> +92 21 3516 1616
                </p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7242.338264461443!2d67.035556!3d24.823889!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33deeaa4dcd79%3A0x34a0fd87faee70ef!2sBeretta%20at%20Karachi!5e0!3m2!1sen!2sus!4v1697107415852!5m2!1sen!2sus" class="w-full h-[450px] border" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="bg-gray-100 border p-5">
                <h3 class="text-pri text-xl lg:text-2xl font-bold mb-3">Peshawar Address</h3>
                <p class="leading-relaxed text-sm lg:text-base mb-3 lg:mb-0">
                    MGSA - Beretta Authorized Retailer<BR>
                    Shop # 34, Gul Haji Plaza, University Road, Peshawar
                </p>
                <div class="flex flex-col lg:flex-row gap-2 lg:gap-5 mb-8">
                    <p class="leading-relaxed text-sm lg:text-base">
                        <span class="font-bold">Tel:</span> +92 91 5711 371 - 2
                    </p>
                    <p class="leading-relaxed text-sm lg:text-base">
                        <span class="font-bold">Fax:</span> +92 91 5711 373
                    </p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.4897958422594!2d71.50591179999999!3d34.00563650000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d9171946c46d21%3A0xde4e01208a4d584a!2sGul%20Haji%20Plaza!5e0!3m2!1sen!2s!4v1699593943280!5m2!1sen!2s" class="w-full h-[450px] border" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<?php include 'libs/footer.php' ?>