<?php

namespace App\Console\Commands;

use App\Jobs\OrderConfirmationJob;
use App\Models\Order;
use Illuminate\Console\Command;
use Mockery\Exception;

class OrderPlacement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order {email} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to place order';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $email = $this->argument('email');
        $amount = $this->argument('amount');

        try {
            $order = Order::query()->create([
                'order_amount' => $amount,
                'user_email' => $email,
                'status' => 'placed',
            ]);
            $this->info('Order Placed with Order Id: '.$order->id);
            OrderConfirmationJob::dispatch($order);
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }
}
