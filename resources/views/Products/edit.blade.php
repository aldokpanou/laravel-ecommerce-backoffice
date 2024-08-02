<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier un produit</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    <div class="mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
      <div class="px-6 py-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Modifier un produit</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
              Nom du produit
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" type="text" placeholder="Product Name" value="{{ $product->name }}" required>
          </div>
          <div class="mb-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
              Description
            </label>
            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="description" name="description" placeholder="Product Description" required>{{ $product->description }}</textarea>
          </div>
          <div class="mb-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
              Prix
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="price" name="price" type="number" placeholder="Product Price" value="{{ $product->price }}" required>
          </div>
          <div class="mb-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="stock">
              Stock
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="stock" name="stock" type="number" placeholder="Product Stock" value="{{ $product->stock }}" required>
          </div>
          <div class="mb-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category_id">
              Categoie
            </label>
            <div class="relative">
              <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="category_id" name="category_id" required>
                <option value="">Choisir une catégorie</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
            </div>
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Mettre à jour un produit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
