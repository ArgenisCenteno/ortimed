<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Ortimed</title>

    <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css') }}"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        thead {
            background-color: #28a745;
            /* Verde Success */
            color: white;
            /* Texto blanco para contraste */
        }
    </style>
</head>

<body
    style="font-family: Arial, sans-serif; margin: 0; padding: 10px; line-height: 1.6; border: none; background-color: #f9f9f9;">
    <div
        style="max-width: 800px; margin: auto; padding: 10px; border-radius: 8px; background: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <!-- Encabezado -->
        <div
            style="display: flex; align-items: center; justify-content: space-between; padding-bottom: 10px; border-bottom: 2px solid #ddd;">
            <div style="width: 20%; flex: 1;">
            </div>
            <div style="text-align: center; flex: 1;">

                <h1 style="margin: 0;  color: #333;"></h1>
            </div>

        </div>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th
                        style="border-bottom: 2px solid #ddd; padding: 8px; text-align: center; font-size: 18px; width: 15%;">
                        <img src="{{ public_path('iconos/logo.jpg') }}" alt="Logo"
                            style="max-width: 100px; height: auto;">
                    </th>
                    <th colspan="2"
                        style="border-bottom: 2px solid #ddd; padding: 8px; text-align: center; font-size: 22px; font-weight: bold; width: 70%;">
                        ORTIMED RESTAURANT
                    </th>
                    @php
                        $id = str_pad($pago->id, 8, "0", STR_PAD_LEFT);
                    @endphp
                    <th
                        style="border-bottom: 2px solid #ddd; padding: 8px; text-align: center; font-size: 22px; width: 15%;">
                        {{$id}}
                    </th>
                </tr>
            </thead>
        </table>


        <!-- Título -->
        <h3 style="text-align: center; color: #333; font-size: 24px; margin: 20px 0;">COMPROBANTE DE PAGO</h3>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="padding: 8px; text-align: left;">DIRECCIÓN</th>
                    <th style="padding: 8px; text-align: left;">CIUDAD.</th>
                    <th style="padding: 8px; text-align: left;">FECHA.</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">CALLE EZEQUIEL ZAMORA, FRENTE CENTRO
                        CLINICO PUNTA DE MATA</td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">MONAGAS</td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{$fechapago}}</td>
                </tr>
            </tbody>
        </table>
        <!-- Detalles del cliente y vendedor -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th style="padding: 8px; text-align: left;">EMPLEADO</th>
                    <th style="padding: 8px; text-align: left;">FORMA DE PAGO</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{$pago->user->name ?? ''}}</td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{$pago->forma_pago ?? ''}}</td>


                </tr>
            </tbody>
        </table>


        <!-- Tabla de productos -->
       

        <!-- Resumen de totales -->
        <div style="display: flex; justify-content: space-between; margin-top: 20px; align-items: flex-start;">
            <!-- Contenedor del QR -->
           

            <!-- Contenedor de los montos -->
            <div
                style="text-align: right; padding: 10px; border: 2px solid #ddd; border-radius: 8px; background-color: #f9f9f9; flex-grow: 1;">
                <div style="text-align: left; margin-right: 20px;">
                 <img src="data:image/svg+xml;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
            </div>
                <p style="margin: 0; padding: 5px; border-bottom: 1px solid #ddd;"><strong>SUBTOTAL:</strong>
                    {{$pago->monto_neto}}</p>
                <p style="margin: 0; padding: 5px; border-bottom: 1px solid #ddd;"><strong>IVA (16%):</strong>
                    {{$pago->impuestos}}</p>
                <p style="margin: 0; padding: 5px;"><strong>MONTO TOTAL:</strong> {{$pago->monto_total}}</p>
            </div>
        </div>



    </div>
</body>

</html>