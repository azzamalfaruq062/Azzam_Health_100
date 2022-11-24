@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <a class="btn btn-sm btn-outline-warning" style="border-radius: 40px" href="{{url('/home')}}">Kembali</a>
                    <form action="{{route('bmi')}}">
                        <div class="input-group">
                            <div class="col pe-1">
                                <label>Nama :</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="col">
                                <label>Tahun Lahir :</label>
                                <input class="form-control" type="number" name="thn" >
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="col pe-1">
                                <label>Tinggi Badan :</label>
                                <input class="form-control" type="number" name="tb" >
                            </div>
                            <div class="col ps-1">
                                <label>Berat Badan :</label>
                                <input class="form-control" type="number" name="bb">
                            </div>
                        </div>
                        <div class="col">
                            <label>Hobi :</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="hobi" >
                                <input class="form-control" type="text">
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <input class="btn btn-success btn-sm mt-3" type="submit" id="submit" value="submit">
                    </form>
                    <div>
                        @isset($data)                            
                        <table class="table table-hover">
                            <tr>
                                <th>Nama</th>
                                <td>{{$data['name']}}</td>
                            </tr>
                            <tr>
                                <th>Tinggi Badan</th>
                                <td>{{$data['tb']}}</td>
                            </tr>
                            <tr>
                                <th>Berat Badan</th>
                                <td>{{$data['bb']}}</td>
                            </tr>
                            <tr>
                                <th>BMI</th>
                                <td>{{$data['status']}}</td>
                            </tr>
                            <tr>
                                <th>Hobi</th>
                                <td>{{$data['hobi']}}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <td id="Tumur">{{$data['umur']}}</td>
                            </tr>
                            <tr>
                                <th>Status Konsultasi</th>
                                <td id="Tstatus">{{$data['konsultasi']}}</td>
                            </tr>
                        </table>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
