<x-layout>
    <div class="py-20">

        <div class="max-w-lg mx-auto  bg-white p-6 rounded-lg shadow-md border">
            <h2 class="text-xl font-semibold mb-4">Ubah Password</h2>

            @if (session('success'))
                <div class="bg-green-500 text-white p-3 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 mb-4 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700">Password Lama</label>
                    <input type="password" name="current_password" class="w-full p-2 border rounded-md">
                    @error('current_password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Password Baru</label>
                    <input type="password" name="new_password" class="w-full p-2 border rounded-md">
                    @error('new_password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" class="w-full p-2 border rounded-md">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                    Ubah Password
                </button>
            </form>



        </div>
    </div>

</x-layout>
