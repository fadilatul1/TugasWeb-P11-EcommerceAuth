<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold text-violet-600">
                🛍️ Product Management
            </p>

            <h2 class="mt-1 text-2xl font-extrabold text-gray-800">
                Edit Produk
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-violet-50 via-white to-fuchsia-50 py-10">

        <div class="mx-auto max-w-4xl px-6">

            <!-- Back -->
            <a
                href="{{ route('products.index') }}"
                class="mb-6 inline-flex items-center gap-2 text-sm font-semibold text-violet-600 transition hover:text-violet-800"
            >
                ← Kembali ke Produk
            </a>

            <!-- Form Card -->
            <div class="overflow-hidden rounded-3xl bg-white shadow-xl">

                <!-- Header -->
                <div class="bg-gradient-to-r from-violet-600 via-purple-600 to-fuchsia-600 px-8 py-7 text-white">

                    <p class="text-sm text-violet-100">
                        Perbarui informasi produk
                    </p>

                    <h1 class="mt-1 text-2xl font-extrabold">
                        {{ $product->name }}
                    </h1>

                </div>


                <!-- Form -->
                <form
                    method="POST"
                    action="{{ route('products.update', $product) }}"
                    class="space-y-6 p-8"
                >

                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <div>
                        <label
                            for="name"
                            class="mb-2 block text-sm font-bold text-gray-700"
                        >
                            Nama Produk
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $product->name) }}"
                            class="w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-violet-500 focus:ring-violet-500"
                            required
                        >

                        @error('name')
                            <p class="mt-2 text-sm font-semibold text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <!-- Price & Stock -->
                    <div class="grid gap-6 md:grid-cols-2">

                        <div>
                            <label
                                for="price"
                                class="mb-2 block text-sm font-bold text-gray-700"
                            >
                                Harga
                            </label>

                            <input
                                id="price"
                                type="number"
                                name="price"
                                value="{{ old('price', $product->price) }}"
                                min="0"
                                class="w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-violet-500 focus:ring-violet-500"
                                required
                            >

                            @error('price')
                                <p class="mt-2 text-sm font-semibold text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div>
                            <label
                                for="stock"
                                class="mb-2 block text-sm font-bold text-gray-700"
                            >
                                Stok
                            </label>

                            <input
                                id="stock"
                                type="number"
                                name="stock"
                                value="{{ old('stock', $product->stock) }}"
                                min="0"
                                class="w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-violet-500 focus:ring-violet-500"
                                required
                            >

                            @error('stock')
                                <p class="mt-2 text-sm font-semibold text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>


                    <!-- Description -->
                    <div>
                        <label
                            for="description"
                            class="mb-2 block text-sm font-bold text-gray-700"
                        >
                            Deskripsi
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            class="w-full rounded-xl border-gray-200 px-4 py-3 text-sm shadow-sm outline-none transition focus:border-violet-500 focus:ring-violet-500"
                        >{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm font-semibold text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <!-- Active & Featured -->
                    <div class="grid gap-4 md:grid-cols-2">

                        <label class="flex cursor-pointer items-center gap-3 rounded-2xl bg-violet-50 p-4">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                class="rounded border-gray-300 text-violet-600 focus:ring-violet-500"
                                {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                            >

                            <div>
                                <p class="font-bold text-gray-800">
                                    Produk Aktif
                                </p>

                                <p class="text-xs text-gray-500">
                                    Produk dapat ditampilkan.
                                </p>
                            </div>

                        </label>


                        <label class="flex cursor-pointer items-center gap-3 rounded-2xl bg-yellow-50 p-4">

                            <input
                                type="checkbox"
                                name="is_featured"
                                value="1"
                                class="rounded border-gray-300 text-yellow-500 focus:ring-yellow-500"
                                {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                            >

                            <div>
                                <p class="font-bold text-gray-800">
                                    Produk Featured ⭐
                                </p>

                                <p class="text-xs text-gray-500">
                                    Tandai sebagai produk unggulan.
                                </p>
                            </div>

                        </label>

                    </div>


                    <!-- Actions -->
                    <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:justify-end">

                        <a
                            href="{{ route('products.index') }}"
                            class="rounded-xl bg-gray-100 px-6 py-3 text-center text-sm font-bold text-gray-600 transition hover:bg-gray-200"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="rounded-xl bg-gradient-to-r from-violet-600 to-fuchsia-600 px-6 py-3 text-sm font-bold text-white shadow-lg transition hover:from-violet-700 hover:to-fuchsia-700"
                        >
                            💾 Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>