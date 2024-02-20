<?php
namespace Modules\Products\App\Contracts;
use Illuminate\Database\Eloquent\Collection;
use Modules\Products\App\Models\Products;

interface ProductRepositoryInterface
{
    public function all(): Collection;
    public function create(array $data): Products;
    public function find(int $id): Products;
    public function update(array $data, int $id): Products;
    public function delete(int $id): bool;
}
