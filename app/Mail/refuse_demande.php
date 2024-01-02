<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class refuse_demande extends Mailable
{
    use Queueable, SerializesModels;
    private $data=[];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $id ,string $email,string $name,string $db,string $df)
    {
        $this->data=[$id,$email,$name,$db,$df];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@example.com') 
                    ->view('emails.refuser')->with(['id'=>$this->data[0],'email'=>$this->data[1],'name'=>$this->data[2],
                    'd_db'=>$this->data[3],'d_df'=>$this->data[4]]);
    }
}
