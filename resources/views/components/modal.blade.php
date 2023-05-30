<!-- Add the x-data directive to initialize the modalData object -->
<div x-cloak x-data="modalData">

    <!-- Button trigger modal -->
    <button @click="showModal = true" style="width: 100%; ">
        {{ $buttonText }}
    </button>

    <!-- Modal -->
    <div x-show="showModal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center z-20 "
        style="display: none">

        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50 "></div>

        <div
            class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto relative">
            <i @click="showModal = false"
                class="fa-solid fa-circle-xmark text-sm cursor-pointer text-red-500 absolute top-2 right-4"></i>

            <div class="modal-content py-4 text-left px-6">
                <!-- Title -->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold"> {{ $title }}</p>
                    <div class="modal-close cursor-pointer z-50" @click="showModal = false">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path d="M1 1l16 16M17 1L1 17" />
                        </svg>
                    </div>
                </div>

                <!-- Content -->
                {{ $content }}
            </div>
        </div>
    </div>
</div>
