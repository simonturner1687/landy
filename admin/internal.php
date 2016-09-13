<?php  include('MailChimp.php'); 

$email_address = $_POST['email_address'];
$FNAME = $_POST['FNAME'];
$LNAME = $_POST['LNAME'];
$TOPIC = $_POST['TOPIC'];

   use \DrewM\MailChimp\MailChimp;

$MailChimp = new MailChimp('5d783bbb157b2aa6cf9a4346b8c9b043-us9');

$list_id = '1546a62b84';

$result = $MailChimp->post("lists/$list_id/members", [
                'email_address' => '$email_address',
                'merge_fields' => ['FNAME'=>'$FNAME', 'LNAME'=>'$LNAME', 'TOPIC'=>'$TOPIC'],
                'status'        => 'subscribed',
            ]);

if ($MailChimp->success()) {
    print_r($result);   
} else {
    echo $MailChimp->getLastError();
}

?>