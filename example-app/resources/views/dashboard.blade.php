<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Styling for the dashboard -->
                    <style>
                        input, button {
                            margin: 5px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #f8f8f8;
                        }
                        .form-inline {
                            display: flex;
                            align-items: center;
                            justify-content: flex-start;
                        }
                        .hidden {
                            display: none;
                        }
                    </style>

                    <!-- Add Product Form -->
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Name" required>
                        <input type="text" name="price" placeholder="Price" required>
                        <input type="number" name="quantity" placeholder="Quantity" required>
                        <input type="text" name="category" placeholder="Category" required>
                        <input type="file" name="image" required> <!-- File input for the image -->
                        <button type="submit">Add Product</button>
                    </form>

                    <!-- Products Table -->
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Path</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->path }}</td>
                                <td>
                                    <button onclick="toggleEditForm({{ $product->id }})">Edit</button>
                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <div id="editForm{{ $product->id }}" class="hidden">
                                        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" value="{{ $product->name }}" placeholder="Name" required>
                                            <input type="text" name="price" value="{{ $product->price }}" placeholder="Price" required>
                                            <input type="number" name="quantity" value="{{ $product->quantity }}" placeholder="Quantity" required>
                                            <input type="text" name="category" value="{{ $product->category }}" placeholder="Category" required>
                                            <input type="file" name="image" id="image{{ $product->id }}" onchange="updateImagePath({{ $product->id }})">
                                            <input type="text" name="path" id="path{{ $product->id }}" value="{{ $product->path }}" readonly>
                                            <button type="submit">Update Product</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Users Table -->
                    <h3>Manage Users</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
function toggleEditForm(id) {
    var form = document.getElementById('editForm' + id);
    form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
}

function updateImagePath(id) {
    var fileInput = document.getElementById('image' + id);
    var pathInput = document.getElementById('path' + id);
    pathInput.value = fileInput.value;
}
</script>
