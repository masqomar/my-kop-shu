<div class="form-group">
    <label>Tanggal</label>
    <input type="date" name="tgl_catat" class="form-control @error('tgl_catat') is-invalid @enderror" placeholder="{{ __('Tanggal Transaksi') }}" value="{{ old('tgl_catat') }}" required>
    @error('tgl_catat')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
<label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="{{ __('Jumlah') }}" value="{{ old('jumlah') }}" required>
    @error('jumlah')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
<label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="{{ __('keterangan') }}" value="{{ old('keterangan') }}">
   @error('keterangan')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
<label>Dari Akun</label>
   <select name="akun_id" class="form-control">
    @foreach ($jenisAkun as $akun)
    <option value="{{$akun->id}}">{{$akun->kd_aktiva}} | {{$akun->jns_trans}}</option>
    @endforeach
   </select>
    @error('jumlah')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
<label>Untuk Kas</label>
   <select name="untuk_kas" class="form-control">
   @foreach ($jenisKas as $kas)
    <option value="{{$kas->id}}">{{$kas->nama}}</option>
    @endforeach
   </select>
    @error('jumlah')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>
