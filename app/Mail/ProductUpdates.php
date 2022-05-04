<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductUpdates extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        protected string $title,
        protected string $body,
        protected $filename = null

    ) {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $build = $this->subject(__('Product Updates ' . config('app.url')))->from(config('mail.from.address'), config('app.name'))
            ->view('email.product-update', ['title' => $this->title, 'body' => $this->body]);

        if ($this->filename) {
            $build->attach($this->filename);
        }

        return $build;
    }
}