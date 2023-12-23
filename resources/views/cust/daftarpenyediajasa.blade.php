@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Become Provider</h1>

        <form method="post" action="{{ route('submit.provider') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id_jasa" >Pilih Layanan:</label>
                        <select name="id_jasa" id="id_jasa" class="form-control" required>
                            {{-- Isi dropdown ini dengan kategori-kategori Anda --}}
                            @foreach ($jasas as $jasa)
                                <option value="{{ $jasa->id_jasa }}">{{ $jasa->nama_jasa }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_toko">Nama Toko:</label>
                        <input type="text" name="nama_toko" id="nama_toko" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="photo" >Foto:       (Tekan Disini)</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required onchange="previewImage(event)">
                        <img id="preview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
                    </div>

                    <div class="form-group">
                        <label for="address" >Alamat:</label>
                        <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description" >Deskripsi:</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="no_rek" >Nomor Rekening Bank:</label>
                        <input type="text" name="no_rek" id="no_rek" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Harga" >Harga Layanan:</label>
                        <input type="number" name="Harga" id="Harga" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" style="width: 150px; margin-top: 10px">Kirim</button>                
                    </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block'; // Menampilkan preview gambar setelah memilih file
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
        
@endsection
