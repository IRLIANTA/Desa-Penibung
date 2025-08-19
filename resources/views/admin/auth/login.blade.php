<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Desa Digital</title>
    <meta name="description" content="The simple way to manage your citizens" />
    <link href="{{ asset('assets/') }}/css/output.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logos/logo-icon.png" />
    <link rel="apple-touch-icon" href="assets/images/logos/logo-icon.png" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="The simple way to manage your citizens" />
    <meta property="og:description" content="The simple way to manage your citizens">
    <meta property="og:image" content="https://desa-digital.netlify.app/assets/images/logos/logo-icon.png" />
    <meta property="og:url" content="https://desa-digital.netlify.app" />
    <meta property="og:type" content="website" />
</head>

<body>
    <form method="POST" action="{{ route('login') }}" class="flex items-center">
        @csrf
        <div class="flex flex-col w-[486px] rounded-3xl p-8 bg-white gap-8">
            <header class="flex flex-col gap-8 items-center">
                <img src="{{ asset('assets/images/logos/logo-text.svg') }}" alt="icon" class="h-20">
                <h1 class="font-semibold text-2xl text-center">Halo🙌🏻 , Selamat Datang!</h1>
                <p class="text-gray-500 text-center">Silahkan masuk untuk melanjutkan</p>
            </header>

            <div>
                <label>Email Address</label>
                <input type="email" name="email" class="border rounded p-2 w-full" placeholder="Ketik Email Kamu"
                    required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" class="border rounded p-2 w-full"
                    placeholder="Ketik Password Kamu" required>
            </div>

            <button type="submit" class="bg-green-500 text-white rounded p-3">Masuk</button>
        </div>
    </form>

    <section class="relative w-full max-w-[634px] h-screen overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-green-400 to-transparent"></div>
        <img src="{{ asset('assets/images/backgrounds/bg-signin.png') }}" alt="banner"
            class="h-full w-full object-cover rounded-3xl">
    </section>
</body>

</html>
