<?php
namespace Modules\Products\App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Products\App\Models\Products;
use Modules\Products\App\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(): Collection
    {
        return Products::all();
    }

    public function find(int $id): Products
    {
        return Products::find($id);
    }

    public function create($data): Products
    {
        return Products::create($data);
    }

    public function update(array $data, int $id): Products
    {
        $product = Products::find($id);
        
        $product->update($data);
        return $product;
    }

    public function delete(int $id): bool
    {
        return Products::destroy($id);
    }
}
