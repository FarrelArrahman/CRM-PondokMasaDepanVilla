@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Tambah User</h2>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt--2">
    <div class="col-md-12">
        <div class="card full-height">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="card-title">Tambah User Baru</div>
                    <div class="card-category">Silahkan isi form berikut.</div>
                    <div class="card-body">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Nama User</label>
                            <div class="col-md-10 p-0">
                                <input name="nama_user" type="text" class="form-control input-full" placeholder="Masukkan nama user..." value="{{ old('nama_user') }}">
                                @error('nama_user')
                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">No HP</label>
                            <div class="col-md-10 p-0">
                                <input name="no_hp" type="text" class="form-control input-full" placeholder="Masukkan No HP..." value="{{ old('no_hp') }}">
                                @error('no_hp')
                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-10 p-0">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input @if(old('jenis_kel') == 'L') {{ 'checked' }} @endif type="radio" class="form-check-input" name="jenis_kel" value="L">Laki-laki
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input @if(old('jenis_kel') == 'P') {{ 'checked' }} @endif type="radio" class="form-check-input" name="jenis_kel" value="P">Perempuan
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                @error('jenis_kel')
                                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10 p-0">
                                <input name="alamat" type="text" class="form-control input-full" placeholder="Masukkan alamat..." value="{{ old('alamat') }}">
                                @error('alamat')
                                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10 p-0">
                                <select name="status" class="form-control input-full">
                                    <option value="" selected disabled>Pilih status...</option>
                                    <option @if(old('status') == 'admin') {{ 'selected' }} @endif value="admin">Admin</option>
                                </select>
                                @error('status')
                                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-title">Kredensial Login</div>
                    <div class="card-body">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10 p-0">
                                <input name="username" type="text" class="form-control input-full" placeholder="Masukkan username..." value="{{ old('username') }}">
                                @error('username')
                                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10 p-0">
                                <input name="email" type="email" class="form-control input-full" placeholder="Masukkan email..." value="{{ old('email') }}">
                                @error('email')
                                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10 p-0">
                                <input name="password" type="password" class="form-control input-full" placeholder="Masukkan password..." value="{{ old('password') }}">
                                @error('password')
                                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-action text-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('bottom')
<script>
$(document).ready(function() {
    //
});
</script>
@endpush
