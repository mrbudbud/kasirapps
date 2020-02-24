<style>
html { margin: 0px}
.container {
  position: relative;
  text-align: center;
  color: white;
}

/* Bottom left text */
.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

/* Top left text */
.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

/* Top right text */
.top-right {
  position: absolute;
  top: 8px;
  right: 37px;
}

/* Bottom right text */
.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

/* Centered text */
.centered {
  position: absolute;
  top: 25%;
  left: 40%;
  color: #09225b;
  transform: translate(-50%, -50%);
}
.centered2 {
  position: absolute;
  top: 33%;
  left: 40%;
  color: #3177a9;
  transform: translate(-50%, -50%);
}

.centered3 {
  position: absolute;
  top: 103px;
  right: 80px;
  color: #3177a9;
}
.centered4 {
  position: absolute;
  top: 127px;
  right: 80px;
  color: #3177a9;
}
.centered5 {
  position: absolute;
  top: 156px;
  right: 80px;
  color: #3177a9;
}
</style>
<div class="container" style="background-color: #525659;">
  <img src="{{ url('img/card.png') }}" alt="" width=100%">
  <!-- <div class="bottom-left">Bottom Left</div>
  <div class="top-left">Top Left</div>
  <div class="top-right">Top Right</div>
  <div class="bottom-right">Bottom Right</div> -->
  <div class="centered">
    <h2>{{ $data['namaLengkap'] }}</h2>
  </div>
  <div class="centered2">
    <p>Member</p>
  </div>
  <div class="top-right">
  <img width="100" src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{ $data['nomorHp'] }}&choe=UTF-8" title="Profile Anggota" />
  </div>
  <div class="centered3">
    <p align="right">{{ $data['alamat'] }}</p>
  </div>
  <div class="centered4">
    <p align="right">{{ $data['email'] }}</p>
  </div>
  <div class="centered5">
    <p align="right">{{ $data['nomorHp'] }}</p>
  </div>
</div>