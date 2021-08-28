<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <form action="POST" action="/register">
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray700" for="username">
                        <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" required>

                        @error('username')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
            </form>
        </main>
    </section>
</x-layout>
