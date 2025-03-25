<!DOCTYPE html>
<html>
<head>
    <title>Recibo de Orden #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .receipt {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #d769a3;
            padding-bottom: 10px;
        }
        .order-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
        }
        .items-table th, .items-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .total-section {
            margin-top: 20px;
            text-align: right;
        }
        .barcode {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h1>Recibo de Orden</h1>
            <p>Número de Orden: {{ $order->id }}</p>
        </div>

        <div class="order-details">
            <div>
                <strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}<br>
                <strong>Método de Pago:</strong> {{ $order->transaction->mode }}
            </div>
            <div>
                <strong>Código de Referencia:</strong> {{ $order->reference_code }}
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <p><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
            <p><strong>Descuento:</strong> ${{ number_format($order->discount, 2) }}</p>
            <p><strong>IVA:</strong> ${{ number_format($order->tax, 2) }}</p>
            <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
        </div>

        <div class="barcode">
            <img src="{{ $barcodeBase64 }}" alt="Código de Barras">
            <p>{{ $order->reference_code }}</p>
        </div>
    </div>
</body>
</html>