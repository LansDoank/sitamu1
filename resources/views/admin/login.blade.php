<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full h-screen bg-gray-200 flex justify-center">
        <section id="receptionist-login"
            class="md:w-[450px] w-[280px] group flex flex-shrink-0 overflow-hidden  justify-start dark:bg-gray-900 transition-transform duration-500">
            <div id="receptionist-form"
                class="flex flex-col w-[450px]  transition   items-center justify-center  md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-12 mr-2" src="/img/logo.png" alt="logo">
                    <h5 class="text-klipaa font-semibold">Sitamu</h5>
                </a>
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Login Form
                        </h1>
                        <div class="text-red-500 text-md">{{ session('login') }}</div>
                        <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                            @csrf
                            <div>
                                <label for="username"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" name="username" id="username"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="user123" required autocomplete="username">
                            </div>
                            <div class="relative flex items-center">
                                <div class="w-full">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required autocomplete="off">
                                </div>
                                <svg onclick="seePassword()" id="eye"
                                    class="cursor-pointer absolute right-4 top-11" xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-eye-fill"
                                    viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                </svg>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-klipaa focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:brightness-90">Sign
                                in</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        const eye = document.querySelector('#eye');
        const password = document.querySelector('#password');

        const seePassword = () => {
            if (password.type == 'password') {
                password.setAttribute('type', 'text')
                eye.innerHTML = `
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
`
            } else {
                password.setAttribute('type', 'password')
                eye.innerHTML =
                    `<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />`
            }
        }
    </script>
</x-layout>
