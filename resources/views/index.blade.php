<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cari Film...</title>
        <!-- Tailwind play CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <main class="py-10">
            <div x-data="{ movies:[], keywords:'' }" x-effect="movies = await search(keywords)"
                class="max-w-2xl mx-auto px-4">
                <h1 class="text-center text-4xl font-bold text-gray-600">Cari Fakta</h1>
                <!-- Search form -->
                <div class="my-10">
                    <input x-model="keywords" type="search"
                        class="px-4 py-2 block w-full border-2 border-gray-600 rounded-lg text-gray-600"
                        placeholder="Ketik kata kunci di sini...">
                </div>
                <div>
                    <div x-show="movies.length == 0" class="bg-gray-50 text-gray-500 text-center p-3 rounded-lg border">
                        Belum ada hasil...
                    </div>
                    <div x-show="movies.length > 0" class="grid grid-cols-1 gap-4">
                        <template x-for="movie in movies">
                            <div class="border rounded-lg shadow p-3 flex gap-4">
                                <img x-show="movie.backdrop_path != null" class="rounded-lg" :src="'https://image.tmdb.org/t/p/w300' + movie.backdrop_path" :alt="movie.title">
                                <div>
                                    <p x-text="movie.title" class="text-lg font-bold mb-2"></p>
                                    <small x-text="movie.overview"></small>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <!-- End search form -->
            </div>
        </main>
        <!-- Alpine.js CDN -->
        <script defer src="https://unpkg.com/alpinejs@3.11.1/dist/cdn.min.js"></script>

        <!-- Search script -->
        <script>
            async function search(query) {
                // jika tidak ada query langsung return array kosong
                if (!query) {
                    return []
                }

                // menyusun query params
                // contoh hasil: query=xxx&api_key=xxx&language=xxx&page=xxx
                let params = new URLSearchParams({
                    query: query,
                    api_key: 'your tmdb api key',
                    language: 'en-US',
                    page: 1,
                })

                // network request ke api server tmdb
                let response = await fetch(`https://api.themoviedb.org/3/search/movie?${params.toString()}`)
                let json = await response.json()

                // return hasil pencarian
                return json.results
            }
        </script>
    </body>

</html>