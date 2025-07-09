<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Makanan - Makanan</title>
    <link rel="icon" type="image/png" href="{{ asset('image/icondapur.jpg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('include.navbarSistem')
    @include('include.sidebar')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">Katalog Makanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <form method="GET" class="form-inline float-sm-right">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" class="form-control form-control-navbar"
                                    placeholder="Cari makanan..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @forelse($makanan as $item)
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body p-0">
                                            <img src="https://placehold.co/400x250?text={{ urlencode($item->nama_makanan) }}"
                                                alt="{{ $item->nama_makanan }}"
                                                class="img-fluid rounded-top w-100"
                                                style="object-fit: cover; height: 250px;">
                                            <div class="p-3">
                                                <h5 class="card-title text-primary font-weight-bold">{{ $item->nama_makanan }}</h5>
                                                <p class="card-text mb-1"><strong>Kategori:</strong> {{ $item->kategori }}</p>
                                                <p class="card-text mb-1"><strong>Harga:</strong> Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                                <p class="card-text mb-1"><strong>Stok:</strong> {{ $item->stok }}</p>
                                                <p class="card-text"><strong>Restoran:</strong> {{ $item->restoran->nama_restoran ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <p class="text-muted">Tidak ada makanan ditemukan.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('include.footerSistem')
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteMakananModal" tabindex="-1" aria-labelledby="deleteMakananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteMakananModalLabel"><i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus makanan ini? Tindakan ini tidak dapat dibatalkan.
            </div>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/ToastScript.js') }}"></script>

<script>
    $(document).ready(function () {
        $("#makananTable").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });

        $('.delete-makanan-btn').click(function () {
            let id = $(this).data('id');
            let deleteUrl = "{{ url('makanan') }}/" + id;
            $('#deleteForm').attr('action', deleteUrl);
        });

        @if (session('success') || session('error'))
            $('#toastNotification').toast({
                delay: 3000,
                autohide: true
            }).toast('show');
        @endif
    });
</script>
</body>
</html>
