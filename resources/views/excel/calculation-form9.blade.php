@php
    $borderStyle = 'border:1px solid #000000;'; // Adjust the border style as needed
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
                Bahan Baku untuk Material Langsung	
            </td>
            <td style="{{ $borderStyle }}">
                130.150,00 
            </td>
            <td style="{{ $borderStyle }}"> 
                3.878.940,93 
            </td>
            <td style="{{ $borderStyle }}">
                4.009.090,93 
            </td>
            <td style="{{ $borderStyle }}">
                2,60 
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">2</td>
            <td style="{{ $borderStyle }}">
                Bahan Baku untuk Biaya Terkait Lainnya		
            </td>
            <td style="{{ $borderStyle }}">
                978.233,32 
            </td>
            <td style="{{ $borderStyle }}"> 
                0
            </td>
            <td style="{{ $borderStyle }}">
                978.233,32 
            </td>
            <td style="{{ $borderStyle }}">
                19,57 
            </td>
        </tr>
        <tr>
            <td style="border:1px solid #000000;background-color: #dbdbdb56;">&nbsp;</td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">1</td>
            <td style="{{ $borderStyle }}">
                Tenaga Kerja Langsung	
            </td>
            <td style="{{ $borderStyle }}">
                8.688,63 
            </td>
            <td style="{{ $borderStyle }}"> 
                0
            </td>
            <td style="{{ $borderStyle }}">
                8.688,63 
            </td>
            <td style="{{ $borderStyle }}">
                0,17 
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">2</td>
            <td style="{{ $borderStyle }}">
                Tenaga Kerja Langsung untuk Biaya Terkait Lainnya	
            </td>
            <td style="{{ $borderStyle }}">
                227,27 
            </td>
            <td style="{{ $borderStyle }}"> 
                227,27 
            </td>
            <td style="{{ $borderStyle }}">
                454,55 
            </td>
            <td style="{{ $borderStyle }}">
                0,00 
            </td>
        </tr>
        <tr>
            <td style="border:1px solid #000000;background-color: #dbdbdb56;">&nbsp;</td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">1</td>
            <td style="{{ $borderStyle }}">
                Tenaga Kerja Tidak Langsung	
            </td>
            <td style="{{ $borderStyle }}">
                227,27 
            </td>
            <td style="{{ $borderStyle }}"> 
                227,27 
            </td>
            <td style="{{ $borderStyle }}">
                454,55 
            </td>
            <td style="{{ $borderStyle }}">
                0,00 
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">2</td>
            <td style="{{ $borderStyle }}">
                Mesin yang dimiliki	
            </td>
            <td style="{{ $borderStyle }}">
                227,27 
            </td>
            <td style="{{ $borderStyle }}"> 
                227,27 
            </td>
            <td style="{{ $borderStyle }}">
                454,55 
            </td>
            <td style="{{ $borderStyle }}">
                0,00 
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">3</td>
            <td style="{{ $borderStyle }}">
                Mesin yang Sewa	
            </td>
            <td style="{{ $borderStyle }}">
                227,27 
            </td>
            <td style="{{ $borderStyle }}"> 
                227,27 
            </td>
            <td style="{{ $borderStyle }}">
                454,55 
            </td>
            <td style="{{ $borderStyle }}">
                0,00 
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}">4</td>
            <td style="{{ $borderStyle }}">
                Biaya tidak langsung terkait lainnya	
            </td>
            <td style="{{ $borderStyle }}">
                227,27 
            </td>
            <td style="{{ $borderStyle }}"> 
                227,27 
            </td>
            <td style="{{ $borderStyle }}">
                454,55 
            </td>
            <td style="{{ $borderStyle }}">
                0,00 
            </td>
        </tr>
        <tr>
            <td style="{{ $borderStyle }}"><b>Biaya Produksi</b></td>
            <td style="{{ $borderStyle }}"></td>
            <td style="{{ $borderStyle }}">
                1.119.672,84 
            </td>
            <td style="{{ $borderStyle }}">
                1.119.672,84 
            </td>
            <td style="{{ $borderStyle }}">
                1.119.672,84 
            </td>
            <td style="{{ $borderStyle }}">
                <b>22,40%</b>
            </td>
        </tr>
    </tbody>
</table>