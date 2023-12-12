@php
    $borderStyle = 'border:1px solid #000000;'; // Adjust the border style as needed
@endphp
{{-- @dd($detail) --}}
<p>
    <b>FORMULIR 1.2. : TINGKAT KOMPONEN DALAM NEGERI UNTUK BAHAN BAKU (JASA-JASA TERKAIT)</b>
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
            <th>No</th>
            <th>Uraian</th>
            <th>Pemasok / Produsen tingkat 2</th>
            <th>Jumlah</th>
            <th>TKDN (%)</th>
            <th>Biaya (Rp)</th>
            <th>Alokasi Biaya Terhadap Produk (%)</th>
            <th>Biaya (Rp)</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>KDN</th>
            <th>KLN</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach($detail['data'] as $item_detail)
            <tr>
                <td style="{{ $borderStyle }}">{{ $loop->iteration }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['uraian'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['produsen_tingkat_dua'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['jumlah'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['tkdn'] }}%</td>
                <td style="{{ $borderStyle }}">{{ $i >= 2 ? "Rp " : "" }}{{ $item_detail['biaya'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['alokasi'] }}%</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['kdn'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['kln'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['total'] }}</td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border:1px solid #000000;background-color: #dbdbdb;text-align: center;"><b>Total</b></td>
                <td style="{{ $borderStyle }}"><b>{{ $detail['sumKdn'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>{{ $detail['sumKln'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>{{ $detail['sumTotal'] }}</b></td>
            </tr>
    </tbody>
</table>
