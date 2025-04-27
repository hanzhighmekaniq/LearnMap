@include('partials.head')
@include('partials.font')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Verifikasi Email</h2>

        <!-- Status Message -->
        @if (session('status'))
            <div class="bg-green-100 text-green-800 border border-green-200 p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <p class="text-gray-700 mb-6">Kami telah mengirimkan email verifikasi ke alamat email Anda. Harap periksa kotak
            masuk Anda dan verifikasi email Anda.</p>

        <!-- Form -->
        <form action="{{ route('verify.resend') }}" method="POST">
            @csrf

            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Masukkan email Anda untuk mengirim ulang tautan
                    verifikasi</label>
                <input type="email" name="email" id="email"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Kirim Ulang Email Verifikasi
            </button>
        </form>
        <div class="">
            <a href="{{ route('login') }}" class="font-semibold text-blue-700 underline">Login</a>
        </div>
    </div>

</div>
