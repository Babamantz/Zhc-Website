File: resources/views/components/page-spinner.blade.php

<div id="page-loader">
    <div>
        <div class="spinner"></div>
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

    /* Spinner Animation */
    .spinner {
        width: 60px;
        height: 60px;
        border: 6px solid rgba(255, 255, 255, 0.2);
        border-top-color: #ff9933;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Loading Text */
    .loading-text {
        position: absolute;
        margin-top: 100px;
        color: #ff9933;
        font-family: Arial, sans-serif;
        font-size: 16px;
        font-weight: 500;
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
