@if (session('success'))
        <div id="notification"
            class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-50 text-green-800 border border-green-300 rounded-lg p-4 z-[99]">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div id="notification"
            class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-red-50 text-red-800 border border-red-300 rounded-lg p-4 z-[99]">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.add('hidden');
                }, 5000); // 5000 milliseconds = 5 seconds
            }
        });
    </script>
