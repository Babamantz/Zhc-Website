{{-- File: resources/views/components/page-spinner.blade.php --}}

<div id="page-loader">
    <div class="spinner-container">
        <svg class="spinning-logo" width="120" height="120" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <!-- Buildings in background -->
            <g class="buildings">
                <!-- Left building -->
                <rect x="90" y="40" width="25" height="60" fill="#2B4C8C" stroke="#E8864A" stroke-width="2" />
                <rect x="92" y="45" width="3" height="50" fill="#E8864A" />
                <rect x="97" y="45" width="3" height="50" fill="#E8864A" />
                <rect x="102" y="45" width="3" height="50" fill="#E8864A" />
                <rect x="107" y="45" width="3" height="50" fill="#E8864A" />
                <rect x="112" y="45" width="3" height="50" fill="#E8864A" />

                <!-- Right building -->
                <rect x="125" y="35" width="28" height="65" fill="#2B4C8C" stroke="#E8864A" stroke-width="2" />
                <rect x="127" y="40" width="3" height="55" fill="#E8864A" />
                <rect x="133" y="40" width="3" height="55" fill="#E8864A" />
                <rect x="139" y="40" width="3" height="55" fill="#E8864A" />
                <rect x="145" y="40" width="3" height="55" fill="#E8864A" />
                <rect x="150" y="40" width="3" height="55" fill="#E8864A" />

                <!-- Small building left -->
                <rect x="70" y="60" width="18" height="40" fill="#2B4C8C" stroke="#E8864A" stroke-width="1.5" />
                <rect x="72" y="65" width="2" height="30" fill="#E8864A" />
                <rect x="76" y="65" width="2" height="30" fill="#E8864A" />
                <rect x="80" y="65" width="2" height="30" fill="#E8864A" />
                <rect x="84" y="65" width="2" height="30" fill="#E8864A" />
            </g>

            <!-- Houses with roofs -->
            <g class="houses">
                <!-- Left house -->
                <polygon points="80,100 100,80 120,100" fill="#2B4C8C" stroke="#E8864A" stroke-width="2" />
                <rect x="85" y="100" width="30" height="25" fill="#F5F5F5" stroke="#2B4C8C" stroke-width="2" />
                <rect x="92" y="105" width="4" height="5" fill="#2B4C8C" />
                <rect x="92" y="112" width="4" height="5" fill="#2B4C8C" />
                <rect x="104" y="105" width="4" height="5" fill="#2B4C8C" />
                <rect x="104" y="112" width="4" height="5" fill="#2B4C8C" />
                <rect x="98" y="108" width="6" height="17" fill="#E8864A" />

                <!-- Right house -->
                <polygon points="130,105 150,85 170,105" fill="#2B4C8C" stroke="#E8864A" stroke-width="2" />
                <rect x="135" y="105" width="30" height="25" fill="#F5F5F5" stroke="#2B4C8C" stroke-width="2" />
                <rect x="142" y="110" width="4" height="5" fill="#2B4C8C" />
                <rect x="142" y="117" width="4" height="5" fill="#2B4C8C" />
                <rect x="154" y="110" width="4" height="5" fill="#2B4C8C" />
                <rect x="154" y="117" width="4" height="5" fill="#2B4C8C" />
                <rect x="148" y="113" width="6" height="17" fill="#E8864A" />
            </g>

            <!-- ZC Letters integrated with door and arch -->
            <g class="zc-letters">
                <!-- Z letter (door shape) -->
                <path d="M 60,130 L 90,130 L 60,165 L 90,165 Z" fill="#E8864A" stroke="#2B4C8C" stroke-width="3" />
                <circle cx="65" cy="147" r="2" fill="#2B4C8C" />

                <!-- C letter (arch shape) -->
                <path d="M 170,145 Q 150,125 130,145 Q 150,165 170,145" fill="none" stroke="#E8864A"
                    stroke-width="12" stroke-linecap="round" />
                <path d="M 165,145 Q 150,130 135,145 Q 150,160 165,145" fill="none" stroke="#2B4C8C"
                    stroke-width="6" stroke-linecap="round" />
            </g>
        </svg>
        <div class="loading-text">Loading...</div>
    </div>
</div>

<style>
    /* Page Loader Overlay */
    #page-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #2e3a6e;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.5s ease, visibility 0.5s ease;
    }

    #page-loader.hidden {
        opacity: 0;
        visibility: hidden;
    }

    .spinner-container {
        text-align: center;
    }

    /* Spinning Logo Animation */
    .spinning-logo {
        animation: spin 2s linear infinite;
        filter: drop-shadow(0 0 10px rgba(255, 153, 51, 0.3));
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Loading Text */
    .loading-text {
        margin-top: 20px;
        color: #ff9933;
        font-family: Arial, sans-serif;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 1px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loader = document.getElementById('page-loader');

        // Hide loader when page is fully loaded
        window.addEventListener('load', function() {
            loader.classList.add('hidden');
        });

        // Show loader when clicking on links (except anchors and external links opening in new tab)
        document.addEventListener('click', function(e) {
            const target = e.target.closest('a');

            if (target && target.href) {
                const url = new URL(target.href);
                const currentUrl = new URL(window.location.href);

                // Show loader for internal links (not anchor links)
                if (url.origin === currentUrl.origin && !url.hash) {
                    loader.classList.remove('hidden');
                }

                // For external links not opening in new tab
                if (url.origin !== currentUrl.origin && target.target !== '_blank') {
                    loader.classList.remove('hidden');
                }
            }
        });

        // Show loader on form submissions
        document.addEventListener('submit', function(e) {
            loader.classList.remove('hidden');
        });

        // Handle browser back/forward buttons
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                loader.classList.add('hidden');
            }
        });

        // Fallback: Hide loader after 10 seconds to prevent infinite loading
        setTimeout(function() {
            loader.classList.add('hidden');
        }, 10000);
    });
</script>
