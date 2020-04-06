<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Gaddress;
use App\termekek;
use Session;
use Auth;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $oid,$kosar,$osszeg,$osszdb;

    public function __construct($oid,$kosar,$osszeg,$osszdb)
    {
      $this->oid=$oid;
      $this->kosar=$kosar;
      $this->osszeg=$osszeg;
      $this->osszdb=$osszdb;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.OrderMail');
        return $this->markdown('emails.OrderMail')
        ->with([
          "oid"=>$this->oid,
          "kosar" =>$this->kosar,
          "osszeg" =>$this->osszeg,
          "osszdb "=>$this->osszdb

        ]);
    }
}
