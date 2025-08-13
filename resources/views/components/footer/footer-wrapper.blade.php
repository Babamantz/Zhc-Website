<!-- resources/views/components/footer/main.blade.php -->
<footer class="relative pt-5 pb-0 bg-cover bg-no-repeat" style="background-image: url('https://www.tira.go.tz/site/images/bg/bg7.jpg')">
    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-black/50 to-black/70"></div>

    <div class="relative container mx-auto px-4 lg:px-10">
        <div class="flex flex-wrap pb-6">
            <x-footer.contact />
            <x-footer.media-links />
        </div>

        <x-footer.social />
    </div>

    <x-footer.bottom-bar />
</footer>
