<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        background-color: #ff9933;
        padding-top: 20px;
        position: fixed;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .sidebar img {
        display: block;
        margin: 0 auto;
        width: 150px;
    }

    .sidebar a {
        text-decoration: none;
        color: white;
        padding: 10px 15px;
        display: flex;
        align-items: center;
        margin: 5px 0;
        border-radius: 5px;
    }

    .sidebar a:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .sidebar a.active {
        background-color: white;
        color: #ff9933;
    }

    .sidebar a i {
        margin-right: 10px;
    }

    .logout {
        text-align: center;
        margin-bottom: 20px;
    }

    .logout a {
        color: white;
    }

    .judulhalaman {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn-tambah-produk {
        padding: 8px 12px;
        border-radius: 4px;
        background-color: #ff9933;
        color: white;
        text-decoration: none;
        display: inline-block;
    }

    .btn-tambah-produk:hover {
        background-color: darkorange;
    }

    .pencil {
        text-align: center;
        margin-bottom: 16px;
    }

    .pencil a {
        padding: 4px;
        border-radius: 4px;
        color: white;
        background-color: green;
    }

    .trash {
        text-align: center;
        margin-bottom: 16px;
    }

    .trash i {
        padding: 6px;
        border-radius: 4px;
        color: white;
        background-color: red;
    }
</style>

<body>
    <div class="sidebar">
        <div>
            <img src="{{ asset('img/logo.png') }}" alt="Giwigewi Logo">
            <a href="/admin" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/userorder"><i class="fas fa-chart-line"></i> User Order</a>
            <a href="/tambahartikel"><i class="fas fa-plus"></i> Tambah Artikel</a>
        </div>
        <div class="logout">
            <a href="/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
    </div>

    <div class="content">
        <div class="judulhalaman">
            <h2>Products</h2>
            <a href="/admin/products/create" class="btn-tambah-produk">+ Tambah Produk</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($products as $product)
            <tbody>
                <td>{{ $product->id }}</td>
                <td>

                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>
                    <div class="pencil">
                        <a href="#"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                    <div class="trash">
                        <form action="{{ url('/products/' . $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a type="submit" onclick="return confirm('Are you sure you want to delete this product?')" style="background:none;border:none;color:red;">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </form>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>