@extends('layouts.master')

<script src="{{ url('js/vue.js') }}"></script>

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
          <div v-if="hasPoint" :class="pointAktif ? 'alert alert-success alert-dismissible' : 'alert alert-warning alert-dismissible'">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>@{{ pointAktif ? 'Point Dapat Digunakan !' : 'Mohon Maaf Point Anda Expired' }}</h4>
            @{{ namaMember }} Mempunyai @{{ totalPoint }} Point. Terakhir Transaksi @{{ lastTransaksi }}
          </div>
          <form action="{{ route('insertTransaksi') }}" method="post">
            @csrf
            <div class="row" v-if="hasPoint && pointAktif">
              <div class="col-md-6 col-xs-12">
                <div class="input-group mb-3 form-check">
                  <input class="form-check-input" value="true" type="checkbox" v-model="gunakanPoint" name="gunakanPoint" id="defaultCheck1">
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
                  name="noTelp"
                  id="noTelp"
                  placeholder="No Telp Member"
                  :serializer="s => s.nomorHp"
                  style="width: 100%"
                  @hit="cekPont($event)"
                  />
                </div>
                <input type="text" hidden class="form-control" name="noTelp" readonly v-model="member">
              </div>
              <div class="col-sm-12 col-lg-6">
                <div>
                  <label for="">Nama</label>
                </div>
                <div class="input-group mb-3">
                <input type="text" class="form-control" name="namaMember" readonly v-model="namaMember">
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
                <input type="number" name="harga" class="form-control" readonly v-model="dataBarang.harga">
                </div>
              </div>
            </div>
            <div class="row" v-if="dataBarang.kategori === 'Produk'">
              <div class="col-md-6 col-xs-12">
                <div>
                  <label for="">Jumlah</label>
                </div>
                <div class="input-group">
                  <input type="number" class="form-control" name="jumlahBeli" v-model="jumlahBeli">
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div>
                  <label for="">Stok Tersedia</label>
                </div>
                <input type="text" class="form-control" name="stokTersedia" v-model="dataBarang.stock" readonly>
              </div>
            </div>
            <div class="row justify-content-xl-start">
              <div class="col-md-6 col-xs-12">
                <div>
                  <label for="">Terapis</label>
                </div>
                <select class="form-control" name="terapis">
                  <option value="1">Raihan</option>
                  <option value="2">Ziyan</option>
                  <option value="3">Abu</option>
                </select>
              </div>
              <div class="col-md-6 col-xs-12">
                <div>
                  <label for="">Jenis Pembayaran</label>
                </div>
                <select class="form-control" name="metodePembayaran">
                  <option value="Debit">Debit</option>
                  <option value="Kredit">Kredit</option>
                  <option value="Cash">Cash</option>
                </select>
              </div>
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-md-4 col-xs-12">
                <div>
                  <label for="">Sub Total</label>
                </div>
                <input type="text" class="form-control" name="total" v-model="subTotal" readonly>
              </div>
              <div class="col-md-4 col-xs-12">
                <div>
                  <label for="">Potongan</label>
                </div>
                <input type="text" class="form-control" name="potongan" v-model="potongan" readonly>
              </div>
              <div class="col-md-4 col-xs-12">
                <div>
                  <label for="">Total</label>
                </div>
                <input type="text" class="form-control" name="total" v-model="total" readonly>
              </div>
            </div>
            <h4>Total Biaya Rp. @{{ formatPrice(total) }},-</h4>
            <input type="text" class="form-control" name="point" hidden v-model="totalPoint" readonly>
            <input type="number" class="form-control" name="idProduk" hidden v-model="dataBarang.idProduk" readonly>
            <button type="submit" class="btn btn-primary mt-3">Proses Transaksi</button>
          </form>
        </div>
      </div>
    </div>
  </div>  
</section>
<script src="https://unpkg.com/vue-bootstrap-typeahead"></script>
<script src="https://unpkg.com/vue-bootstrap-typeahead"></script>
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
        jumlahBeli: 1,
        member: '',
        namaMember: '',
        listMember: {!! json_encode($listMember) !!},
        totalPoint: 0,
        expired: false,
        hasPoint: false,
        gunakanPoint: false,
        pointAktif: false,
        lastTransaksi: null
      }
    },
    methods: {
      formatPrice (value) {
        let val = (value / 1).toFixed(0).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')
      },
      pointExpired (date) {
        let lastTransaksi = (new Date() - new Date(date)) / (60*60*24*1000)
        if (lastTransaksi < 240) {
          return false
        } else {
          return true
        }
      },
      cekPont (event) {
        if (event.point >= 100) {
          if (this.pointExpired(event.lastTransaksi)) {
            this.pointAktif = false
            this.totalPoint = 0
            this.hasPoint = true
          } else {
            this.pointAktif = true
            this.totalPoint = event.point
            this.hasPoint = true
          }
        } else {
          this.hasPoint = false
          this.point = 0
          this.gunakanPoint = false
        }
        this.lastTransaksi = event.lastTransaksi
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
      subTotal () {
        return this.dataBarang.harga == undefined ? 0 : this.dataBarang.harga * this.jumlahBeli
      },
      total () {
        let hasil = this.dataBarang.harga == undefined ? 0 : this.subTotal - this.potongan
        return hasil
      }
    }
  })
</script>

@endsection