@php
    $borderStyle = 'border:1px solid #000000;'; // Adjust the border style as needed
@endphp
{{-- @dd($detail) --}}
<p>
    <b>
        FORMULIR 1.4 : TINGKAT KOMPONEN DALAM NEGERI UNTUK TENAGA KERJA LANGSUNG (UNTUK BIAYA TERKAIT LAINNYA)																				
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
            <th>Pemasok / Produsen Tingkat 2</th>
            <th>TKDN (%)</th>
            <th>Jumlah</th>
            <th>Biaya Pengurusan Per Bulan (Rp)</th>
            <th>Alokasi Penggunaan Untuk Produk Yang Dinilai (%)</th>
            <th>Biaya (Rp) Yang Dialokasikan Untuk Produk Yang Dinilai</th>
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
        @foreach($detail['data'] as $item_detail)
            <tr>
                <td style="{{ $borderStyle }}">{{ $loop->iteration }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['uraian_posisi'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['produsen_tingkat_dua'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['tkdn'] ?? '0'  }}%</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['jumlah_orang'] }}</td>
                <td style="{{ $borderStyle }}">Rp {{ $item_detail['biaya_pengurusan_per_bulan'] }}</td>
                <td style="{{ $borderStyle }}">{{ $item_detail['alokasi'] }}%</td>
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
                <td style="border:1px solid #000000;background-color: #dbdbdb;text-align: center;"><b>Total</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $detail['sumKdn'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $detail['sumKln'] }}</b></td>
                <td style="{{ $borderStyle }}"><b>Rp {{ $detail['sumTotal'] }}</b></td>
            </tr>
    </tbody>
</table>