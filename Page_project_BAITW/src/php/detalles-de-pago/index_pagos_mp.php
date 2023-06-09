<?php

require '../../mercado_pago/vendor/autoload.php';

MercadoPago\SDK::setAccessToken('TEST-6509425968746122-060820-746f077cd7683e634b2c407faa478c1e-529804460');

$preference = new MercadoPago\preference();

$item = new MercadoPago\item();
$item->id = '1';
$item->title = 'bicicleta todoterreno';
$item->quantity = 1;
$item->unit_price = 10.000;
$item->currency_id = "COP";

$preference->items = array($item);

$preference->save();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://sdk.mercadopago.com/js/v2"></script>

</head>
<body>

    <h3>Mercado Pago</h3>

    <div class="checkout-btn"></div>
    
    <script>
        const mp = new MercadoPago('TEST-349f510c-3863-4580-8ea2-eeeecc8ff295',{
            locale: 'es-CO' 
        });

        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout-btn',
                label: 'pagar con MP'
            }
        })
    </script>

</body>
</html>