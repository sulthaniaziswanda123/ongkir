@extends('layouts.simple')
@section('content')
    <div class="container">
        <div class="row mt-50">
            <div class="col-md-8">

                    <h5>Origin : {{ $origin['city_name']  }}</h5>

                        <h5>Destination : {{ $destination['city_name']  }}</h5>

                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Detail Informasi</h3>

                    </div>
                    <div class="block-content">
                        <table class="table table-bordered table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Nama Layanan</th>
                                <th>Tarif</th>
                                <th>Estimasi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                @foreach($data['costs'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['service'] }}</td>
                                        @foreach($item['cost'] as $value)
                                            <td>{{ $value['value'] }}</td>
                                            <td>{{ $value['etd'] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
