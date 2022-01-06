<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        app()->bind(Newsletter::class, function() {

            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20'
            ]); 

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }
}
