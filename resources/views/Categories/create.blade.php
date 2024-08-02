<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une  categorie</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
      <div class="mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
        <div class="px-6 py-4">
          <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ajouter une  categorie</h2>
          <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                Nom
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" type="text" placeholder="Nom de la catégorie" required>
            </div>
            <div class="flex items-center justify-between">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Ajouter une  categorie
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
