<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
    <script src="https://cdn.jsdelivr.net/npm/flowbite/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 text-center">
        <div class="flex justify-center mb-4">
            <svg class="w-16 h-16 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 3c4.418 0 8 3.582 8 8s-3.582 8-8 8-8-3.582-8-8 3.582-8 8-8z" />
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Access Denied</h1>
        <p class="text-gray-600 mb-4">Anda tidak dapat mengakses halaman admin.</p>
        <p class="text-gray-600 mb-6">Anda harus login sebagai <span class="font-semibold text-red-500">admin</span>.</p>
        <a href="/login" class="inline-block px-6 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-lg font-medium">Login sebagai Admin</a>
    </div>
</body>
</html>
