@extends('layouts.atasanLayout')


@section('main_content')

<section class="content">
<div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
    <div class="card">
        <div class="card-header">
          <div>
            <h3 class="card-title">
                Pilih Bulan Dan Tahun
            </h3>
          </div>
        </div>
        <div class="card-body table-responsive no-padding">
            <form action="{{ route('showRekap') }}" method="post">
              @csrf
              <div class="row mt-3 mb-3">
                <div class="col-md-4 col-xs-12">
                  <div>
                    <label for="">Bulan</label>
                  </div>
                  <select name="bulan" class="form-control">
                    <option value="0">-- Pilih Bulan --</option>
                    <option value="1">Januari</option>
                    <option value="2">February</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
                <div class="col-md-4 col-xs-12">
                  <div>
                    <label for="">Tahun</label>
                  </div>
                  <select name="tahun" class="form-control">
                    <option value="{{ date('Y') }}">-- Pilih Tahun --</option>
                    {{ $thn_skr = date('Y') }}
                    @for($x = $thn_skr; $x >= $thn_skr - 5; $x--)
                      <option value="{{ $x }}">{{ $x }}</option>
                    @endfor
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-xs-12">
                  <input type="submit" class="btn btn-primary" value="Tampilkan">
                </div>
              </div>
            </form>
        </div>
    </div>
    </div>
</div>  
</section>
@endsection