<div class="form-group">
    <label>Nama Mobil</label>
    <input type="text" name="nama_mobil" class="form-control" value="{{ old('nama_mobil', $mobil->nama_mobil ?? '') }}">
</div>
<div class="form-group">
    <label>Kapasitas BBM</label>
    <input type="number" name="kapasitas_bbm" class="form-control"
        value="{{ old('kapasitas_bbm', $mobil->kapasitas_bbm ?? '') }}">
</div>
<div class="form-group">
    <label>Transmisi</label>
    <input type="text" name="transmisi" class="form-control" value="{{ old('transmisi', $mobil->transmisi ?? '') }}">
</div>
<div class="form-group">
    <label>Jumlah Penumpang</label>
    <input type="number" name="jumlah_penumpang" class="form-control"
        value="{{ old('jumlah_penumpang', $mobil->jumlah_penumpang ?? '') }}">
</div>
<div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" value="{{ old('harga', $mobil->harga ?? '') }}">
</div>
<div class="form-group">
    <label>Plat Nomor</label>
    <input type="text" name="plat_nomor" class="form-control"
        value="{{ old('plat_nomor', $mobil->plat_nomor ?? '') }}">
</div>
<div class="form-group">
    <label>Tahun</label>
    <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $mobil->tahun ?? '') }}">
</div>
<div class="form-group">
    <label>Tipe</label>
    <input type="text" name="tipe" class="form-control" value="{{ old('tipe', $mobil->tipe ?? '') }}">
</div>
<div class="form-group">
    <label>Gambar</label>
    @if (isset($mobil) && $mobil->gambar)
        <br><img src="{{ asset('storage/' . $mobil->gambar) }}" width="100">
    @endif
    <input type="file" name="gambar" class="form-control">
</div>
