<?php

namespace App\Mail;

use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reponse_admin extends Mailable
{
    use Queueable, SerializesModels;
private $data=[];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $id ,string $email,string $name,string $db,string $df,int $id_demnd)
    {
       $this->data=[$id,$email,$name,$db,$df,$id_demnd];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
  
    public function build()
    {
        return $this->from('sender@example.com') // Set your sender address here
                    ->view('emails.confirmation')->with(['id'=>$this->data[0],'email'=>$this->data[1],'name'=>$this->data[2],
                    'd_db'=>$this->data[3],'d_df'=>$this->data[4],'link'=> base64_encode($this->data[5].'///'.$this->data[0])]);
    }
}
