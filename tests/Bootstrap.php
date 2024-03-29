<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */
namespace ZendCommerceTest;

use ZendCommerceTest\Util\ServiceManagerFactory;

ini_set('error_reporting', E_ALL);

$files = array(__DIR__ . '/../vendor/autoload.php', __DIR__ . '/../../../autoload.php');

foreach ($files as $file) {
    if (file_exists($file)) {
        $loader = require $file;

        break;
    }
}

if (! isset($loader)) {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

/**
 * Setup autoloading
 */
$zendLoader = new \Zend\Loader\StandardAutoloader(
    array(
        \Zend\Loader\StandardAutoloader::LOAD_NS => array(
            'ZendCommerce' => __DIR__ . '/../src/ZendCommerce',
            'ZendCommerceTest' => __DIR__ . '/ZendCommerceTest'
        ),
    )
);
$zendLoader->register();


/* @var $loader \Composer\Autoload\ClassLoader */
$loader->add('ZendCommerceTest\\', __DIR__ . 'ZendFrameworkTest');

if (file_exists(__DIR__ . '/TestConfig.php')) {
    $config = require __DIR__ . '/TestConfig.php';
}

ServiceManagerFactory::setConfig($config);
unset($files, $file, $loader, $config);