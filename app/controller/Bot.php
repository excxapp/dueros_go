<?php
namespace app\controller;
use Baidu\Duer\Botsdk\Bot as DuerosBot;

class Bot extends DuerosBot
{
    public function __construct($postData = [])
    {
        parent::__construct($postData);
        $this->addLaunchHandler(function () {
            return [
                    'card'         => null,
                    'outputSpeech' => 'Hi!',
                    'directives'   => [],
                    'resource'     => null,
                    'reprompt'     => null,
                ];
        });
        $this->addSessionEndedHandler(function () {
            return [
                    'card'         => null,
                    'outputSpeech' => 'Bye!',
                    'directives'   => [],
                    'resource'     => null,
                    'reprompt'     => null,
                ];
        });
        $this->addIntentHandler('say_hello', function () {
            return [
                'card'         => null,
                'outputSpeech' => 'Hello Word!',
                'directives'   => [],
                'resource'     => null,
                'reprompt'     => null,
            ];
        });
    }
}