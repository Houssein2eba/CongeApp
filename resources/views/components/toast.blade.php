
    @if ($message)
        <div
            class="toast-container position-fixed top-0 end-0 p-3"
            style="z-index: 1100;"
        >
            <div
                class="toast align-items-center text-white bg-{{ $type }} border-0"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
                id="liveToast"
            >
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $message }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(function () {
                    const toastEl = document.getElementById('liveToast');
                    const toast = new bootstrap.Toast(toastEl, {
                        delay: 4000 // toast will auto-hide after 4s
                    });
                    toast.show();
                }, 300); // delay of 300ms before showing the toast
            });
        </script>
    @endif

