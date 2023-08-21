<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.paypal.com/sdk/js?client-id=AREdZpT5NlDYilXC7_Gtu1Kkh0TYbiq8g_aZIFDbY_BP5cL560tGybzSOALa34knXCwwUFz7XYAfIRZ7&currency=MXN">
    </script>
    <title>Pagar carrito</title>
</head>
<body>

<div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay',
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },

            onApprove: function (data, actions) {
                actions.order.capture().then(function (detalles){
                    console.log(detalles);
                });
            },

            onCancel: function(data) {
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>