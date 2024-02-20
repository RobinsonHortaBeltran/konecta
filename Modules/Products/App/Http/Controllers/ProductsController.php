<?php

namespace Modules\Products\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Products\App\Resource\ProductosResource;
use Modules\Products\App\Resource\ProductCollection;
use Modules\Products\App\Resource\ErrorResponseResource;
use Modules\Products\App\Contracts\ProductRepositoryInterface;
use Modules\Products\App\Http\Request\ValidateProductsRequest;
use Modules\Products\App\Models\Products;

class ProductsController extends Controller
{

    protected $productRepository;

    /**
     * The function is a constructor that injects a ProductRepositoryInterface dependency into the
     * class.
     *
     * @param ProductRepositoryInterface productRepository The `productRepository` parameter in the
     * constructor is of type `ProductRepositoryInterface`. It is likely being used to inject an
     * instance of a class that implements the `ProductRepositoryInterface` into the current class.
     * This allows the current class to interact with the product repository through defined methods in
     * the interface,
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * The index function retrieves all products from the product repository and returns a
     * ProductCollection with a success message, or an ErrorResponseResource with an error message if
     * an exception occurs.
     *
     * @return ProductCollection The `index()` function is returning either a `ProductCollection`
     * object with a success message if the products are obtained correctly, or an
     * `ErrorResponseResource` object with an error message and the exception message if there is an
     * error while obtaining the products.
     */
    public function index()
    {
        try {
            $products = $this->productRepository->all();
            $message = 'Productos obtenidos correctamente';

            return new ProductCollection($products, $message);
        } catch (\Throwable $th) {
            $message = 'Error al obtener los productos';
            return new ErrorResponseResource($message, $th->getMessage());
        }
    }


    /**
     * The `store` function creates a new product using data from a request and returns a success
     * message or an error message if an exception occurs.
     *
     * @param ValidateProductsRequest request The `store` function in the code snippet is responsible
     * for creating a new product based on the data provided in the `ValidateProductsRequest` request.
     * Here's a breakdown of the function:
     *
     * @return ProductosResource The `store` function is returning either a `ProductosResource` object
     * with a success message if the product is created successfully, or an `ErrorResponseResource`
     * object with an error message if there is an exception thrown during the creation process.
     */
    public function store(ValidateProductsRequest $request): ProductosResource
    {
        try {
            
            $product = $this->productRepository->create($request->validated());
            $message = 'Producto creado correctamente';

             return new ProductosResource($product, $message);
        } catch (\Throwable $th) {
            $message = 'Error al crear el producto';
            return response()->json(['message' => $message, 'error' => $th->getMessage()], 500);
        }
    }


    /**
     * The function `show` retrieves a product by its ID and returns a success message along with the
     * product data, or an error message if an exception occurs.
     *
     * @param id The `id` parameter in the `show` function is used to specify the identifier of the
     * product that you want to retrieve from the database. This function attempts to find and return
     * the product with the given `id`. If the product is found successfully, it creates a
     * `ProductosResource` object with
     *
     * @return ProductosResource The `show` function is returning either a `ProductosResource` object
     * with a success message if the product is found successfully, or an `ErrorResponseResource`
     * object with an error message if there is an error while trying to obtain the product.
     */
    public function show($id): ProductosResource
    {
        try {
            $product = $this->productRepository->find($id);
            $message = 'Producto obtenido correctamente';

            return new ProductosResource($product, $message);
        } catch (\Throwable $th) {
            $message = 'Error al obtener el producto';
            return new ErrorResponseResource($message, $th->getMessage());
        }
    }



    /**
     * The function updates a product using data from a request and returns a message indicating
     * success or failure.
     *
     * @param Request request The `` parameter in the `update` function is an instance of the
     * `Illuminate\Http\Request` class in Laravel. It represents the HTTP request that is being made to
     * update a product. This request may contain data that needs to be validated before updating the
     * product.
     * @param id The "id" parameter in the update function represents the unique identifier of the
     * product that you want to update. It is used to specify which product in the database should be
     * updated with the new information provided in the request.
     *
     * @return ProductosResource The `update` function is returning either a `ProductosResource` object
     * with a success message if the product was updated successfully, or an `ErrorResponseResource`
     * object with an error message and the exception message if an error occurred during the update
     * process.
     */
    public function update(ValidateProductsRequest $request, $id): ProductosResource
    {
        try {
            $product = $this->productRepository->update($request->validated(), $id);
            //dd($request->validated(), $id);
            $message = 'Producto actualizado correctamente';

            return new ProductosResource($product, $message);
        } catch (\Throwable $th) {
            $message = 'Error al actualizar el producto';
            return new ErrorResponseResource($message, $th->getMessage());
        }
    }


    /**
     * The `destroy` function deletes a product by its ID and returns a success message or an error
     * message if an exception occurs.
     *
     * @param id The `destroy` function you provided seems to be a part of a Laravel controller method
     * for deleting a product. The `` parameter in this function represents the identifier of the
     * product that needs to be deleted from the database.
     *
     * @return The `destroy` function is returning either a `ProductosResource` object with the deleted
     * product and a success message "Producto eliminado correctamente" if the deletion is successful,
     * or an `ErrorResponseResource` object with an error message "Error al eliminar el producto" and
     * the specific error message from the caught exception if an error occurs during the deletion
     * process.
     */
    public function destroy($id)
    {
        try {
            $product = $this->productRepository->delete($id);
            $message = 'Producto eliminado correctamente';

            return new ProductosResource($product, $message);
        } catch (\Throwable $th) {
            $message = 'Error al eliminar el producto';
            return new ErrorResponseResource($message, $th->getMessage());
        }
    }
}
