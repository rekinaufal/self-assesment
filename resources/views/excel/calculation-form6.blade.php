@php
    $borderStyle = 'border:1px solid #000000;'; // Adjust the border style as needed
@endphp
{{-- @dd($detail) --}}
<p>
    <b>
        FORMULIR 1.6 : TINGKAT KOMPONEN DALAM NEGERI UNTUK BIAYA TIDAK LANGSUNG PABRIK (UNTUK MESIN / ALAT KERJA YANG DIMILIKI SENDIRI)													
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
            <th>No</th>
            <th>Uraian</th>
            <th>Spesifikasi</th>
            <th>Daya (Watt)</th>
            <th>Jumlah (Unit)</th>
            <th>Alat Kerja</th>
            <th></th>
            <th></th>
            <th>Biaya Depresiasi Per Bulan (Rp)</th>
            <th>Alokasi Penggunaan Untuk Produk Yang Dinilai (%)</th>
            <th>Biaya (Rp)</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Dibuat</th>
            <th>Dimiliki</th>
            <th>TKDN (%)</th>
            <th></th>
            <th></th>
            <th>KDN</th>
            <th>KLN</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detail as $item_detail)
            <tr>
                <td style="{{ $borderStyle }}">{{ $loop->iteration }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['uraian'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['spesifikasi'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['jumlah_unit'] }}%</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['biaya_depresiasi_perbulan'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['alokasi'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['dibuat'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['dimiliki'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['tkdn'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['kdn'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['kln'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['total'] }}</td>
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
                <td></td>
                <td style="border:1px solid #000000;background-color: #dbdbdb;text-align: center;"><b>Total</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumKdn'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumKln'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $item_detail['sumTotal'] }}</b></td>
            </tr>
    </tbody>
</table>