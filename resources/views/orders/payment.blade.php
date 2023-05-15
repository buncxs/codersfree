<x-app-layout>
    <div class="grid grid-cols-5 gap-6 container py-8">
        <div class="col-span-3">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <p class="text-gray-700 uppercase">
                    <span class="font-semibold">Numero de orden:</span> Orden-{{ $order->id }}
                </p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                <div class="grid grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p class="text-lg font-semibold uppercase">Envio</p>
                        @if ($order->envio_type == 1)
                            <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                            <p class="text-sm">Calle Quintana Roo Cp.87020 13 y 14</p>
                        @else
                            <p class="text-sm">Los productos seran enviados a:</p>
                            <p class="text-sm">{{ $order->address }}</p>
                            <p class="text-sm">
                                {{ $order->department->name }} -
                                {{ $order->city->name }} -
                                {{ $order->district->name }}
                            </p>
                        @endif
                    </div>
                    <div>
                        <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                        <p class="text-sm">Persona que recibira el producto: {{ $order->contact }}</p>
                        <p class="text-sm">Telefono de contacto: {{ $order->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 text-gray-700">
                <p class="text-xl font-semibold mb-4">
                    Resumen
                </p>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($items as $item)
                            <tr>
                                <td>
                                    <div class="flex">
                                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                            alt="">
                                        <article>
                                            <h1 class="font-bold">
                                                {{ $item->name }}
                                            </h1>
                                            <div class="flex text-xs">
                                                @isset($item->options->color)
                                                    Color: {{ $item->options->color }}
                                                @endisset
                                                @isset($item->options->size)
                                                    - Size: {{ $item->options->size }}
                                                @endisset
                                            </div>
                                        </article>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $item->price }} USD
                                </td>
                                <td class="text-center">
                                    {{ $item->qty }}
                                </td>
                                <td class="text-center">
                                    {{ $item->price * $item->qty }} USD
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4">
                <div class="flex justify-between items-center text-gray-700 mb-6">
                    <img class="h-8" src="{{ asset('img/payments.png') }}" alt="">
                    <div>
                        <p class="text-sm font-semibold">
                            Subtotal: {{ $order->total - $order->shipping_cost }} USD
                        </p>
                        <p class="text-sm font-semibold">
                            Envio: {{ $order->shipping_cost }} USD
                        </p>
                        <p class="text-lg font-semibold uppercase">
                            Total: {{ $order->total }} USD
                        </p>
                    </div>
                </div>
                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"></script>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "{{ $order->total }}"
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(details);
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        }).render("#paypal-button-container");
    </script>
</x-app-layout>
