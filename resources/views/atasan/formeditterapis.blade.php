	@extends('layouts.atasanLayout')


	@section('main_content')

	<section class="content">
	<div class="row" style="padding-top: 20px;">
		<div class="col-xl-12">
			<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					Edit Data Terapis
				</h3>
			</div>
			<div class="card-body no-padding">
				<form action="{{ route('updateTerapis', $data->idTerapis) }}" method="POST">
					@csrf
					<div class="container-fluid">
					<div class="col-12">
					<div>
						<label for="">Nama Terapis</label>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-append">
							<div class="input-group-text">
							</div>
						</div>
							<input value="{{ $data->namaTerapis }}" name="namaTerapis" type="text" class="form-control" placeholder="Nama Terapis">
						</div>
						<div>
							<label for="">Nomor Telepon / WA</label>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
							<div class="input-group-text">
							</div>
							</div>
							<input value="{{ $data->noTelepon }}" name="noTelepon" type="number" class="form-control" placeholder="No Telepon / WA">
						</div>
						<div>
							<label for="">Alamat</label>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
							<div class="input-group-text">
							</div>
							</div>
							<input value="{{ $data->alamat }}" name="alamat" type="text" class="form-control" placeholder="Alamat">
						</div>
						<div>
							<label for="">Email</label>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
							<div class="input-group-text">
							</div>
							</div>
							<input value="{{ $data->email }}" name="email" type="email" class="form-control" placeholder="Email">
						</div>
					</div>
					</div>
					<div class="modal-footer">
					<a href="{{ route('tampilTerapis') }}">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
					</a>
					<button type="submit" class="btn btn-primary">Update Data Terapis</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>  
	</section>
	@endsection