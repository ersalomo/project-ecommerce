<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    @php
        $total = 0;
    @endphp
    <table>
        <thead>
            <tr style="font-weight:bold; font-size:19px;">
                <th>Image</th>
                <th>Name</th>
                <th style="width:150px">Price</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            - Hi <b>{{ $name }}</b>
            @foreach ($dataPesanan as $item)
                <tr>
                    <td class="col-3">
                        <img src="{{ $item->getProducts->image }}" style="width:100px; height:100px;"
                            class="img-fluid" alt="{{ $item->getProducts->product_name }}">
                    </td>
                    <td>{{ $item->getProducts->product_name }}</td>
                    <td>Rp. {{ number_format($item->getProducts->price) }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{ number_format($item->getProducts->price * $item->qty) }}</td>
                    <td>{{ $item->getProducts->description }}</td>
                </tr>
                @php
                    $total += $item->getProducts->price * $item->qty;
                @endphp
            @endforeach

            <tr>
                <td style="font-size:20px; font-weight:bold;">Total:{{ number_format($total) }}</td>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
