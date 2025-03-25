<!DOCTYPE html>
<html>

<head>
    <title>Recibo de Orden #{{ $order->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #e83f6f;
            --primary-light: #ffe6eb;
            --text-color: #333;
            --text-light: #666;
            --text-lighter: #999;
            --border-color: #e0e0e0;
            --bg-light: #f9f9f9;
            --bg-lighter: #fafafa;
            --radius-sm: 4px;
            --radius-md: 6px;
            --radius-lg: 8px;
            --space-sm: 6px;
            --space-md: 12px;
            --space-lg: 18px;
            --space-xl: 24px;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text-color);
            line-height: 1.5;
            background-color: var(--bg-lighter);
            margin: 0;
            padding: var(--space-lg);
            -webkit-font-smoothing: antialiased;
            font-size: 10pt;
            /* Reduced base font size */
        }

        .receipt {
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            background-color: white;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
            box-sizing: border-box;
            border-radius: var(--radius-lg);
        }

        .header {
            text-align: center;
            margin-bottom: var(--space-md);
            padding-bottom: var(--space-sm);
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        .logo {
            max-width: 100px;
            margin-bottom: var(--space-sm);
            height: auto;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.05));
        }

        .header h1 {
            color: var(--text-color);
            margin: var(--space-sm) 0;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .order-number {
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            font-weight: 600;
            font-size: 11px;
            margin-top: var(--space-sm);
            letter-spacing: 0.5px;
        }

        .order-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
        }

        .meta-card {
            background-color: var(--bg-light);
            padding: var(--space-sm);
            border-radius: var(--radius-md);
            font-size: 10px;
            border-left: 2px solid var(--primary-color);
        }

        .meta-card strong {
            color: var(--text-light);
            font-weight: 500;
            display: block;
            margin-bottom: 2px;
            font-size: 10px;
        }

        .meta-card span {
            font-weight: 500;
            word-break: break-word;
        }

        .section-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-color);
            margin: var(--space-md) 0 var(--space-sm) 0;
            position: relative;
            padding-left: var(--space-sm);
        }

        .items-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: var(--space-md);
            font-size: 10px;
            overflow: hidden;
            border-radius: var(--radius-md);
        }

        .items-table th {
            background-color: var(--bg-light);
            color: var(--text-color);
            padding: 10px;
            text-align: left;
            font-weight: 600;
            border-bottom: 1px solid var(--border-color);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .items-table td {
            border-bottom: 1px solid var(--border-color);
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }

        .total-section {
            margin-top: var(--space-md);
            background-color: var(--bg-light);
            padding: var(--space-sm);
            border-radius: var(--radius-md);
            font-size: 10px;
            border-left: 2px solid var(--primary-color);
        }

        .total-section p {
            margin: 4px 0;
            display: flex;
            justify-content: space-between;
        }

        .total-amount {
            font-size: 12px;
            font-weight: 700;
            color: var(--primary-color);
            padding-top: var(--space-sm);
            margin-top: var(--space-sm);
            border-top: 1px dashed var(--border-color);
        }

        .barcode-container {
            text-align: center;
            margin: var(--space-lg) 0;
            padding: var(--space-sm);
            background-color: var(--bg-light);
            border-radius: var(--radius-md);
            position: relative;
        }

        .barcode-label {
            font-size: 9px;
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: var(--space-sm);
        }

        .barcode img {
            max-width: 180px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .barcode p {
            margin: var(--space-sm) 0 0;
            font-size: 10px;
            word-break: break-all;
            color: var(--text-light);
            font-family: monospace;
            letter-spacing: 0.5px;
        }

        .instructions {
            margin-top: var(--space-lg);
            padding: var(--space-sm);
            background-color: var(--bg-light);
            border-radius: var(--radius-md);
            font-size: 10px;
            border-left: 2px solid var(--primary-color);
        }

        .instructions h3 {
            color: var(--text-color);
            margin-top: 0;
            margin-bottom: var(--space-sm);
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .instructions ol {
            padding-left: 16px;
            margin-bottom: 0;
        }

        .instructions li {
            margin-bottom: var(--space-sm);
            padding-left: var(--space-sm);
            color: var(--text-light);
        }

        .highlight {
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 1px 4px;
            border-radius: var(--radius-sm);
            font-weight: 500;
            font-size: 9px;
            font-family: monospace;
            white-space: nowrap;
        }

        .footer {
            text-align: center;
            margin-top: var(--space-lg);
            color: var(--text-lighter);
            font-size: 10px;
            border-top: 1px solid var(--border-color);
            padding-top: var(--space-md);
            line-height: 1.4;
        }

        .footer a {
            color: var(--primary-color);
            text-decoration: none;
        }

        @media print {
            body {
                background-color: white;
                padding: 0;
                font-size: 9pt;
            }

            .receipt {
                box-shadow: none;
                border: none;
                max-width: 100%;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="header">
            <img src="{{ $logoBase64 }}" alt="Logo" class="logo">
            <h1>Recibo de Orden</h1>
            <div class="order-number">Orden #{{ $order->id }}</div>
        </div>

        <div class="order-meta">
            <div class="meta-card">
                <strong>Fecha</strong>
                <span>{{ $order->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="meta-card">
                <strong>Método de pago</strong>
                <span>{{ $order->transaction->mode }}</span>
            </div>
            <div class="meta-card">
                <strong>Código de referencia</strong>
                <span>{{ $order->reference_code }}</span>
            </div>
        </div>

        <h2 class="section-title">Detalles del pedido</h2>
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
            <p><strong>Subtotal:</strong> <span>${{ number_format($order->subtotal, 2) }}</span></p>
            <p><strong>Descuento:</strong> <span>${{ number_format($order->discount, 2) }}</span></p>
            <p><strong>IVA:</strong> <span>${{ number_format($order->tax, 2) }}</span></p>
            <p class="total-amount"><strong>Total:</strong> <span>${{ number_format($order->total, 2) }}</span></p>
        </div>

        <div class="barcode-container">
            <div class="barcode-label">Código de referencia</div>
            <div class="barcode">
                <img src="{{ $barcodeBase64 }}" alt="Código de Barras">
                <p>{{ $order->reference_code }}</p>
            </div>
        </div>

        <div class="instructions">
            <h3>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 16V12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                ¿Cómo completar tu pago?
            </h3>
            <ol>
                <li>Realiza tu transferencia a la cuenta <span class="highlight">BOMU</span> con clave <span
                        class="highlight">123456789</span> en <span class="highlight">bancoejemplo</span>. No olvides
                    incluir el número de referencia <span class="highlight">{{ $order->reference_code }}</span> como
                    concepto.</li>
                <li>Guarda tu comprobante de transferencia (ticket o captura de pantalla) como evidencia de tu pago.
                </li>
                <li>Sube tu comprobante en el formulario de abajo o en cualquier momento desde la sección "Mis pedidos"
                    dentro de las próximas 48 horas.</li>
                <li>¡Listo! Una vez confirmado tu pago, te notificaremos cuando tu pedido esté listo para recoger.</li>
            </ol>
        </div>

        <div class="footer">
            Gracias por tu compra • {{ date('Y') }}
        </div>
    </div>
</body>

</html>