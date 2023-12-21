<x-mail::message>
# Order Placed Successfully

Hello There,

We are excited to inform you that your order has been successfully placed. Here are the details of your order:

**Order ID:** {{$order->id}} <br>
**User Email:** {{$order->user_email}} <br>
**Order Amount:** ${{$order->order_amount}} <br>
**Status:** {{$order->status}} <br>

Thank you for choosing our services. Your order is now being processed, and we will keep you updated on its status.

If you have any questions or concerns, feel free to reach out to our customer support at contact@deer.ae.

Thank you for your business!
    <br>
    {{ config('app.name') }}
</x-mail::message>
