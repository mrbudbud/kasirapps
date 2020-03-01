@extends('layouts.atasanLayout')


@section('main_content')

<section class="content">
<div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
    <div class="card">
        <div class="card-header">
          <div>
            <h3 class="card-title">
                Data Bonus Harian
            </h3>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>Nama Terapis</th>
                  <th>Nomor Telp</th>
                  <th>E-Mail</th>
                  <th>Bonus Hari Ini</th>
                </tr>
            </thead>
            <tbody>
              @foreach( $datas as $data)
                <tr>
                  <td>{{ $data['dataTerapis']['namaTerapis'] }}</td>
                  <td>{{ $data['dataTerapis']['noTelepon'] }}</td>
                  <td>{{ $data['dataTerapis']['email'] }}</td>
                  <td>Rp. {{ number_format($data['bonus'], 0, '.', '.') }},-</td>
                </tr>
              @endforeach
            </body>
        </div>
    </div>
    </div>
</div>  
</section>
@endsection