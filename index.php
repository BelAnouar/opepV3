<?php
include_once "./partials/_header.php";

?>

<section class="h-full mx-h-[640px] mb-8 xl:mb-24">
    <div class="flex flex-col lg:flex-row">
        <div class="lg:ml-8 xl:ml-[135px] flex flex-col items-center lg:items-start text-center lg:text-left justify-center flex-1 px-4 lg:px-0">
            <h1 class="text-4xl lg:text-[68px] font-semibold leading-none mb-6 text-green-900">
                Exploring the Beauty of Plants
            </h1>
            <p class="max-w-[480px] text-gray-500">
                Plants, essential to life on Earth, offer a spectrum of wonder and diversity. From towering trees to delicate flowers, each plant tells a unique story of adaptation and beauty.
            </p>
        </div>
        <div class="hidden flex-1 lg:flex justify-end items-end">
            <img class="" src="./assets/images/title.jpg" alt="title">
        </div>
    </div>
</section>

<section class="m-20">
    <div class="container mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-14">
            <div class="bg-white shadow-lg p-3 rounded-lg  w-full max-w-xs mx-auto cursor-pointer hover:shadow-2xl ">
                <img class="mb-2" src="./assets/images/plant.jpg" alt="">
                <div class="text-lg font-semibold max-w-[260px]">
                    namespace
                </div>
                <div class="text-lg font-semibold text-green-600 mb-4">
                    3432$
                </div>
            </div>
            <div class="bg-white shadow-lg p-3 rounded-lg  w-full max-w-xs mx-auto cursor-pointer hover:shadow-2xl ">
                <img class="mb-2" src="./assets/images/plant.jpg" alt="">
                <div class="text-lg font-semibold max-w-[260px]">
                    namespace
                </div>
                <div class="text-lg font-semibold text-green-600 mb-4">
                    3432$
                </div>
            </div>
            <div class="bg-white shadow-lg p-3 rounded-lg  w-full max-w-xs mx-auto cursor-pointer hover:shadow-2xl ">
                <img class="mb-2" src="./assets/images/plant.jpg" alt="">
                <div class="text-lg font-semibold max-w-[260px]">
                    namespace
                </div>
                <div class="text-lg font-semibold text-green-600 mb-4">
                    3432$
                </div>
            </div>
        </div>
    </div>
</section>


<?php

include_once "./partials/_footer.php";
?>