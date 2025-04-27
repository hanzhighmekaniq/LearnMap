@include('partials.head')
@include('partials.font')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-4 max-w-md w-full text-center">
        <div class="max-w-lg mx-auto p-6 bg-white rounded-lg">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Email Verification</h2>

            @if (session('status'))
                <div class="alert alert-success bg-green-100 text-green-800 border border-green-200 p-4 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <p class="text-gray-700 mb-4">We have sent a verification email to your email address. Please check your
                inbox and verify your email.</p>

            <form action="{{ route('verify.resend') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Enter your email to resend the verification
                        link</label>
                    <input type="email" name="email" id="email"
                        class="form-input mt-2 block w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Resend Verification Email
                </button>
            </form>
            <div class="">
                <a href="{{ route('login') }}" class="font-semibold text-blue-700 underline">Login</a>
            </div>
        </div>
    </div>

</div>

</div>
