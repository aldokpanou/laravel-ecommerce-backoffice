<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
      @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
          {{ session('success') }}
        </div>
      @endif
      <!-- Filter Section -->
      <div class="mb-4 p-4 border rounded-lg shadow-md">
        <h2 class="text-lg font-semibold mb-2">Filtrer les  produits</h2>
        <form method="GET" class="flex flex-wrap -mx-2">
          <div class="w-full md:w-1/2 px-2">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
              Categorie
            </label>
            <div class="relative">
              <select name="category" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="category">
                <option value="">Choisir une catégorie</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/2 px-2">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="stock">
              Stock
            </label>
            <input name="stock" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="stock" type="number" placeholder="Stock de produit" value="{{ request('price') }}">
          </div>
          <div class="w-full px-2 mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Rechercher</button>
          </div>
        </form>
      </div>
      <!-- End of Filter Section -->
      <div class="flex justify-end mb-4">
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter un produit</a>
        <a href="{{ route('categories.index') }}" class="border border-b hover:bg-blue-700 hover:text-white text-blue-500 font-bold py-2 px-4 ml-10 rounded">Les catégories</a>
      </div>
      <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
          <table class="min-w-full leading-normal">
            <thead>
              <tr>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Prix</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Stock</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Categorie</th>
                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr class="border-b border-gray-200">
                  <td class="px-5 py-5  bg-white text-sm">
                    <div class="flex items-center">
                      <div class="ml-3">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $product->name }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-5 py-5 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $product->description }}</p>
                 
                    </td>
                  <td class="px-5 py-5 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">${{ $product->price }}</p>
                  </td>
                  <td class="px-5 py-5  bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $product->stock }}</p>
                  </td>
                  <td class="px-5 py-5  bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $product->category->name }}</p>
                  </td>
                  <td class="px-5 py-5  bg-white text-sm flex items-center">
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded inline-flex items-center mr-2">
                      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65-.83-.83z"/></svg>
                      Modifier
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>
                        Suprimer
                      </button>
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
</body>
</html>
