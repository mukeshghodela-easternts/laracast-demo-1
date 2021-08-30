<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }

</style>

<body style="font-family: Open Sans, sans-serif;background-color: #000000c4;">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a class="text-green-100 text-1xl font-bold uppercase" href="/">
                    Blogs
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <span class="text-green-100 text-1xl font-bold uppercase">Welcome, {{ auth()->user()->name }}</span>

                    <form action="/logout" method="post" class=" uppercase text-xs font-semibold text-blue-500 ml-4">
                        @csrf
                        <button type="submit" class="uppercase">Logout</button>
                    </form>
                @else
                    <a href="/register" class="text-green-100 text-1xl font-bold uppercase">Register</a>
                    <a href="/login" class=" ml-4 text-green-100 text-1xl font-bold uppercase">Login</a>
                @endauth

                <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>

        </footer>
    </section>
    <x-flash />
</body>
