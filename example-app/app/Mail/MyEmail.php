<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $productsDetails;

    public function __construct(Order $order, $productsDetails)
    {
        $this->order = $order;
        $this->productsDetails = $productsDetails;
    }

    public function build()
    {
        return $this->view('emails.order_receipt')
                    ->with([
                        'order' => $this->order,
                        'productsDetails' => $this->productsDetails
                    ]);
    }
}


