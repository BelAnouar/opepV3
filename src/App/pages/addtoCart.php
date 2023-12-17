<?php




function sum($carry, $item)
{
    $carry += $item["price"];

    return $carry;
}

?>

<div class="relative z-10 hidden  panier ">

    <div class="closeCart fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity "></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class=" closeCart relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        <?php if (count($paniers) > 0) { ?>
                                            <?php foreach ($paniers as $panier) { ?>
                                                <?php $user_id = $panier['user_id']; ?>
                                                <li class="flex py-6">
                                                    <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img src="<?php echo $panier['image']; ?>" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                                                    </div>

                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                                <h3>
                                                                    <?php echo $panier['nomPlante']; ?>
                                                                </h3>
                                                                <p class="ml-4"> <?php echo $panier['price']; ?>$</p>
                                                            </div>

                                                        </div>

                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                            <p class="text-gray-500">Qty 1</p>

                                                            <div class="flex">
                                                                <form action="index.php" method="post">
                                                                    <input type="hidden" name="Remove" value="<?php echo   $panier['idPanier']; ?>">
                                                                    <button value="<?php echo   $panier['idPanier']; ?>" type="submit" class="font-medium text-indigo-600 hover:text-indigo-500 Remove-btn">Remove</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php     }  ?>

                                        <?php  } else { ?>

                                            <li class="flex py-6">
                                                Cart Is Empty
                                            </li>
                                        <?php   } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Subtotal</p>
                                <p>$ <?= array_reduce($paniers, "sum", 0);
                                        ?></p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">

                                <button id="checkout-btn" value="<?php echo $user_id; ?>"  class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>