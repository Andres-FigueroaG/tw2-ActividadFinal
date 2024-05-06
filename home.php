<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();





$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/4/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CNews
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <!-- añadimos el logo de nuestra pag -->
            <a href="#" target="_blank" rel="noopener">
                <img alt="CNews" src="https://1000marcas.net/wp-content/uploads/2021/04/CNews-Logo.png" width="350" />
            </a>
            <h1>
                Bienvenido a Caracol News
            </h1>
        </div>
        <!-- SE AÑADIO UNA NAVBAR-->
        <nav class="navbar text-center">            
            <ul>
                <li><a href="http://localhost:8765/users/login">Inicia sesion</a></li>
                <li><a href="http://localhost:8765/users/add">Registro</a></li>
                <li><a href="http://localhost:8765/bookmarks">Bookmarks</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <!-- Se añadio de forma manual los datos que estan en la DB, por problemas al mostrar se hizo este metodo, sugerible cambiarlo -->
                    <div class="column">
                        <h4>Politica</h4>
                        <a target="_blank" rel="noopener" href="https://eldeber.com.bo/santa-cruz/se-empantana-la-conformacion-de-comisiones-en-la-ald-en-medio-de-peleas-la-foto-de-camacho-ya-no-est_365279">
                            <img alt="eldeber" src="https://eldeber.com.bo/_next/image?url=https%3A%2F%2Fstatic.eldeber.com.bo%2FFiles%2FSizes%2F2024%2F5%2F6%2Fsaln-de-la-asamblea-legislativa-sin-la-foto-de-luis-fernando-cam_966605832_760x520.jpeg&w=1920&q=75" />
                        </a>
                        <h5>Se empantana la conformación de comisiones en la ALD en medio de peleas; la foto de Camacho ya no está en el hemiciclo</h5>
                        
                    </div>
                    <div class="column">
                        <h4>Ciencias y salud</h4>
                        <a target="_blank" rel="noopener" href="https://eldeber.com.bo/santa-cruz/recien-nacida-encontrada-sin-vida-en-una-bolsa-negra-murio-por-sofocacion-provocada_365292">
                            <img alt="eldeber" src="https://eldeber.com.bo/_next/image?url=https%3A%2F%2Fstatic.eldeber.com.bo%2FFiles%2FSizes%2F2024%2F5%2F6%2Frecin-nacida-hallada-en-una-bolsa_977890785_760x520.jpeg&w=1920&q=75" />
                        </a>
                        <h5>Recién nacida encontrada sin vida en una bolsa negra murió por sofocación provocada </h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column">
                        <h4>Cultura</h4>
                        <a target="_blank" rel="noopener" href="https://www.elmundo.es/cultura/2024/05/06/6639036321efa058478b4594.html">
                            <img alt="eldeber" src="https://phantom-elmundo.unidadeditorial.es/6ca363d2f9b8230ce858b42d950493ba/crop/57x0/1635x1052/resize/646/f/webp/assets/multimedia/imagenes/2024/05/06/17150126653151.jpg" />
                        </a>
                        <h5>China aprende español para expandir la nueva Ruta de la Seda: "Muchos arquitectos e ingenieros lo eligen como segundo idioma" </h5>
                    </div>
                    <div class="column">
                        <h4>Deportes</h4>
                        <a target="_blank" rel="noopener" href="https://www.elmundo.es/deportes/futbol/2024/05/06/6639111a21efa0ae2d8b4591.html">
                            <img alt="eldeber" src="https://phantom-elmundo.unidadeditorial.es/c8fbd32fa76ce1d757ad1740cdcd64ac/crop/457x265/2141x1387/resize/646/f/webp/assets/multimedia/imagenes/2024/05/06/17150155986257.jpg" />
                        </a>
                        <h5>El mayor abismo entre Madrid y Barça: títulos, imagen, millones, valor de mercado, patrocinios...</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                    
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
