<?php
ob_start();
?>


<div class="max-w-4xl w-full mx-auto bg-white shadow-md rounded-lg overflow-hidden p-8 m-8">
    <h1 class="text-4xl font-bold text-blue-600 mb-6">Documentation du MVC Composer</h1>
    
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Introduction</h2>
        <p class="text-gray-700 leading-relaxed">
            Bienvenue dans la documentation Base-Project-Composer. Cette maniere de dev est léger et flexible 
            est conçu pour vous aider à construire des applications PHP modernes avec une architecture MVC 
            (Modèle-Vue-Contrôleur).
        </p>
    </div>
    
    <!-- Structure du projet -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Structure du projet</h2>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <pre class="text-sm text-gray-800">
/Base-Project-Composer
├── config/
│   └── config.php            # Configuration de l'application
├── public/
│   ├── index.php             # Point d'entrée de l'application
│   ├── css/                  # Fichiers CSS
│   ├── js/                   # Fichiers JavaScript
│   └── image/                # Images
├── src/
│   ├── Controllers/          # Contrôleurs de l'application
│   ├── Models/               # Modèles et gestionnaires de données
│   ├── Route.php             # Classe Route pour gérer les routes individuelles
│   └── Router.php            # Classe Router pour le routage global
├── views/
│   ├── Auth/                 # Vues d'authentification (login, register)
│   ├── PageViews/            # Vues des pages principales
│   └── layout.php            # Template principal
└── composer.json             # Configuration Composer
            </pre>
        </div>
    </div>
    
    <!-- Système de routage -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Système de routage</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            Le routage est géré par les classes <code class="bg-gray-200 px-2 py-1 rounded">Router</code> et 
            <code class="bg-gray-200 px-2 py-1 rounded">Route</code>. Le routeur associe des URL à des méthodes 
            spécifiques dans vos contrôleurs.
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Comment ajouter une nouvelle route</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
// Dans public/index.php 
</br></br>

// Exemple de route GET </br>
$router->get('/products', 'ProductController@index');
</br>
// Exemple de route POST </br>
$router->post('/products/add', 'ProductController@store');
</br>
// Route avec paramètres </br>
$router->get('/products/:id', 'ProductController@show');
            </code>
        </div>
        
        <p class="text-gray-700 leading-relaxed">
            Dans l'exemple ci-dessus, <code class="bg-gray-200 px-1 py-0.5 rounded">:id</code> est un paramètre dynamique 
            qui sera passé à la méthode <code class="bg-gray-200 px-1 py-0.5 rounded">show</code> du 
            <code class="bg-gray-200a px-1 py-0.5 rounded">ProductController</code>.
        </p>
    </div>
    
    <!-- Contrôleurs -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contrôleurs</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            Les contrôleurs gèrent la logique de l'application et servent d'intermédiaire entre les modèles et les vues.
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Création d'un nouveau contrôleur</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
&lt;?php
</br>
namespace Excomposer\Controllers;
</br></br>
use Excomposer\Models\ProductManager;
</br></br>
class ProductController {</br>
    private $manager;</br>
    </br>
    public function __construct() {</br>
        // Initialisation du gestionnaire de produits</br>
        $this->manager = new ProductManager();</br>
    }</br>
    </br>
    // Affiche la liste des produits</br>
    public function index() {</br>
        $products = $this->manager->getAllProducts();</br>
        require VIEWS . 'PageViews/products/index.php';</br>
    }</br>
    </br>
    // Affiche un produit spécifique</br>
    public function show($id) {</br>
        $product = $this->manager->getProductById($id);</br>
        require VIEWS . 'PageViews/products/show.php';</br>
    }</br>
    </br>
    // Traite l'ajout d'un produit</br>
    public function store() {</br>
        // Validation et traitement du formulaire</br>
        if ($this->manager->save($_POST)) {</br>
            // Redirection en cas de succès</br>
            header('Location: /products');</br>
            exit;</br>
        }</br>
        </br>
        // En cas d'erreur</br>
        $_SESSION['error'] = 'Impossible d\'ajouter le produit';</br>
        header('Location: /products/add');</br>
        exit;</br>
    }</br>
}
            </code>
        </div>
    </div>
    
    <!-- Modèles -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Modèles</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            L'architecture utilise deux types de classes pour gérer les données: les entités (models) et les gestionnaires (managers).
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Création d'une classe modèle</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
&lt;?php
</br>
namespace Excomposer\Models;</br>
</br>
class Product {</br>
    private $id;</br>
    private $name;</br>
    private $price;</br>
    private $description;</br>
    </br>
    // Getters et setters</br>
    public function getId() {</br>
        return $this->id;</br>
    }</br>
    </br>
    public function setId($id) {</br>
        $this->id = $id;</br>
    }</br>
    </br>
    public function getName() {</br>
        return $this->name;</br>
    }</br>
    </br>
    public function setName($name) {</br>
        $this->name = $name;</br>
    }</br>
    </br>
    public function getPrice() {</br>
        return $this->price;</br>
    }</br>
    </br>
    public function setPrice($price) {</br>
        $this->price = $price;</br>
    }</br>
    </br>
    public function getDescription() {</br>
        return $this->description;</br>
    }</br>
    </br>
    public function setDescription($description) {</br>
        $this->description = $description;</br>
    }</br>
}
            </code>
        </div>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Création d'un Manager</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
