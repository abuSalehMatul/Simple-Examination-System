<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TextAreaAnswer extends Mailable
{
    use Queueable, SerializesModels;

    public $text_email;
    public $send_text;
   
    public $text_mes=[];
    public function __construct($text_email)
    {
        $this->text_email=$text_email;
        $this->build_layout();
    }

    public function build_layout(){
        $total=sizeof($this->text_email);
        $send_text='<div style="width:80%,backgroud:white">Hey admin, in the past 48 hours, you received'. $total. 'emails'.
                    '</div>';
       for($j=0;$j<5;$j++){
           if(sizeof($this->text_email)==$j){break;}
           $t='<div> <p> The Message was</p> <br><br>'. $this->text_email[$j]->answer. '</div>';
           array_push($this->text_mes,$t);
       }
       
    }
    public function build()
    {
        for($i=0;$i<sizeof($this->text_mes);$i++){
            return $this->html('first_total',$this->send_text)
            ->with('text_message',$this->text_mes[$j])
            ->view('view.mail_message');
        }
    }
}
