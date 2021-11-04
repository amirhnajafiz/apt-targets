# Lumen Microservice 

Lumen is a PHP micro-framework built to deliver microservices and blazing fast APIs.


Lumen is an open-source PHP micro-framework created by Taylor Otwell as an alternative to Laravel to meet the demand of lightweight installations that are faster than existing PHP micro-frameworks such as Slim and Silex. With Lumen, you can build lightning-fast microservices and APIs that can support your Laravel applications.

In here we create a simple Authors website with Microservice and fast APIs. 

## Auth0 Middleware

Handling each request:
```php 
public function handle(Request $request, Closure $next): mixed
{
    $token = $request->bearerToken();
    if(!$token) {
        return response()->json('No token provided', 401);
    }

    $this->validateToken($token);

    return $next($request);
}
```

JWT fetcher method:
```php 
try {
    $jwksUri = env('AUTH0_DOMAIN') . '.well-known/jwks.json';
    $jwksFetcher = new JWKFetcher(null, [ 'base_uri' => $jwksUri ]);
    $signatureVerifier = new AsymmetricVerifier($jwksFetcher);
    $tokenVerifier = new TokenVerifier(env('AUTH0_DOMAIN'), env('AUTH0_AUD'), $signatureVerifier);

    $decoded = $tokenVerifier->verify($token);
}
catch(InvalidTokenException $e) {
    throw $e;
}
```

## Routes 
```php 
$router->get('authors',  ['uses' => 'AuthorController@index']);

$router->get('authors/{id}', ['uses' => 'AuthorController@show']);

$router->post('authors', ['uses' => 'AuthorController@store']);

$router->delete('authors/{id}', ['uses' => 'AuthorController@destroy']);

$router->put('authors/{id}', ['uses' => 'AuthorController@update']);
```

### Requirements 
Use <b>PHP 7</b>, it has some errors in PHP 8.<br />
Works fine with any version of laravel.

Checkout the Auth0 website for more information.