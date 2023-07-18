<div class="form-group">
    <label>Nama Barang</label>
    <input type="text" name="nm_barang" class="form-control @error('nm_barang') is-invalid @enderror" placeholder="{{ __('Nama Barang') }}" value="{{ old('nm_barang') }}" required>
    @error('nm_barang')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
    <label>Type Barang</label>
    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="{{ __('Type Barang') }}" value="{{ old('type') }}">
    @error('type')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
    <label>Merk Barang</label>
    <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" placeholder="{{ __('Merk Barang') }}" value="{{ old('merk') }}">
    @error('merk')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
    <label>Harga Barang</label>
    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="{{ __('Harga Barang') }}" value="{{ old('harga') }}" required>
    @error('harga')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
    <label>Jumlah Barang</label>
    <input type="number" name="jml_brg" class="form-control @error('jml_brg') is-invalid @enderror" placeholder="{{ __('Jumlah Barang') }}" value="{{ old('jml_brg') }}">
    @error('jml_brg')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
    <label>Keterangan</label>
    <input type="number" name="ket" class="form-control @error('ket') is-invalid @enderror" placeholder="{{ __('Keterangan') }}" value="{{ old('ket') }}">
    @error('ket')
    <span class="error invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>