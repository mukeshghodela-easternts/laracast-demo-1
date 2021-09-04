<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email)
    {
        $mailchimp = new AppClient();

        $mailchimp->setConfig([
            'apiKey' =>  config('services.mailchimp.key'),
            'server' => 'us5'
        ]);

        return $mailchimp->lists->addListMember('77bdd4d225', [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }
}
