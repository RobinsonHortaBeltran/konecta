<?php

namespace Modules\SalesProduct\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Products\App\Contracts\ProductRepositoryInterface;
use Modules\Products\App\Models\Products;
use Modules\SalesProduct\App\Resource\SalesProductosResource;
use Modules\SalesProduct\App\Resource\SalesProductCollection as SalesPro;
use Modules\SalesProduct\App\Contracts\SalesProductRepositoryInterface;
use Modules\SalesProduct\App\Http\Request\ValidateSalesProductsRequest;
use Modules\SalesProducts\App\Resource\ErrorResponseResource;

class SalesProductController extends Controller
{
    protected $salesProductRepository;
    protected $productRepository;

    /**
     * SalesProductController constructor.
     *
     * @param SalesProductRepositoryInterface $salesProductRepository The repository for sales products.
     * @param ProductRepositoryInterface $productRepository The repository for products.
     */
    public function __construct(SalesProductRepositoryInterface $salesProductRepository, ProductRepositoryInterface $productRepository)
    {
        $this->salesProductRepository = $salesProductRepository;
        $this->productRepository = $productRepository;
    }



    /**
     * Retrieve all sales products.
     *
     * @return SalesPro
     * @throws \Throwable
     */
    public function index()
    {
        try {
            $salesProducts = $this->salesProductRepository->all();
            $message = 'Productos de venta obtenidos correctamente';

            return new SalesPro($salesProducts, $message);
        } catch (\Throwable $th) {
            $message = 'Error al obtener los productos de venta';
            return $th;
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created sales product in storage.
     *
     * @param ValidateSalesProductsRequest $request The request object containing the validated data.
     * @return SalesProductosResource The resource representing the created sales product.
     */
    public function store(ValidateSalesProductsRequest $request): SalesProductosResource
    {
        try {
            // Check if there is enough stock available
            if ($this->validateStock($request->product_id)) {
                // Decrease the stock of the product
                Products::where('id', $request->product_id)->decrement('stock', $request->cantidad);
                // Create the sales product
                $salesProduct = $this->salesProductRepository->create($request->validated());
                $message = 'Producto de venta creado correctamente';

                return new SalesProductosResource($salesProduct, $message, true, 201);
            } else {
                $message = 'No hay stock disponible';
                return new SalesProductosResource([], $message, true, 500);
            }
        } catch (\Throwable $th) {
            $message = 'Error al crear el producto de venta, stock insuficiente';
            return response()->json($message, 500);
        }
    }

    /**
     * Show the specified sales product.
     *
     * @param int $id The ID of the sales product.
     * @return SalesProductosResource The resource representing the specified sales product.
     */
    public function show($id): SalesProductosResource
    {
        try {
            $salesProduct = $this->salesProductRepository->find($id);
            $message = 'Producto de venta obtenido correctamente';

            return new SalesProductosResource($salesProduct, $message);
        } catch (\Throwable $th) {
            $message = 'Error al obtener el producto de venta';
            return new ErrorResponseResource($message, $th->getMessage());
        }
    }

    /**
     * Remove the specified sales product from storage.
     *
     * @param int $id The ID of the sales product.
     * @return SalesProductosResource The resource representing the deleted sales product.
     */
    public function destroy($id): SalesProductosResource
    {
        try {
            $salesProduct = $this->salesProductRepository->delete($id);
            $message = 'Producto de venta eliminado correctamente';

            return new SalesProductosResource($salesProduct, $message);
        } catch (\Throwable $th) {
            $message = 'Error al eliminar el producto de venta';
            return new ErrorResponseResource($message, $th->getMessage());
        }
    }

    /**
     * Validate if there is enough stock available for a product.
     *
     * @param int $id The ID of the product.
     * @return bool True if there is enough stock available, false otherwise.
     * @throws \Throwable If an error occurs while validating the stock.
     */
    public function validateStock($id): bool
    {
        try {
            $products = $this->productRepository->find($id);
            if ($products->stock > 0) {
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
