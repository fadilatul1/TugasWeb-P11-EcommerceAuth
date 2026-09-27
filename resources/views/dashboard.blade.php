@vite(['resources/css/dashboard.css'])

<x-app-layout>

    <x-slot name="header">
        <div class="dashboard-heading">
            <div>
                <p class="dashboard-heading-label">
                    ✨ E-Commerce Dashboard
                </p>

                <h2 class="dashboard-heading-title">
                    Dashboard
                </h2>
            </div>
        </div>
    </x-slot>


    <div class="dashboard-page">

        <div class="dashboard-container">

            <!-- Welcome -->
            <section class="welcome-card">

                <div class="welcome-content">

                    <div>
                        <p class="welcome-label">
                            Selamat datang kembali 👋
                        </p>

                        <h1 class="welcome-title">
                            Halo, {{ Auth::user()->name }}!
                        </h1>

                        <p class="welcome-description">
                            Kelola sistem e-commerce kamu dengan mudah
                            melalui dashboard ini.
                        </p>
                    </div>

                    <div class="role-card">
                        <p class="role-label">
                            Role
                        </p>

                        <p class="role-name">
                            {{ ucfirst(Auth::user()->role) }}
                        </p>
                    </div>

                </div>

            </section>


            <!-- Menu -->
            <section class="dashboard-grid">

                <!-- Products -->
                <a
                    href="{{ route('products.index') }}"
                    class="dashboard-card"
                >
                    <div class="card-top">

                        <div class="card-icon">
                            🛍️
                        </div>

                        <span class="card-arrow">
                            →
                        </span>

                    </div>

                    <h3 class="card-title">
                        Kelola Produk
                    </h3>

                    <p class="card-description">
                        Lihat, edit, dan kelola data produk
                        e-commerce.
                    </p>
                </a>


                <!-- Profile -->
                <a
                    href="{{ route('profile.edit') }}"
                    class="dashboard-card"
                >
                    <div class="card-top">

                        <div class="card-icon pink">
                            👤
                        </div>

                        <span class="card-arrow">
                            →
                        </span>

                    </div>

                    <h3 class="card-title">
                        Profil Saya
                    </h3>

                    <p class="card-description">
                        Kelola informasi akun dan pengaturan
                        profil.
                    </p>
                </a>


                <!-- Role -->
                <div class="dashboard-card">

                    <div class="card-top">

                        <div class="card-icon green">
                            🔐
                        </div>

                    </div>

                    <h3 class="card-title">
                        Hak Akses
                    </h3>

                    <p class="card-description">
                        Akun kamu memiliki role
                        <strong>{{ ucfirst(Auth::user()->role) }}</strong>.
                    </p>

                </div>

            </section>


            <!-- Status -->
            <section class="status-card">

                <div class="status-icon">
                    ✅
                </div>

                <div>
                    <h3 class="status-title">
                        Sistem Berjalan dengan Baik
                    </h3>

                    <p class="status-description">
                        Kamu berhasil login dan memiliki akses
                        ke dashboard.
                    </p>
                </div>

            </section>

        </div>

    </div>

</x-app-layout>