<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CARTEIRA DEPENDENTE AMS AEPET-BA</title>
    <style type="text/css">
        #carteira {
            background-image: url( {{ asset('images/fundo-carteira.png') }} );
            width: 1076px;
            height: 604px;
            margin: 20px 20px;
        }

        #validade {
            width: 422px;
            height: 63px;
            padding-top: 210px;
            padding-left: 612px;
        }

        #validade p {
            font-family: Arial;
            font-size: 30pt;
            color: #fff;
            font-weight: 400px;
        }

        #dados {
            width: 977px;
            height: 225px;
            padding-top: 40px;
            padding-left: 30px;
        }

        td {
            font-family: Arial;
            font-weight: 400px;
            font-size: 32pt;
            color: #fff;
            padding-left: 10px;
        }

    </style>
</head>

<body>
    <div id="carteira">
        <div id="validade">
            <p>Validade:  {{ date('d-m-Y', strtotime($card->issue )) }} </p>
        </div>
        <div id="dados">
            <table>
                <tr>
                    <td>{{ $associate->code }}-{{ $dependent->code }} </td>
                    <td>{{ $dependent->name }}</td>
                </tr>
                <tr>
                    <td>P.D.:</td>
                    <td>{{ $kindship->title }}</td>
                </tr>
                <tr>
                    <td>{{ $associate->code }} </td>
                    <td>{{ $associate->name }}</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>