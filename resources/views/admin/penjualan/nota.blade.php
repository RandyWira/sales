<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    <style>
        @page {
            size: A4
        }

        body {
            font-family: arial;
            font-size: 11px;
            -webkit-print-color-adjust: exact;
        }

        h1 {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
        }

        h2 {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
        }

        h3 {
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
        }

        h4 {
            font-weight: bold;
            font-size: 7pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        hr {
            border: 1px solid #000000;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>

<body>

    <h1>{{ $config->nama }}</h1>
    <h2>{{ $config->alamat }}</h2>
    <h3 style="text-align: left">Kasir : {{ $config->pemilik }}</h3>
    <h3 style="background-color: darkgrey"><u>Nota Penjualan</u></h3>
    <table>
        <thead>
            <tr style="background: #A9A9A9">
                <th>No Faktur</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td>{{ $penjualan->nota_jual }}</td>
                <td>{{ $penjualan->created_at }}</td>
                <td>{{ $penjualan->nama_pembeli }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table border="0">
        <thead>
            <tr style="background: #A9A9A9">
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga Jual</th>
                <th>Nilai Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $diskon = 0;
            $grand_total = 0;
            $subtotal = 0;
            ?>
            @foreach ($detail_jual as $i)
                <?php
                $diskon += $i->diskon;
                $grand_total += $i->total_jual;

                // $subtotal = $
                ?>
                <tr>
                    <td>{{ $i->nama }}</td>
                    <td align="center">{{ $i->jml_jual }}</td>
                    <td align="center">{{ $i->satuan }}</td>
                    <td align="center">@currency($i->harga_jual)</td>
                    <td align="center">@currency($i->total_jual)</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot style="text-align: right;font-weight:bold">
            <tr>
                <td colspan="3">
                    &nbsp;
                </td>
                <td>
                    &nbsp;
                </td>
            </tr>

        </tfoot>
    </table>
    <hr>
    <table style="text-align:right;font-weight:bold">
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Grand Total :</td>
            <td>@currency($penjualan->total_jual)</td>
        </tr>
        <tr>
            <td>Bayar :</td>
            <td>@currency($penjualan->bayar)</td>
        </tr>
        <tr>
            <td>Kembalian :</td>
            <td>@currency($penjualan->kembalian)</td>
        </tr>
    </table>
    <p align="center">
        &#128522; &#128522; &#128522;
    </p>
</body>
<script>
    window.print();

</script>

</html>
