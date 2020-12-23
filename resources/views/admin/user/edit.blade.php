@extends('admin.layout.template')

@section('header')
<div class="page-inner py-5">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Edit User</h2>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt--2">
    <div class="col-md-12">
        <div class="card full-height">
            <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="card-title">Ubah Data User</div>
                    <div class="card-category">Silahkan isi form berikut.</div>
                    <div class="card-body">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Nama User</label>
                            <div class="col-md-10 p-0">
                                <input name="nama_user" type="text" class="form-control input-full" placeholder="Masukkan nama user..." value="{{ $user->nama_user }}">
                                @error('nama_user')
                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">No HP</label>
                            <div class="col-md-10 p-0">
                                <input name="no_hp" type="text" class="form-control input-full" placeholder="Masukkan No HP..." value="{{ $user->no_hp }}">
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
                                        <input @if($user->jenis_kel == 'L') {{ 'checked' }} @endif type="radio" class="form-check-input" name="jenis_kel" value="L">Laki-laki
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input @if($user->jenis_kel == 'P') {{ 'checked' }} @endif type="radio" class="form-check-input" name="jenis_kel" value="P">Perempuan
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
                                <input name="alamat" type="text" class="form-control input-full" placeholder="Masukkan alamat..." value="{{ $user->alamat }}">
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
                                    <option @if($user->status == 'admin') {{ 'selected' }} @endif value="admin">Admin</option>
                                    <option @if($user->status == 'staff') {{ 'selected' }} @endif value="staff">Staff</option>
                                </select>
                                @error('status')
                                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Username</label>
                            <div class="col-md-10 p-0">
                                <input readonly type="text" class="form-control input-full" placeholder="Masukkan username..." value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10 p-0">
                                <input readonly type="text" class="form-control input-full" placeholder="Masukkan email..." value="{{ $user->email }}">
                            </div>
                        </div>

                    </div>
                    <div class="card-title">Ubah Kredensial Login</div>
                    <div class="card-body">
                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Ubah Username?</label>
                            <div class="col-md-10 p-0">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input @if(old('ubah_username') == 1) {{ 'checked' }} @endif type="checkbox" class="form-check-input" name="ubah_username" id="checkbox_ubah_username">Ubah
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="ubah_username" class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label"></label>
                            <div id="kolom_username" class="col-md-10 p-0">
                                @error('username')
                                    <small id="error_username" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label">Ubah Password?</label>
                            <div class="col-md-10 p-0">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input @if(old('ubah_password') == 1) {{ 'checked' }} @endif type="checkbox" class="form-check-input" name="ubah_password" id="checkbox_ubah_password">Ubah
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="ubah_password" class="form-group form-inline">
                            <label for="inlineinput" class="col-md-2 col-form-label"></label>
                            <div id="kolom_password" class="col-md-10 p-0">
                                @error('password')
                                    <small id="error_password" class="form-text text-muted text-danger">{{ $message }}</small>
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
    $('#ubah_username').hide();
    $('#ubah_password').hide();    

    if($('#error_username').length){
        $('#checkbox_ubah_username').prop('checked', true);
        $("#kolom_username").prepend('<input id="input_ubah_username" name="username" type="text" class="form-control input-full" placeholder="Masukkan username baru..." value="{{ old("username") }}">');
        $('#ubah_username').show();
    }

    if($('#error_password').length){
        $('#checkbox_ubah_password').prop('checked', true);
        $("#kolom_password").prepend('<input id="input_ubah_password" name="password" type="password" class="form-control input-full" placeholder="Masukkan password baru..." value="{{ old("password") }}">');
        $('#ubah_password').show();
    }

    $('#checkbox_ubah_username').change(function() {
        if($(this).is(':checked')) { 
            $("#kolom_username").prepend('<input id="input_ubah_username" name="username" type="text" class="form-control input-full" placeholder="Masukkan username baru..." value="{{ old("username") }}">');
            $("#ubah_username").slideDown(500);
        } else {
            $("#ubah_username").slideUp(500);
            $("#input_ubah_username").remove();
            $('#ubah_username').slideUp(500);
        }
    });

    $('#checkbox_ubah_password').change(function() {
        if($(this).is(':checked')){
            $("#kolom_password").prepend('<input id="input_ubah_password" name="password" type="password" class="form-control input-full" placeholder="Masukkan password baru..." value="{{ old("password") }}">');
            $("#ubah_password").slideDown(500);
        } else {
            $("#ubah_password").slideUp(500);
            $("#input_ubah_password").remove();
            $('#ubah_password').slideUp(500);
        } 
    });
});
</script>
@endpush
