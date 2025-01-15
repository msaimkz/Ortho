<?php

use App\Models\ContactInformation;

function Contact(){

    $contact = ContactInformation::first();

    return $contact;
}
?>