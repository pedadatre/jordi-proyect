<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Carrusel -->
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
            <div id="carousel" class="w-full h-full">
                <img
                    id="carousel-image"
                    src="{{ asset('img/img1.jpg') }}"
                    alt="Carousel image"
                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
                />
            </div>
        </div>

        <!-- Formulario de Login -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8">
                <div class="mb-8 text-center">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 mx-auto" />
                    </a>
                    <h2 class="mt-6 text-3xl font-bold text-gray-900">Bienvenido de nuevo</h2>
                    <p class="mt-2 text-sm text-gray-600">Inicia sesión en tu cuenta</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <!-- Botón de Login -->
                    <div>
                        <x-primary-button class="w-full justify-center">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para el Carrusel -->
    <script>
        const carouselItems = [
            "{{ asset('img/img1.jpg') }}",
            "{{ asset('img/img2.jpge') }}",
            "{{ asset('img/img3.jpg') }}",
            "{{ asset('img/img4.jpg') }}",
            "{{ asset('img/img5.jpg') }}"
            // Agrega más imágenes según sea necesario
        ];

        let currentSlide = 0;
        const carouselImage = document.getElementById('carousel-image');

        function changeSlide() {
            currentSlide = (currentSlide + 1) % carouselItems.length;
            const nextImage = new Image();
            nextImage.onload = () => {
                carouselImage.style.opacity = '0';
                setTimeout(() => {
                    carouselImage.src = nextImage.src;
                    carouselImage.style.opacity = '1';
                }, 500);
            };
            nextImage.src = carouselItems[currentSlide];
        }

        // Cambia la imagen cada 5 segundos
        setInterval(changeSlide, 5000);
    </script>
</x-guest-layout>