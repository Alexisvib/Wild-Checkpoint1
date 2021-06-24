<?php

require __DIR__ .'/model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $name = cleanData($_POST['name']);
    $payment = cleanData($_POST['payment']);
    $errors = [];

    // Check is black input or just with spaces
    if(empty($name) || empty($payment)) {
        $errors['Empty_Field'] = "Fields Name and Payment Should not be Empty !";
    }

    // Check if negative payment
    if(intval($payment)<0) {
        $errors['Negative_Payment'] = "Payment could not be Negative !";
    }

    if($name === 'Eliott Ness' ) {
        $errors['Eliott_Ness'] = "This man is untouchable !!!";
    }



    // Add the Data or Print the errors message
    if(!empty($errors)) {
        header('location: /book.php?' . http_build_query($errors));
    }else {
        addData($name, $payment);
        header('location: /book.php?' . 'data_add=true');
    }

}


function cleanData($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}