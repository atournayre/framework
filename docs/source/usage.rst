Usage
=====

This guide provides examples of how to use the Framework in your projects.

Basic Usage
----------

Here's a simple example of how to create a basic application:

.. code-block:: php

    <?php
    
    require_once 'vendor/autoload.php';
    
    use Framework\Application;
    
    $app = new Application();
    
    $app->get('/', function() {
        return 'Hello, World!';
    });
    
    $app->run();

Routing
-------

The Framework provides a simple routing system:

.. code-block:: php

    $app->get('/users', function() {
        // Handle GET request to /users
    });
    
    $app->post('/users', function() {
        // Handle POST request to /users
    });
    
    $app->put('/users/{id}', function($id) {
        // Handle PUT request to /users/{id}
    });
    
    $app->delete('/users/{id}', function($id) {
        // Handle DELETE request to /users/{id}
    });

Controllers
----------

You can also use controllers to organize your code:

.. code-block:: php

    <?php
    
    namespace App\Controller;
    
    use Framework\Controller\AbstractController;
    
    class UserController extends AbstractController
    {
        public function index()
        {
            return $this->render('users/index.html.twig', [
                'users' => $this->getUserRepository()->findAll(),
            ]);
        }
    }
