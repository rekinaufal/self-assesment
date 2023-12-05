@php
    $borderStyle = 'border:1px solid #000000;'; // Adjust the border style as needed
@endphp
{{-- @dd($detail) --}}
<p>
    <b>FORMULIR 1.1 : TINGKAT KOMPONEN DALAM NEGERI UNTUK BAHAN BAKU (BAHAN BAKU LANGSUNG / TIDAK LANGSUNG)</b>
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
            <th>Spesifikasi</th>
            <th style="width: 70px">Satuan Bahan Baku</th>
            <th>Negara Asal</th>
            <th>Pemasok / Produsen tingkat 2</th>
            <th>TKDN</th>
            <th style="width: 80px;height:70px">Jumlah pemakaian untuk 1 (satu) satuan produk</th>
            <th>Harga satuan Material</th>
            <th>Biaya (Rp)</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>LOKAL</th>
            <th>PDRI</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            {{-- <th>(Rp)</th> --}}
            <th>KDN</th>
            <th>KLN</th>
            <th>Total</th>
            <th>PPN</th>
            <th>BM</th>
            <th>PPN</th>
            <th>PPH</th>
            <th>Total PDRI</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detail as $item_detail)
            <tr>
                <td style="{{ $borderStyle }}">{{ $loop->iteration }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['bahan_baku'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['spesifikasi'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['satuan_bahan_baku'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['negara_asal'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['pemasok'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['tkdn'] }}%</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['jumlah'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['harga_satuan'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['kdn'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['kln'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['total'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['ppnCalc'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['bmCalc'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['pdriPpnCalc'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['pphCalc'] }}</td>
            </tr>
        @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border:1px solid #000000;background-color: #dbdbdb;text-align: center;"><b>Total</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumKdn'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumKln'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumTotal'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumPpn'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumBm'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumPdriPpn'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumPph'] }}</b></td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['sumPdriTotal'] }}</td>
            </tr>
    </tbody>
</table>