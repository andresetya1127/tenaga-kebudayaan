<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan {{ $title }}</title>
    <style>
        h1,
        h2,
        h3,
        h4,
        p {
            margin: 0;
        }

        .w-full {
            width: 100%;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
        }


        .w-half-1 {
            padding-right: 30px;
        }

        .mt {
            margin-top: 1.25rem;
        }

        .mt-1 {
            margin-top: 0.5rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }


        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .data td,
        .data th {
            border: 1px solid #eeecec;
            text-align: left;
            padding: 8px;
            text-transform: capitalize;
            font-size: 13px;
        }

        tr:nth-child(even) {
            background-color: #e4e4e4;
        }

        .t-center {
            text-align: center;
        }

        .t-capitalize {
            text-transform: capitalize;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <table class="w-full">
        <tr>
            <td class="w-half-1">
                <img src="{{ public_path('assets/img/logo.png') }}" alt="laravel daily" width="70px" />
            </td>
            <td class="w-half t-center">
                <h2>DINAS PENDIDIKAN DAN KEBUDAYAAN KABUPATEN LOMBOK TENGAH</h1>
                    <p>
                        Jl. Jend. Sudirman, No.9, Tiwugalih, Kec. Praya, Kabupaten Lombok Tengah, Nusa Tenggara Bar.
                        83518
                    </p>
            </td>
        </tr>
    </table>


    <h2 class="mt t-center">Laporan {{ $title }}</h2>

    <div class="mt">
        <table class="data">
            <thead>
                <tr>
                    <th>No</th>
                    @foreach ($data->getModel()->getField() as $key)
                        <th>{{ str_replace('_', ' ', $key) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($query as $key)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @foreach ($key->getField() as $field)
                            <td>{{ $key[$field] }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr class="items">
                        <td colspan="20">
                            <p class="t-center">
                                Belum ada data.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    @if ($footer)
        <div class="mt">
            @foreach ($group as $groups)
                <p class="mt-1 t-capitalize"><b>{!! $groups->kec->name !!} </b>: {!! $groups->jumlah !!}</p>
            @endforeach
        </div>
    @endif
</body>

</html>
