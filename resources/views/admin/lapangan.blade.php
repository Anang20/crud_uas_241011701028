@extends('layouts.app')
@section('title', 'Data Lapangan Olahraga')
@section('title-content', 'Management Data Lapangan Olahraga')
@section('content')
<div class="card p-4">
    <div class="d-flex align-items-center mb-3 gap-2">
        <button class="btn btn-add" id="btnAdd">
            <i class="ri-add-line"></i> Tambah Lapangan
        </button>
        <button class="btn btn-pdf" id="btnPdf">
            <i class="ri-file-pdf-line"></i> Cetak PDF
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover" id="lapangansTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Lapangan</th>
                    <th>Gambar</th>
                    <th>Nama Lapangan</th>
                    <th>Jenis</th>
                    <th>Lokasi</th>
                    <th>Kondisi</th>
                    <th>Harga / Jam</th>
                    <th>Jam Operasional</th>
                    <th>Kontak</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Update modal styling dengan tema ungu -->
<div class="modal fade" id="lapanganModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <form id="lapanganForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lapanganModalLabel">Form Lapangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="id_lapangan" name="id_lapangan">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <div id="currentImageContainer" class="mb-2" style="display: none;">
                            <p class="text-muted small">Gambar saat ini:</p>
                            <img src="/storage/gambar/${lapangan.gambar}" class="preview-large mt-2">
                        </div>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="mb-3">
                        <label for="nama_lapangan" class="form-label">Nama Lapangan</label>
                        <input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" placeholder="Masukkan nama lapangan" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select name="jenis" id="jenis" class="form-select" required>
                            <option value="">--Pilih Jenis--</option>
                            <option value="Sepak Bola">Sepak Bola</option>
                            <option value="Futsal">Futsal</option>
                            <option value="Basket">Basket</option>
                            <option value="Voli">Voli</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Tenis">Tenis</option>
                            <option value="Gym">Gym</option>
                            <option value="Squash">Squash</option>
                            <option value="Baseball">Basball</option>
                            <option value="Atletik">Atletik</option>
                            <option value="Padel">Padel</option>
                            <option value="Takraw">Takraw</option>
                            <option value="Serbaguna">Serbaguna</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <textarea class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan lokasi lapangan" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select name="kondisi" id="kondisi" class="form-select" required>
                            <option value="">--Pilih Kondisi--</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                            <option value="Perbaikan">Perbaikan</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga / Jam</label>
                            <input type="number" class="form-control" name="harga_per_jam" id="harga_per_jam" placeholder="Contoh: 150000" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kontak (HP / WA)</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" placeholder="08xxxxxxxx">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Buka</label>
                            <input type="time" class="form-control" name="jam_buka" id="jam_buka" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam Tutup</label>
                            <input type="time" class="form-control" name="jam_tutup" id="jam_tutup" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                            placeholder="Detail tambahan lapangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-save-lapangan" id="saveLapanganBtn">Simpan</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        function formatTime(time) {
            if (!time) return '';
            return time.substring(0,5);
        }
        let table = $('#lapangansTable').DataTable({
            ajax: {
                url: '{{ route('api.lapangans.data') }}',
                method: 'GET',
                headers: {
                    "Authorization": "Bearer " + API_TOKEN
                },
                dataSrc: "data",
            },
            responsive: true,
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'id_lapangan'},
                {data: 'gambar', 
                    render: function(data) {
                        return data ? `<img src="/storage/gambar/${data}" width="150" style="border-radius: 6px;">` : 'No Image';
                    }
                },
                {data: 'nama_lapangan'},
                {data: 'jenis'},
                {data: 'lokasi'},
                {data: 'kondisi'},
                {
                    data: 'harga_per_jam',
                    render: function(data) {
                        if (!data) return '-';
                        return 'Rp ' + Number(data).toLocaleString('id-ID');
                    }
                },
                {
                    data: null,
                    render: function(row) {
                        return `
                            <span class="badge bg-success">
                                ${row.jam_buka} - ${row.jam_tutup}
                            </span>
                        `;
                    }
                },
                {
                    data: 'kontak',
                    render: function(data) {
                        return data ? data : '-';
                    }
                },

                {
                    data: 'deskripsi',
                    render: function(data) {
                        return data ? data : '-';
                    }
                },
                {
                    data: 'id_lapangan',
                    render: function(data, type, row, meta) {
                        return `
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-sm btn-edit" data-id="${data}">
                                    <i class="ri-edit-line"></i>
                                </button>
                                <button class="btn btn-sm btn-delete-lapangan btn-delete" data-id="${data}">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            initComplete:function(settings, json) {
                if (json && json.message) {
                    toastr.success(json.message);
                }
            },
            error: function(xhr, error, thrown) {
                toastr.error('Gagal memuat data lapangan');
            }
        });

        $('#lapanganForm').submit(function(e) {
            e.preventDefault();

            let id = $('#id_lapangan').val();
            let url = id ? `/api/lapangans/${id}` : '/api/lapangans';
            let method = id ? 'POST' : 'POST';

            let formData = new FormData(this);

            if (id) {
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: url,
                type: method,
                headers: {
                    "Authorization": "Bearer " + API_TOKEN
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#lapanganModal').modal('hide');
                    table.ajax.reload();
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON?.message || 'Gagal menyimpan data');
                }
            });
        });

        $('#lapangansTable').on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/api/lapangans/${id}`,
                method: 'GET',
                headers: {
                    "Authorization": "Bearer " + API_TOKEN
                },
                success: function(response) {
                    let lapangan = response.data;
                    $('#id_lapangan').val(lapangan.id_lapangan);
                    
                    $('#nama_lapangan').val(lapangan.nama_lapangan);
                    $('#jenis').val(lapangan.jenis);
                    $('#lokasi').val(lapangan.lokasi);
                    $('#kondisi').val(lapangan.kondisi);
                    $('#harga_per_jam').val(lapangan.harga_per_jam);
                    $('#jam_buka').val(formatTime(lapangan.jam_buka));
                    $('#jam_tutup').val(formatTime(lapangan.jam_tutup));
                    $('#kontak').val(lapangan.kontak);
                    $('#deskripsi').val(lapangan.deskripsi);
                    
                    if (lapangan.gambar) {
                        $('#gambar').next('.image-preview').remove();
                        $('#gambar').after(
                            `<div class="image-preview mt-2">
                                <small class="text-muted">Gambar saat ini:</small><br>
                                <img src="/storage/gambar/${lapangan.gambar}" width="100" class="mt-2">
                                <p class="text-muted small mt-2">Biarkan kosong jika tidak ingin mengubah gambar</p>
                            </div>`
                        );
                    }
                    
                    $('#lapanganModal').modal('show');
                },
                error: function(xhr) {
                    toastr.error("Gagal memuat data lapangan");
                }
            });
        });

        $('#btnAdd').click(function() {
            $('#lapanganForm')[0].reset();
            $('#id_lapangan').val('');
            $('.image-preview').remove();
            $('#lapanganModal').modal('show');
        });

        $('#btnPdf').click(function () {
            window.open(
                '{{ route('api.lapangans.cetak-pdf') }}',
                '_blank'
            );
        });

        $('#lapangansTable').on('click', '.btn-delete', function() {
           if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) return;
           var id = $(this).data('id');
           $.ajax({
                url: `/api/lapangans/${id}`,
                method: 'DELETE',
                headers: {
                    "Authorization": "Bearer " + API_TOKEN
                },
                success: function(response) {
                    table.ajax.reload();
                    toastr.success('Data berhasil dihapus.');
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan saat menghapus data');
                }
           });
        });
    });
</script>
@endsection
