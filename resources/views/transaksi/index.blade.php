@extends('layouts.master')


@section('main_content')

<section class="content" id="app">
  <div class="row" style="padding-top: 20px;">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          @if(session('action'))
            @if(session('sukses'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('msg') }}
              </div>
            @else
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('msg') }}
              </div>
            @endif
          @endif
          <h3 class="card-title">
            Transaksi
          </h3>
        </div>
        <div class="card-body table-responsive no-padding">
          <div v-if="hasPoint" class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @{{ namaMember }} Mempunyai @{{ totalPoint }} Point
          </div>
          <form action="">
            <div class="row" v-if="hasPoint">
              <div class="col-md-6 col-xs-12">
                <div class="input-group mb-3 form-check">
                  <input class="form-check-input" type="checkbox" v-model="gunakanPoint" name="gunakanPoint" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Gunakan Point Untuk Transaksi
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div>
                  <label for="">No Telp Member</label>
                </div>
                <div class="input-group mb-3">
                <vue-bootstrap-typeahead
                  v-model="member"
                  :data="listMember"
                  placeholder="No Telp Member"
                  :serializer="s => s.nomorHp"
                  style="width: 100%"
                  @hit="cekPont($event)"
                  />
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div>
                  <label for="">Nama</label>
                </div>
                <div class="input-group mb-3">
                <input type="text" class="form-control" readonly v-model="namaMember">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-lg-6">
                <div>
                  <label for="">Nama Produk / Jasa</label>
                </div>
                <div class="input-group mb-3">
                <vue-bootstrap-typeahead
                  v-model="barang"
                  :data="listBarang"
                  placeholder="Nama Barang"
                  :serializer="s => s.namaProduk"
                  style="width: 100%"
                  @hit="dataBarang = $event"
                  />
                </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                <div>
                  <label for="">Harga</label>
                </div>
                <div class="input-group mb-3">
                <input type="text" class="form-control" readonly v-model="dataBarang.harga">
                </div>
              </div>
            </div>
            <div class="row justify-content-xl-end">
              <div class="col-md-6 col-xs-12">
                <div>
                  <label for="">Potongan</label>
                </div>
                <input type="text" class="form-control" v-model="potongan" readonly>
              </div>
              <div class="col-md-6 col-xs-12">
                <div>
                  <label for="">Total</label>
                </div>
                <input type="text" class="form-control" v-model="total" readonly>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Proses Transaksi</button>
          </form>
        </div>
      </div>
    </div>
  </div>  
</section>
<script src="https://unpkg.com/vue-bootstrap-typeahead"></script>
<script src="https://unpkg.com/vue-bootstrap-typeahead"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
  {!! json_encode($listData) !!}
  Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead)
  new Vue({
    el: '#app',
    component : VueBootstrapTypeahead,
    data () {
      return {
        barang: '',
        dataBarang: '',
        listBarang: {!! json_encode($listData) !!},
        member: '',
        namaMember: '',
        listMember: {!! json_encode($listMember) !!},
        totalPoint: 0,
        expired: false,
        hasPoint: false,
        gunakanPoint: false
      }
    },
    methods: {
      cekPont (event) {
        if (event.point >= 100) {
          this.totalPoint = event.point
          this.hasPoint = true
        } else {
          this.hasPoint = false
          this.point = 0
          this.gunakanPoint = false
        }
        this.namaMember = event.namaLengkap
      }
    },
    computed: {
      potongan () {
        let potongan = 0
        if (this.gunakanPoint) {
          potongan = this.totalPoint * 1000
        }
        return potongan
      },
      total () {
        let hasil = this.dataBarang.harga == undefined ? 0 : this.dataBarang.harga - this.potongan
        return hasil
      }
    }
  })
</script>

@endsection