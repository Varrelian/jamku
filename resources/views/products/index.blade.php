<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>Koleksi Jam Tangan</h2>
    </div>
    <div class="col-md-4">
        <form id="search-form">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari produk..." name="search" id="search-input">
                <select class="form-select" name="type" id="type-select">
                    <option value="">Semua Jenis</option>
                    <option value="analog">Analog</option>
                    <option value="digital">Digital</option>
                    <option value="chronograph">Chronograph</option>
                    <option value="diver">Diver</option>
                    <option value="smartwatch">Smartwatch</option>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="row" id="products-grid">
    @include('products.partials.grid')
</div>

<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    function loadProducts() {
        const search = $('#search-input').val();
        const type = $('#type-select').val();
        
        $.get('{{ route('products.index') }}', { search: search, type: type }, function(data) {
            $('#products-grid').html(data);
        });
    }

    $('#search-input, #type-select').on('input change', function() {
        loadProducts();
    });
});
</script>
@endpush