<?php

namespace Tests\Feature;

use App\Mail\ProductsImported;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     * @doesNotPerformAssertions
     * @return void
     */
    public function test_email()
    {
        Mail::to('saverio.migale@hotmail.com')
            ->send(new ProductsImported);
    }
}