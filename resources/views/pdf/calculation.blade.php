<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculation PDF</title>
</head>

<body>
    <div style="float: left; width: 100%;">
        <table width="65%" style="float: left;">
            <tr>
                <th align="left" style="width: 40%">Penyedia Barang / Jasa</th>
                <th align="left">: -</th>
            </tr>
            <tr>
                <th align="left" style="width: 40%">Hasil Produksi</th>
                <th align="left">: {{ $computation->production_result }}</th>
            </tr>
            <tr>
                <th align="left" style="width: 40%">Jenis Produksi</th>
                <th align="left">: {{ $computation->product_type }}</th>
            </tr>
            <tr>
                <th align="left" style="width: 40%">Spesifikasi</th>
                <th align="left">: {{ $computation->specification }}</th>
            </tr>
            <tr>
                <th align="left" style="width: 40%">Brand</th>
                <th align="left">: {{ $computation->brand }}</th>
            </tr>
        </table>
        <table width="30%" border="1" style="border-collapse: collapse; float: right;">
            <tr>
                <th style="padding: 10px 0">TKDN %</th>
            </tr>
            <tr>
                <th style="padding: 10px 0">{{ $total["sumKdn"] != 0 ? sprintf('%.2f', ($total['sumKdn'] / $total['sumTotal']) * 100) : "0.00" }}%</th>
            </tr>
        </table>
    </div>

    <div class="" style="padding-top: 10rem">
        <table border="1" style="border-collapse: collapse; font-size: 11pt; width: 100%; float: none">
            <tr>
                <th colspan="2" style="padding: 8px">Uraian</th>
                <th colspan="3" style="padding: 8px">Biaya</th>
                <th rowspan="2">TKDN</th>
            </tr>
            <tr>
                <th style="padding: 8px">No</th>
                <th style="padding: 8px">Nama</th>
                <th style="padding: 8px">KDN</th>
                <th style="padding: 8px">KLN</th>
                <th style="padding: 8px">Total</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($computation->calculation_result->results['calculations'] as $calculation)
                @if ($i >= 2)
                    <tr>
                        <td style="padding: 5px">
                            {{ $calculation['no'] }}
                        </td>
                        <td style="padding: 5px">
                            {{ $calculation['nama'] }}
                        </td>
                        <td style="padding: 5px; white-space: nowrap">
                            Rp {{ number_format(($calculation['bspKdn'] ?? 0), 2, ',', '.') }}
                        </td>
                        <td style="padding: 5px; white-space: nowrap">
                            Rp {{ number_format(($calculation['bspKln'] ?? 0), 2, ',', '.') }}
                        </td>
                        <td style="padding: 5px; white-space: nowrap">
                            Rp {{ number_format(($calculation['bspTotal'] ?? 0), 2, ',', '.') }}
                        </td>
                        <td align="right" style="padding: 5px; white-space: nowrap">
                            {{ $calculation["bspKdn"] != 0 ? sprintf('%.2f', (($calculation['bspKdn'] ?? 0) / ($calculation['bspTotal'] ?? 0)) * 100) : "0.00" }}%
                        </td>
                    </tr>
                @else
                    <tr>
                        <td style="padding: 5px">
                            {{ $calculation['no'] }}
                        </td>
                        <td style="padding: 5px">
                            {{ $calculation['nama'] }}
                        </td>
                        <td style="padding: 5px; white-space: nowrap">
                            Rp {{ number_format(($calculation['sumKdn'] ?? 0), 2, ',', '.') }}
                        </td>
                        <td style="padding: 5px; white-space: nowrap">
                            Rp {{ number_format(($calculation['sumKln'] ?? 0), 2, ',', '.') }}
                        </td>
                        <td style="padding: 5px; white-space: nowrap">
                            Rp {{ number_format(($calculation['sumTotal'] ?? 0), 2, ',', '.') }}
                        </td>
                        <td align="right" style="padding: 5px; white-space: nowrap">
                            {{ $calculation["sumKdn"] != 0 ? sprintf('%.2f', (($calculation['sumKdn'] ?? 0) / ($calculation['sumTotal'] ?? 0)) * 100) : "0.00" }}%
                        </td>
                    </tr>
                @endif
                @php
                    $i++
                @endphp
            @endforeach
            <tr>
                <th align="left" style="padding: 5px; white-space: nowrap;" colspan="2">Biaya Produksi</th>
                <th align="left" style="padding: 5px; white-space: nowrap;">Rp
                    {{ number_format($total['sumKdn'], 2, ',', '.') }}</th>
                <th align="left" style="padding: 5px; white-space: nowrap;">Rp
                    {{ number_format($total['sumKln'], 2, ',', '.') }}</th>
                <th align="left" style="padding: 5px; white-space: nowrap;">Rp
                    {{ number_format($total['sumTotal'], 2, ',', '.') }}</th>
                <th align="right">{{ $total["sumKdn"] != 0 ? sprintf('%.2f', ($total['sumKdn'] / $total['sumTotal']) * 100) : "0.00" }}%</th>
            </tr>
        </table>
    </div>
</body>

</html>
