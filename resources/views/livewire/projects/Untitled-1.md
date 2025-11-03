     <template x-teleport="body">
                                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90"
                                    class="fixed inset-0 bg-black/70 flex items-center justify-center z-50"
                                    style="display: none;">

                                    <!-- Expanded Card -->
                                    <div @click.away="open = false" x-data="{ showContent: false }"
                                        class="relative bg-cover bg-center rounded-xl shadow-2xl w-11/12 max-w-3xl h-[80vh] p-8 text-white"
                                        style="background-image: url('{{ $news['images'][0]['original']  }}');">
                                        

                                        <!-- Dark overlay -->
                                        <div class="absolute inset-0 bg-[#0A2C73]/60 rounded-xl"></div>

                                        <!-- Close Button -->
                                        <button @click="open = false"
                                            class="absolute top-3 right-3 text-white hover:text-gray-300 text-2xl z-20">&times;
                                        </button>

                                        
                                    </div>
                                </div>
                            </template>

                             