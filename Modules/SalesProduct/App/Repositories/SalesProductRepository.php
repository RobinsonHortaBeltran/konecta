<?php

namespace Modules\SalesProduct\App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\SalesProduct\App\Models\SalesProduct;
use Modules\SalesProduct\App\Contracts\SalesProductRepositoryInterface;

class SalesProductRepository implements SalesProductRepositoryInterface
{
    /**
     * Retrieve all sales products.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return SalesProduct::all();
    }

    /**
     * Find a sales product by ID.
     *
     * @param int $id
     * @return \App\Models\SalesProduct
     */
    public function find(int $id): SalesProduct
    {
        return SalesProduct::find($id);
    }

    /**
     * Create a new sales product.
     *
     * @param array $data
     * @return \App\Models\SalesProduct
     */
    public function create($data): SalesProduct
    {
        return SalesProduct::create($data);
    }

    /**
     * Update a sales product.
     *
     * @param array $data
     * @param int $id
     * @return \App\Models\SalesProduct
     */
    public function update(array $data, int $id): SalesProduct
    {
        $product = SalesProduct::find($id);
        
        $product->update($data);
        return $product;
    }

    /**
     * Delete a sales product by ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return SalesProduct::destroy($id);
    }
}
