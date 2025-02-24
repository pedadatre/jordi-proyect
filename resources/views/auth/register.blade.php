<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Carrusel (igual que en el login) -->
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

        <!-- Formulario de Registro -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-8">
                <div class="mb-8 text-center">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 mx-auto" />
                    </a>
                    <h2 class="mt-6 text-3xl font-bold text-gray-900">Crea tu cuenta</h2>
                    <p class="mt-2 text-sm text-gray-600">Regístrate para empezar</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Surname -->
                    <div>
                        <x-input-label for="surname" :value="__('Surname')" />
                        <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required />
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Birthday -->
                    <div>
                        <x-input-label for="Bday" :value="__('Birthday')" />
                        <x-text-input id="Bday" class="block mt-1 w-full" type="date" name="Bday" :value="old('Bday')" required />
                        <x-input-error :messages="$errors->get('Bday')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a class="text-sm text-indigo-600 hover:text-indigo-500" href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
                        </a>
                        <x-primary-button>
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const carouselItems = [
            "{{ asset('img/img1.jpg') }}",
            "{{ asset('img/img2.jpg') }}",
            "{{ asset('img/img3.jpg') }}",
            "{{ asset('img/img4.jpg') }}",
            "{{ asset('img/img5.jpg') }}"
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

        setInterval(changeSlide, 5000);
    </script>
</x-guest-layout>