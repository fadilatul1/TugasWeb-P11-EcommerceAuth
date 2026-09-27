<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products — E-Commerce</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-gradient-to-br from-violet-50 via-white to-fuchsia-50 font-poppins text-gray-800">

    <!-- Header -->
    <header class="border-b border-white/60 bg-white/80 shadow-sm backdrop-blur-md">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">

            <div>
                <p class="text-sm font-semibold text-violet-600">
                    ✨ E-Commerce Dashboard
                </p>

                <h1 class="mt-1 text-2xl font-extrabold text-gray-900">
                    Daftar Produk
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <span class="hidden rounded-full bg-violet-100 px-4 py-2 text-sm font-semibold text-violet-700 sm:block">
                    👤 {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-xl bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-violet-700"
                    >
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </header>


    <!-- Main -->
    <main class="mx-auto max-w-7xl px-6 py-10">

        <!-- Welcome -->
        <div class="mb-8 overflow-hidden rounded-3xl bg-gradient-to-r from-violet-600 via-purple-600 to-fuchsia-600 p-8 text-white shadow-xl">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">

                <div>
                    <p class="mb-2 text-sm font-medium text-violet-100">
                        Selamat datang kembali 👋
                    </p>

                    <h2 class="text-3xl font-extrabold">
                        Kelola Produk E-Commerce
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm text-violet-100">
                        Lihat, edit, dan kelola data produk dengan mudah.
                    </p>
                </div>

                <div class="rounded-2xl bg-white/15 px-6 py-4 backdrop-blur-sm">
                    <p class="text-sm text-violet-100">
                        Total Produk
                    </p>

                    <p class="text-3xl font-extrabold">
                        {{ $products->total() }}
                    </p>
                </div>

            </div>
        </div>


        <!-- Flash Message -->
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
                ✅ {{ session('success') }}
            </div>
        @endif


        <!-- Product Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @forelse($products as $product)

                <article class="group overflow-hidden rounded-3xl border border-white bg-white shadow-md transition duration-300 hover:-translate-y-1 hover:shadow-2xl">

                    <!-- Product Image -->
                    <div class="relative flex h-48 items-center justify-center overflow-hidden bg-gradient-to-br from-violet-100 via-purple-100 to-fuchsia-100">

                        @if($product->image)
                            <img
                                src="{{ $product->image }}"
                                alt="{{ $product->name }}"
                                class="h-full w-full object-cover"
                            >
                        @else
                            <div class="text-center">
                                <div class="text-6xl transition duration-300 group-hover:scale-110">
                                    🛍️
                                </div>

                                <p class="mt-2 text-xs font-semibold text-violet-500">
                                    E-Commerce Product
                                </p>
                            </div>
                        @endif

                        @if($product->is_featured)
                            <span class="absolute left-4 top-4 rounded-full bg-yellow-400 px-3 py-1 text-xs font-bold text-yellow-900 shadow">
                                ⭐ Featured
                            </span>
                        @endif

                        @if($product->stock > 0)
                            <span class="absolute right-4 top-4 rounded-full bg-green-500 px-3 py-1 text-xs font-bold text-white shadow">
                                Stok tersedia
                            </span>
                        @else
                            <span class="absolute right-4 top-4 rounded-full bg-red-500 px-3 py-1 text-xs font-bold text-white shadow">
                                Habis
                            </span>
                        @endif

                    </div>


                    <!-- Product Content -->
                    <div class="p-6">

                        <div class="mb-3">
                            <span class="rounded-full bg-violet-100 px-3 py-1 text-xs font-bold text-violet-700">
                                {{ $product->category->name }}
                            </span>
                        </div>

                        <h3 class="line-clamp-2 text-lg font-bold text-gray-900">
                            {{ $product->name }}
                        </h3>

                        <p class="mt-2 line-clamp-2 text-sm leading-6 text-gray-500">
                            {{ $product->description }}
                        </p>


                        <!-- Price & Stock -->
                        <div class="mt-5 flex items-end justify-between">

                            <div>
                                <p class="text-xs font-medium text-gray-400">
                                    Harga
                                </p>

                                <p class="text-xl font-extrabold text-violet-600">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="text-right">
                                <p class="text-xs font-medium text-gray-400">
                                    Stok
                                </p>

                                <p class="font-bold text-gray-700">
                                    {{ $product->stock }}
                                </p>
                            </div>

                        </div>


                        <!-- Actions -->
                        <div class="mt-6 flex gap-3">

                            <a
                                href="{{ route('products.edit', $product) }}"
                                class="flex-1 rounded-xl bg-violet-600 px-4 py-2.5 text-center text-sm font-bold text-white transition hover:bg-violet-700"
                            >
                                ✏️ Edit
                            </a>

                            @can('delete', $product)
                                <form
                                    method="POST"
                                    action="{{ route('products.destroy', $product) }}"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-full rounded-xl bg-red-50 px-4 py-2.5 text-sm font-bold text-red-600 transition hover:bg-red-600 hover:text-white"
                                    >
                                        🗑️ Hapus
                                    </button>
                                </form>
                            @endcan

                        </div>

                    </div>

                </article>

            @empty

                <div class="col-span-full rounded-3xl bg-white p-12 text-center shadow-md">
                    <div class="text-6xl">📦</div>

                    <h3 class="mt-4 text-xl font-bold text-gray-800">
                        Belum ada produk
                    </h3>

                    <p class="mt-2 text-sm text-gray-500">
                        Data produk belum tersedia.
                    </p>
                </div>

            @endforelse

        </div>


        <!-- Pagination -->
        @if($products->hasPages())
            <div class="mt-10 rounded-2xl bg-white p-4 shadow-sm">
                {{ $products->links() }}
            </div>
        @endif

    </main>

</body>
</html>