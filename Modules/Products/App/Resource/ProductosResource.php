<?php

namespace Modules\Products\App\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductosResource extends JsonResource
{
    /* The `protected ;` declaration in the PHP class `ProductosResource` is defining a
    protected property called ``. This property is accessible only within the class itself
    and its subclasses. */
    protected $message;

    /**
     * The function is a constructor in PHP that initializes a resource and a message.
     *
     * @param resource The `resource` parameter in the constructor is typically used to pass a resource
     * handle or identifier to the object being constructed. This resource could be a file handle,
     * database connection, network socket, or any other type of resource that the object needs to work
     * with. It allows the object to interact with the
     * @param message The `message` parameter in the `__construct` function is typically used to pass a
     * message or information to the object being constructed. It allows you to initialize the object
     * with a specific message that can be used within the object's methods or properties.
     */
    public function __construct($resource, $message)
    {
        parent::__construct($resource);
        $this->message = $message;
    }


    /**
     * The toArray function in PHP returns an array with message, data, status, and code keys.
     *
     * @param request The `toArray` function is used to format the response data before sending it as a
     * JSON response. In this case, the function returns an array with the following keys:
     *
     * @return An array is being returned with the keys 'Message', 'data', 'status', and 'code'. The
     * values for 'Message' and 'data' are being fetched from the current object instance, while
     * 'status' is set to true and 'code' is set to 200.
     */
    public function toArray($request)
    {
        
        return [
            'Message' => $this->message,
            'status' => true,
            'code' => 200,
        ];
    }

    /**
     * The function `toResponse` sets the headers for the response to be in JSON format with a custom
     * header.
     *
     * @param request The `toResponse` function is a method that is likely part of a class that extends
     * a framework's base controller class. It is used to customize the response that will be sent back
     * to the client.
     *
     * @return An HTTP response with the headers 'Content-Type' set to 'application/json' and
     * 'Custom-Header' set to 'Value' is being returned.
     */
    public function toResponse($request)
    {
        return parent::toResponse($request)
            ->header('Content-Type', 'application/json')
            ->header('Custom-Header', 'Value');
    }
}
