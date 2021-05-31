<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <form method="post" action="/register/isi-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="input_nama" class="form-label">Nama Lengkap</label>
                        <input id="input_nama" class="form-control" name="nama" type="text" placeholder="Masukkan nama lengkap ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_nim" class="form-label">NIM</label>
                        <input id="input_nim" class="form-control" name="nim" type="text" placeholder="Masukkan NIM ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                        <input id="input_nik" class="form-control" name="nik" type="text" placeholder="Masukkan NIK ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_tempatlahir" class="form-label">Tempat Lahir</label>
                        <input id="input_tempatlahir" class="form-control" name="tempatlahir" type="text" placeholder="Masukkan tempat lahir ..." required/>
                    </div>
                    <div class="form-group">
                        <label for="input_tanggallahir" class="form-label">Tanggal Lahir</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <input id="input_tanggallahir" class="form-control" name="tanggallahir" type="date" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_jeniskelamin" class="form-control" name="jeniskelamin" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label form="input_refnegara" class="form-label">Negara</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_refnegara" class="form-control" name="ref_negara" required>
                                    @foreach ($ref_negara as $d_negara)
                                        <option value="{{ $d_negara->id }}">{{ $d_negara->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_alamat" class="form-label">Alamat</label>
                        <textarea id="input_alamat" class="form-control" name="alamat" placeholder="Masukkan alamat ..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input_notelepon" class="form-label">Nomor Telepon</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <input id="input_notelepon" class="form-control" name="no_telepon" type="number" placeholder="Masukkan nomor telepon ..." required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_kualifikasipendidikan" class="form-label">Kualifikasi Pendidikan</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_kualifikasipendidikan" class="form-control" name="kualifikasi_pendidikan" required>
                                    <option value="Pendidikan Dasar">Pendidikan Dasar</option>
                                    <option value="Pendidikan Menengah">Pendidikan Menengah</option>
                                    <option value="Sarjana (S1)">Sarjana (S1)</option>
                                    <option value="Magister (S2)">Magister (S2)</option>
                                    <option value="Doktor (S3)">Doktor (S3)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label form="input_prodi" class="form-label">Program Studi</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <select id="input_prodi" class="form-control" name="prodi">
                                    @foreach ($ref_prodi as $d_prodi)
                                        <option value="{{ $d_prodi->id }}">{{ $d_prodi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                    </div>
                </form>
</body>
</html>