&lt;?php
</br>
namespace Excomposer\Models;</br>
</br>
use PDO;</br>
</br>
class ProductManager {</br>
    private $db;</br>
    </br>
    public function __construct() {</br>
        // Connexion à la base de données</br>
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);</br>
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);</br>
    }</br>
    </br>
    // Récupère tous les produits</br>
    public function getAllProducts() {</br>
        $stmt = $this->db->query('SELECT * FROM products');</br>
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Excomposer\\Models\\Product');</br>
    }</br>
    </br>
    // Récupère un produit par son ID</br>
    public function getProductById($id) {</br>
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');</br>
        $stmt->execute(['id' => $id]);</br>
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Excomposer\\Models\\Product');</br>
        return $stmt->fetch();</br>
    }</br>
    </br>
    // Sauvegarde un nouveau produit</br>
    public function save($data) {</br>
        try {</br>
            $stmt = $this->db->prepare('</br>
                INSERT INTO products (name, price, description)</br>
                VALUES (:name, :price, :description)</br>
            ');</br>
            </br>
            return $stmt->execute([</br>
                'name' => $data['name'],</br>
                'price' => $data['price'],</br>
                'description' => $data['description']</br>
            ]);</br>
        } catch (\PDOException $e) {</br>
            // Gérer l'erreur </br>
            return false; </br>
        }</br>
    }</br>
}</br>
            </code>
        </div>
    </div>
    
    <!-- Vues -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Vues</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            Les vues sont responsables de l'affichage des données. Elles sont stockées dans le répertoire <code>views/</code>.
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Exemple de vue</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
&lt;div class="max-w-4xl mx-auto py-8">
    &lt;h1 class="text-3xl font-bold mb-6">Liste des produits&lt;/h1>
    
    &lt;div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> </br>
        &lt;?php foreach ($products as $product): ?></br>
            &lt;div class="bg-white shadow rounded-lg p-6"></br>
                &lt;h2 class="text-xl font-semibold mb-2">&lt;?= htmlspecialchars($product->getName()) ?>&lt;/h2></br>
                &lt;p class="text-blue-600 font-bold mb-2">&lt;?= number_format($product->getPrice(), 2) ?> €&lt;/p></br>
                &lt;p class="text-gray-700 mb-4">&lt;?= htmlspecialchars($product->getDescription()) ?>&lt;/p></br>
                &lt;a href="/products/&lt;?= $product->getId() ?>" class="text-blue-500 hover:underline"></br>
                    Voir les détails</br>
                &lt;/a></br>
            &lt;/div></br>
        &lt;?php endforeach; ?></br>
    &lt;/div></br>
&lt;/div></br>
            </code>
        </div>
    </div>
    
    <!-- Session et Gestion des erreurs -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Session et Gestion des erreurs</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            On utilise les sessions PHP pour stocker des informations temporaires, comme les messages 
            d'erreur ou les données de formulaire.
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Affichage des erreurs</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
&lt;?php if(isset($_SESSION['error'])): ?></br>
    &lt;div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"></br>
        &lt;?= $_SESSION['error'] ?></br>
    &lt;/div></br>
&lt;?php endif; ?></br>
            </code>
        </div>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Conservation des données de formulaire</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
&lt;input type="text" name="name" value="&lt;?= isset($_SESSION['old']['name']) ? htmlspecialchars($_SESSION['old']['name']) : '' ?>" 
    class="w-full px-3 py-2 border rounded-md">
            </code>
        </div>
    </div>
    
    <!-- Authentification -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Authentification</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            On inclut un système d'authentification basique avec enregistrement, connexion et déconnexion.
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Vérification de l'authentification</h3>
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <code class="text-sm text-gray-800">
// Dans un contrôleur</br>
private function checkAuth() {</br>
    if (!isset($_SESSION['user'])) {</br>
        header('Location: /login');</br>
        exit;</br>
    }</br>
}</br>

// Avant d'exécuter une méthode protégée</br>
public function dashboard() {</br>
    $this->checkAuth();</br>
    </br>
    // Code pour afficher le tableau de bord</br>
    require VIEWS . 'PageViews/dashboard.php';</br>
}</br>
            </code>
        </div>
    </div>
    
    <!-- Personnalisation -->
    <div class="mb-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Personnalisation</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            Il est conçu pour être facilement personnalisable selon vos besoins spécifiques.
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Configuration</h3>
        <p class="text-gray-700 leading-relaxed mb-4">
            Vous pouvez modifier les paramètres de configuration dans le fichier <code>config/config.php</code>.
        </p>
        
        <h3 class="text-xl font-medium text-gray-800 mt-6 mb-3">Style et UI</h3>
        <p class="text-gray-700 leading-relaxed">
            On utilise Tailwind CSS pour le style, que vous pouvez personnaliser selon vos préférences. 
            Vous pouvez également ajouter d'autres bibliothèques CSS ou JavaScript selon vos besoins.
        </p>
    </div>
    
    <!-- Ressources additionnelles -->
    <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ressources additionnelles</h2>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li>
                <a href="https://github.com/bourtitom/Base-Project-Composer" class="text-blue-600 hover:underline">
                    GitHub du projet
                </a>
            </li>
            <li>
                <a href="https://www.php.net/docs.php" class="text-blue-600 hover:underline">
                    Documentation PHP
                </a>
            </li>
            <li>
                <a href="https://tailwindcss.com/docs" class="text-blue-600 hover:underline">
                    Documentation Tailwind CSS
                </a>
            </li>
        </ul>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
