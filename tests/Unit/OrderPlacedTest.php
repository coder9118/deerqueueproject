<?php

namespace Tests\Unit;

use App\Jobs\OrderConfirmationJob;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class OrderPlacedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_order_placed(): void
    {
        Mail::fake();
        Queue::fake();
        Artisan::call('order rahulkumar9118@gmail.com 50');
        $this->assertTrue(Order::query()->count() > 0);
        Queue::assertPushed(OrderConfirmationJob::class);
    }
}
