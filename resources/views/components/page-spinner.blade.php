{{-- File: resources/views/components/page-spinner.blade.php --}}

<div id="page-loader">
    <div class="spinner-container">
        <!-- Animated circles background -->
        <div class="circles-bg">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>

        <!-- Main spinner with ZHC logo -->
        <div class="spinner-wrapper">
            <svg class="spinning-ring" width="200" height="200" viewBox="0 0 200 200">
                <!-- Outer decorative ring -->
                <circle cx="100" cy="100" r="90" fill="none" stroke="url(#gradient1)" stroke-width="3"
                    opacity="0.3" />
                <circle cx="100" cy="100" r="85" fill="none" stroke="#E8864A" stroke-width="2"
                    stroke-dasharray="5,5" opacity="0.5" />

                <!-- Main spinning ring -->
                <circle cx="100" cy="100" r="80" fill="none" stroke="url(#gradient2)" stroke-width="6"
                    stroke-linecap="round" stroke-dasharray="400" stroke-dashoffset="100" />

                <!-- Gradients -->
                <defs>
                    <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#E8864A;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#2B4C8C;stop-opacity:1" />
                    </linearGradient>
                    <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#E8864A;stop-opacity:1" />
                        <stop offset="50%" style="stop-color:#FFB366;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#E8864A;stop-opacity:1" />
                    </linearGradient>
                </defs>
            </svg>

            <!-- ZHC Logo in center -->
            <div class="zhc-logo">
                <svg width="140" height="140" viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
                    <!-- Decorative building silhouette -->
                    <g class="building-deco" opacity="0.15">
                        <rect x="35" y="40" width="12" height="30" fill="#E8864A" />
                        <rect x="50" y="35" width="15" height="35" fill="#E8864A" />
                        <rect x="68" y="32" width="18" height="38" fill="#E8864A" />
                        <rect x="88" y="38" width="14" height="32" fill="#E8864A" />
                        <polygon points="40,75 55,60 70,75" fill="#E8864A" />
                        <polygon points="75,75 90,62 105,75" fill="#E8864A" />
                    </g>

                    <!-- Z Letter -->
                    <g class="letter-z">
                        <path d="M 30,45 L 55,45 L 30,70 L 55,70" fill="none" stroke="#E8864A" stroke-width="8"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M 32,47 L 53,47 L 32,68 L 53,68" fill="none" stroke="#2B4C8C" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <!-- Door decoration -->
                        <circle cx="33" cy="57" r="2" fill="#E8864A" />
                    </g>

                    <!-- H Letter (with building structure) -->
                    <g class="letter-h">
                        <path d="M 63,45 L 63,70 M 63,57.5 L 80,57.5 M 80,45 L 80,70" fill="none" stroke="#E8864A"
                            stroke-width="8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M 65,47 L 65,68 M 65,57.5 L 78,57.5 M 78,47 L 78,68" fill="none" stroke="#2B4C8C"
                            stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        <!-- Windows decoration -->
                        <rect x="66" y="50" width="3" height="4" fill="#E8864A" rx="0.5" />
                        <rect x="74" y="50" width="3" height="4" fill="#E8864A" rx="0.5" />
                        <rect x="66" y="62" width="3" height="4" fill="#E8864A" rx="0.5" />
                        <rect x="74" y="62" width="3" height="4" fill="#E8864A" rx="0.5" />
                    </g>

                    <!-- C Letter (with arch design) -->
                    <g class="letter-c">
                        <path d="M 110,45 Q 88,45 88,57.5 Q 88,70 110,70" fill="none" stroke="#E8864A"
                            stroke-width="8" stroke-linecap="round" />
                        <path d="M 108,47 Q 92,47 92,57.5 Q 92,68 108,68" fill="none" stroke="#2B4C8C"
                            stroke-width="4" stroke-linecap="round" />
                        <!-- Arch decoration -->
                        <circle cx="108" cy="50" r="2" fill="#E8864A" />
                        <circle cx="108" cy="65" r="2" fill="#E8864A" />
                    </g>

                    <!-- Decorative elements -->
                    <g class="decorations">
                        <!-- Top stars/sparkles -->
                        <circle cx="45" cy="35" r="1.5" fill="#E8864A" opacity="0.7" />
                        <circle cx="70" cy="32" r="1.5" fill="#E8864A" opacity="0.7" />
                        <circle cx="95" cy="35" r="1.5" fill="#E8864A" opacity="0.7" />

                        <!-- Bottom foundation line -->
                        <line x1="28" y1="73" x2="112" y2="73" stroke="#E8864A"
                            stroke-width="2" stroke-linecap="round" />
                        <line x1="28" y1="76" x2="112" y2="76" stroke="#2B4C8C"
                            stroke-width="1" opacity="0.5" />
                    </g>

                    <!-- Subtitle -->
                    <text x="70" y="92" font-family="Arial, sans-serif" font-size="8" font-weight="600"
                        fill="#E8864A" text-anchor="middle" letter-spacing="1.5">HOUSING</text>
                </svg>
            </div>
        </div>

        <div class="loading-text">
            <span class="loading-label">Loading</span>
            <span class="dots">
                <span class="dot">.</span>
                <span class="dot">.</span>
                <span class="dot">.</span>
            </span>
        </div>
        <div class="loading-subtitle">Zanzibar Housing Corporation</div>
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
        background: linear-gradient(135deg, #1a2847 0%, #2e3a6e 50%, #1a2847 100%);
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
        position: relative;
        text-align: center;
    }

    /* Animated background circles */
    .circles-bg {
        position: absolute;
        width: 300px;
        height: 300px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .circle {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
    }

    .circle-1 {
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, #E8864A 0%, transparent 70%);
        animation: pulse 3s ease-in-out infinite;
    }

    .circle-2 {
        width: 240px;
        height: 240px;
        top: 30px;
        left: 30px;
        background: radial-gradient(circle, #FFB366 0%, transparent 70%);
        animation: pulse 3s ease-in-out infinite 1s;
    }

    .circle-3 {
        width: 180px;
        height: 180px;
        top: 60px;
        left: 60px;
        background: radial-gradient(circle, #E8864A 0%, transparent 70%);
        animation: pulse 3s ease-in-out infinite 2s;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.2;
        }
    }

    /* Spinner wrapper */
    .spinner-wrapper {
        position: relative;
        width: 200px;
        height: 200px;
        margin: 0 auto;
    }

    /* Spinning ring animation */
    .spinning-ring {
        animation: spin 3s linear infinite;
        filter: drop-shadow(0 0 20px rgba(232, 134, 74, 0.4));
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* ZHC Logo in center */
    .zhc-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translate(-50%, -50%) translateY(0px);
        }

        50% {
            transform: translate(-50%, -50%) translateY(-5px);
        }
    }

    .letter-z,
    .letter-h,
    .letter-c {
        animation: glow 2s ease-in-out infinite;
    }

    .letter-h {
        animation-delay: 0.3s;
    }

    .letter-c {
        animation-delay: 0.6s;
    }

    @keyframes glow {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
            filter: drop-shadow(0 0 5px #E8864A);
        }
    }

    /* Loading text */
    .loading-text {
        margin-top: 30px;
        color: #E8864A;
        font-family: 'Arial', sans-serif;
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 2px;
    }

    .loading-label {
        display: inline-block;
    }

    .dots {
        display: inline-block;
        width: 30px;
        text-align: left;
    }

    .dot {
        animation: blink 1.4s infinite;
        opacity: 0;
    }

    .dot:nth-child(1) {
        animation-delay: 0s;
    }

    .dot:nth-child(2) {
        animation-delay: 0.2s;
    }

    .dot:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes blink {

        0%,
        20% {
            opacity: 0;
        }

        40% {
            opacity: 1;
        }

        60%,
        100% {
            opacity: 0;
        }
    }

    .loading-subtitle {
        margin-top: 10px;
        color: rgba(232, 134, 74, 0.7);
        font-family: 'Arial', sans-serif;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: 3px;
        text-transform: uppercase;
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
