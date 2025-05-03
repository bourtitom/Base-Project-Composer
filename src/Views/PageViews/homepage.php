<?php
ob_start();
?>

<!-- Hero Section -->
<div class="relative overflow-hidden bg-white">
    <div class="mx-auto max-w-7xl">
        <div class="relative z-10 bg-white pb-8 sm:pb-16 md:pb-20 lg:w-full lg:max-w-2xl lg:pb-28 xl:pb-32">
            <svg class="absolute inset-y-0 right-0 hidden h-full w-48 translate-x-1/2 transform text-white lg:block" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>

            <div class="relative px-4 pt-6 sm:px-6 lg:px-8">
                <!-- Navigation could go here if needed -->
            </div>

            <main class="mx-auto mt-10 max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block">Projet Base</span>
                        <span class="block text-blue-600">Pour développer plus rapidement</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mx-auto sm:mt-5 sm:max-w-xl sm:text-lg md:mt-5 md:text-xl lg:mx-0">
                        Une architecture MVC complète avec authentification, ORM et Tailwind CSS intégrés. 
                        Commencez à développer votre application web sans perdre de temps sur la configuration.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="/register" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base font-medium text-white hover:bg-blue-700 md:py-4 md:px-10 md:text-lg">
                                Commencer
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="/docs" class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-100 px-8 py-3 text-base font-medium text-blue-700 hover:bg-blue-200 md:py-4 md:px-10 md:text-lg">
                                Documentation
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<!-- Features Section Preview (juste les premiers éléments pour montrer la continuité) -->
<div class="bg-gray-50 py-12 sm:py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold uppercase tracking-wide text-blue-600">Fonctionnalités</h2>
            <p class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Tout ce dont vous avez besoin
            </p>
            <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">
                Une solution complète pour construire votre application sans réinventer la roue.
            </p>
        </div>
        
        <!-- Feature cards would continue here -->
    </div>
</div>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
