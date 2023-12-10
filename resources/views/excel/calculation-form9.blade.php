@php
    $borderStyle = 'border:1px solid #000000;'; // Adjust the border style as needed

    $totalSumKdn = ($detail['1.1']['sumKdn'] + $detail['1.2']['sumKdn'] + $detail['1.3']['bspKdn'] + $detail['1.4']['bspKdn'] + $detail['1.5']['bspKdn'] + $detail['1.6']['bspKdn'] + $detail['1.7']['bspKdn'] + $detail['1.8']['bspKdn']);
    $totalSumKln = ($detail['1.1']['sumKln'] + $detail['1.2']['sumKln'] + $detail['1.3']['bspKln'] + $detail['1.4']['bspKln'] + $detail['1.5']['bspKln'] + $detail['1.6']['bspKln'] + $detail['1.7']['bspKln'] + $detail['1.8']['bspKln']);
    $totalSumTotal = ($detail['1.1']['sumTotal'] + $detail['1.2']['sumTotal'] + $detail['1.3']['bspTotal'] + $detail['1.4']['bspTotal'] + $detail['1.5']['bspTotal'] + $detail['1.6']['bspTotal'] + $detail['1.7']['bspTotal'] + $detail['1.8']['bspTotal']);
@endphp
{{-- @dd($detail) --}}
<p>
    <b>
        FORMULIR 1.9 : REKAPITULASI PENILAIAN
    </b>
</p>
<p>
    <b>
        TINGKAT KOMPONEN DALAM NEGERI RANGKA, DAN/ATAU BODI
    </b>
</p>
<p>&nbsp;</p>
<table>
    <tr>
        <td>Penyedia Barang/Jasa</td>
        <td></td>
        <td>: {{ $parent->production_result ?? '-' }}</td>
    </tr>
    <tr>
        <td>Hasil Produksi</td>
        <td></td>
        <td>: {{ $parent->production_result ?? '-' }}</td>
    </tr>
    <tr>
        <td>Jenis Produk</td>
        <td></td>
        <td>: {{ $parent->product_type ?? '-' }}</td>
    </tr>
    <tr>
        <td>Spesifikasi</td>
        <td></td>
        <td>: {{ $parent->specification ?? '-' }}</td>
    </tr>
    <tr>
        <td>Standar</td>
        <td></td>
        <td>: {{ $parent->brand ?? '-' }}</td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th><b>Uraian</b></th>
            <th></th>
            <th><b>Biaya</b></th>
            <th></th>
            <th></th>
            <th><b>TKDN (%)</b></th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th><b>KDN</b></th>
            <th><b>KLN</b></th>
            <th><b>Total</b></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border:1px solid #000000;background-color: #dbdbdb56;">&nbsp;</td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">1</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.1']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.1']['sumKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.1']['sumKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.1']['sumTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.1']['sumKdn'] / $totalSumTotal) * 100 }}
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">2</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.2']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.2']['sumKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.2']['sumKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.2']['sumTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.2']['sumKdn'] / $totalSumTotal) * 100 }}
            </td>
        </tr>
        <tr>
            <td style="border:1px solid #000000;background-color: #dbdbdb56;">&nbsp;</td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">1</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.3']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.3']['bspKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.3']['bspKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.3']['bspTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.3']['bspKdn'] / $totalSumTotal) * 100 }}
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">2</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.4']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.4']['bspKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.4']['bspKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.4']['bspTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.4']['bspKdn'] / $totalSumTotal) * 100 }}

            </td>
        </tr>
        <tr>
            <td style="border:1px solid #000000;background-color: #dbdbdb56;">&nbsp;</td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">1</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.5']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.5']['bspKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.5']['bspKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.5']['bspTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.5']['bspKdn'] / $totalSumTotal) * 100 }}
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">2</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.6']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.6']['bspKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.6']['bspKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.6']['bspTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.6']['bspKdn'] / $totalSumTotal) * 100 }}
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">3</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.7']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.7']['bspKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.7']['bspKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.7']['bspTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.7']['bspKdn'] / $totalSumTotal) * 100 }}
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">4</td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.8']['nama'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.8']['bspKdn'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}"> 
                {{ $detail['1.8']['bspKln'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $detail['1.8']['bspTotal'] ?? '' }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ ($detail['1.8']['bspKdn'] / $totalSumTotal) * 100 }}
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}"><b>Biaya Produksi</b></td>
            <td style="{{ $borderStyle }}"></td>
            <td style="{{ $borderStyle }}">
                {{ $totalSumKdn }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $totalSumKln }}
            </td>
            <td style="{{ $borderStyle }}">
                {{ $totalSumTotal }}
            </td>
            <td style="{{ $borderStyle }}">
                <b>{{ $totalSumKdn / $totalSumTotal }}%</b>
            </td>
        </tr>
    </tbody>
</table>