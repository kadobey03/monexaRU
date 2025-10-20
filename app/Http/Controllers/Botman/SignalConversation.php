<?php

namespace App\Http\Controllers\Botman;

use App\Notifications\PostForexSignal;
use App\Notifications\UpdateForexSignalResult;
use App\Traits\PingServer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Support\Facades\Notification;

class SignalConversation extends Conversation
{
    use PingServer;
    public $toDo;
    public $tradeDirection;
    public $pair;
    public $price;
    public $tp1;
    public $tp2;
    public $sl;
    public $shouldPub;
    public $ref;
    public $result;

    public function askWhatToDo()
    {
        $question = Question::create('Добро пожаловать, что бы вы хотели сделать?')
            ->fallback('Извините, я не понимаю этого, попробуйте еще раз.')
            ->callbackId('choosetodo')
            ->addButtons([
                Button::create('Отправить сигнал')->value('post_signal'),
                Button::create('Обновить результат')->value('update_result'),
            ]);

        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); // will be either 'post_signal' or 'update_result'
                $selectedText = $answer->getText(); // will be either 'Post Signal' or 'Update Result'
                if ($selectedValue == 'post_signal' || $selectedText == 'Post Signal') {
                    $this->askTradeDir();
                } else {
                    $this->askTradeRef();
                }
            }
        });
    }

    public function askResult()
    {
        $this->ask('Введите результат для этого сигнала', function (Answer $answer) {
            // Save result
            $value = $this->result = $answer->getText();
            if ($value == '') {
                return $this->repeat('Пожалуйста, введите результат сигнала');
            } else {
                $this->postResult();
            }
        });
    }

    public function updateResult()
    {
        $response = $this->fetctApi('/update-result', [
            'ref' => $this->ref,
            'result' => $this->result
        ], 'POST');

        $info = json_decode($response);

        if ($info->error) {
            $this->say($info->message);
        } else {
            //$this->say($info->data->message);
            Notification::send([$info->data->chat_id], new UpdateForexSignalResult($info->data->message, $info->data->chat_id));
        }
    }

    public function postResult()
    {
        $question = Question::create('Опубликовать результат в канале?')
            ->fallback('Извините, я не понимаю этого, попробуйте еще раз.')
            ->callbackId('postresult')
            ->addButtons([
                Button::create('Опубликовать результат')->value('post_result'),
                Button::create('пауза')->value('pause'),
            ]);
        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); // will be either 'post_signal' or 'update_result'
                $selectedText = $answer->getText(); // will be either 'Post Signal' or 'Update Result'
                if ($selectedValue == 'post_result' || $selectedText == 'Опубликовать результат') {
                    $this->updateResult();
                    $this->say('Результат успешно опубликован, введите пауза для завершения разговора');
                } else {
                    $this->say('Что-то пошло не так, попробуйте еще раз');
                    $this->askWhatToDo();
                }
            }
        });
    }

    public function askTradeRef()
    {
        $this->ask('Хорошо, поехали - Введите ID сигнала', function (Answer $answer) {
            // Save result
            $value = $this->ref = $answer->getText();

            if ($value == '') {
                return $this->repeat('Пожалуйста, введите ID сигнала');
            } else {
                $response = $this->fetctApi("/signal", [
                    'ref' => $value,
                ]);
                $info = json_decode($response);

                if ($info->error) {
                    $this->say($info->message);
                }

                $signal = $info->data->signal;

                if ($signal) {
                    $this->say($signal);
                    $this->askResult();
                } else {
                    $this->say('Сигнал с этим ID не найден, попробуйте другое значение.');
                    $this->askWhatToDo();
                }
            }
        });
    }


    public function askTradeDir()
    {
        $this->ask('Хорошо, поехали - Введите направление торговли: Buy/Sell', function (Answer $answer) {
            // Save result
            $value = $this->tradeDirection = $answer->getText();
            if ($value == '') {
                return $this->repeat('Пожалуйста, введите направление торговли');
            } else {
                $this->askPair();
            }
        });
    }


    public function askPair()
    {
        $this->ask('Отлично - Теперь введите валютную пару: например EUR/USD', function (Answer $answer) {
            // Save result
            $value = $this->pair = $answer->getText();
            if ($value == '') {
                return $this->repeat('Пожалуйста, введите валютную пару');
            } else {
                $this->askPrice();
            }
        });
    }
    public function askPrice()
    {
        $this->ask('Вы близко к цели - Введите цену', function (Answer $answer) {
            // Save result
            $value = $this->price = $answer->getText();
            if ($value == '') {
                return $this->repeat('Пожалуйста, введите цену сигнала');
            } else {
                $this->askTp1();
            }
        });
    }

    public function askTp1()
    {
        $this->ask('Введите первую цель Take Profit', function (Answer $answer) {
            // Save result
            $value = $this->tp1 = $answer->getText();
            if ($value == '') {
                return $this->repeat('Пожалуйста, введите первую цель прибыли');
            } else {
                $this->askTp2();
            }
        });
    }

    public function askTp2()
    {
        $this->ask('Введите вторую цель Take Profit', function (Answer $answer) {
            // Save result
            $value = $this->tp2 = $answer->getText();
            if ($value == '') {
                return ('Пожалуйста, введите вторую цель прибыли');
            } else {
                $this->askStopLoss();
            }
        });
    }

    public function askStopLoss()
    {
        $this->ask('Еще одна вещь - какой у вас стоп-лосс?', function (Answer $answer) {
            // Save result
            $value = $this->sl = $answer->getText();
            if ($value == '') {
                return $this->repeat('Пожалуйста, введите стоп-лосс');
            } else {
                $this->say('Отлично - это все, что нам нужно.');
                $this->addSignal();
            }
        });
    }

    public function addSignal()
    {
        $this->ask('Сохранить и опубликовать в канале?: Да или Нет', function (Answer $answer) {
            // Save result
            $reply = $answer->getText();
            $this->shouldPub = strtolower($reply);

            if ($this->shouldPub == 'yes') {
                $response = $this->fetctApi('/post-signals', [
                    'direction' => $this->tradeDirection,
                    'pair' => $this->pair,
                    'price' => $this->price,
                    'tp1' => $this->tp1,
                    'tp2' => $this->tp2,
                    'sl1' => $this->sl,
                ], 'POST');

                $value = json_decode($response);

                if ($response->successful()) {
                    $this->publishSignals($value->data->signal->id);
                    $question = Question::create('Сигнал успешно опубликован, нажмите пауза, если хотите завершить разговор')
                        ->fallback('Извините, я не понимаю этого, попробуйте еще раз.')
                        ->callbackId('discard')
                        ->addButtons([
                            Button::create('пауза')->value('pause'),
                            Button::create('Опубликовать еще один сигнал')->value('another'),
                        ]);
                }

                if ($response->failed() or $value->error) {
                    return $this->repeat('Попробовать еще раз сохранить и опубликовать в канале?: Да или Нет');
                }
            } else {
                $question = Question::create('Нажмите пауза для завершения разговора')
                    ->fallback('Извините, я не понимаю этого, попробуйте еще раз.')
                    ->callbackId('discard')
                    ->addButtons([
                        Button::create('пауза')->value('pause'),
                    ]);
            }

            $this->ask($question, function (Answer $answer) {
                // Detect if button was clicked:
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue(); // will be either 'post_signal' or 'update_result'
                    $selectedText = $answer->getText(); // will be either 'Post Signal' or 'Update Result'
                    if ($selectedValue == 'another' or $selectedText == 'Опубликовать еще один сигнал') {
                        $this->askTradeDir();
                    }
                }
            });
        });
    }

    public function skipsConversation(IncomingMessage $message)
    {
        if ($message->getText() == 'pause') {
            return true;
        }
        return false;
    }

    public function publishSignals($signl)
    {
        $response = $this->fetctApi("/publish-signals/$signl");
        $info = json_decode($response);

        if ($info->error or $response->failed()) {
            $this->say('Что-то пошло не так, попробуйте еще раз');
            $this->askWhatToDo();
        } else {
            //send to telegram
            Notification::send([$info->data->chat_id], new PostForexSignal($info->data->message, $info->data->chat_id));
        }
    }


    public function run()
    {
        $this->askWhatToDo();
    }
}