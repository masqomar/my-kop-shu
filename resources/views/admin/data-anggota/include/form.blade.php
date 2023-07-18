<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name">{{ __('Nama Depan') }}</label>
            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('Nama Depan') }}" value="{{ isset($anggota) ? $anggota->first_name : old('first_name') }}" required autofocus>
            @error('first_name')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name">{{ __('Nama Belakang') }}</label>
            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Nama Belakang') }}" value="{{ isset($anggota) ? $anggota->last_name : old('last_name') }}" required autofocus>
            @error('last_name')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ isset($anggota) ? $anggota->email : old('email') }}" required>
            @error('email')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" {{ empty($anggota) ? 'required' : '' }}>
            @error('password')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
            @isset($anggota)
            <div id="passwordHelpBlock" class="form-text">
                {{ __('Leave the password & password confirmation blank if you don`t want to change them.') }}
            </div>
            @endisset
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="password-confirmation">{{ __('Password Confirmation') }}</label>
            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" {{ empty($anggota) ? 'required' : '' }}>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="mobile">{{ __('No Telepon') }}</label>
            <input type="text" name="mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="{{ __('No Telepon') }}" value="{{ isset($anggota) ? $anggota->mobile : old('mobile') }}" required autofocus>
            @error('mobile')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="member_id">{{ __('No Anggota') }}</label>
            <input type="text" name="member_id" id="member_id" class="form-control @error('member_id') is-invalid @enderror" placeholder="{{ __('No Anggota') }}" value="{{ isset($anggota) ? $anggota->member_id : old('member_id') }}" required autofocus>
            @error('member_id')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" required>
                <option value="" selected disabled>-- {{ __('Select Status') }} --</option>
                <option value="0" {{ isset($anggota) && $anggota->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('Tidak Aktif') }}</option>
                <option value="1" {{ isset($anggota) && $anggota->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('Aktif') }}</option>
            </select>
            @error('status')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
</div>