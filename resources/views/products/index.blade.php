@extends('products.layout')

@section('title', 'Daftar Produk')

@section('content')
<div class="container">
    <h1 class="mt-4">Daftar Produk</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Tambah Produk</button>

    <!-- Tabel Produk -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal"
                        onclick="editProduct({{ json_encode($product) }})">
                        Edit
                    </button>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stock" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Produk -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editProductForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="editName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="editDescription"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="price" id="editPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStock" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stock" id="editStock" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk mengisi data di modal Edit -->
<script>
    function editProduct(product) {
        const form = document.getElementById('editProductForm');
        form.action = `/products/${product.id}`;
        document.getElementById('editName').value = product.name || '';
        document.getElementById('editDescription').value = product.description || '';
        document.getElementById('editPrice').value = product.price || '';
        document.getElementById('editStock').value = product.stock || '';
    }
</script>
@endsection