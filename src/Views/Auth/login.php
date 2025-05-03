<?php
ob_start();
?>

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Connexion</h1>
            <p class="text-gray-600 mt-2">Bienvenue sur notre plateforme</p>
        </div>
        
        <?php if(isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form action="/login" method="post" class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" required 
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" id="password" name="password" required 
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Se souvenir de moi</label>
                </div>
                
                <a href="/forgot-password" class="text-sm text-blue-600 hover:text-blue-800">Mot de passe oublié ?</a>
            </div>
            
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition duration-150 ease-in-out">
                Se connecter
            </button>
        </form>
        
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Vous n'avez pas de compte ? 
                <a href="/register" class="font-medium text-blue-600 hover:text-blue-800">Inscrivez-vous</a>
            </p>
        </div>
    </div>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
