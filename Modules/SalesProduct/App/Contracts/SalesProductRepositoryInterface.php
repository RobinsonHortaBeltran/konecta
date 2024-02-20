<?php
namespace Modules\SalesProduct\App\Contracts;
use Illuminate\Database\Eloquent\Collection;
use Modules\SalesProduct\App\Models\SalesProduct;

/**
 * Interface SalesProductRepositoryInterface
 * 
 * This interface defines the contract for a SalesProduct repository.
 */
interface SalesProductRepositoryInterface
{
    /**
     * Get all SalesProducts.
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Create a new SalesProduct.
     *
     * @param array $data The data for creating the SalesProduct.
     * @return SalesProduct
     */
    public function create(array $data): SalesProduct;

    /**
     * Find a SalesProduct by its ID.
     *
     * @param int $id The ID of the SalesProduct.
     * @return SalesProduct
     */
    public function find(int $id): SalesProduct;

    /**
     * Update a SalesProduct.
     *
     * @param array $data The data for updating the SalesProduct.
     * @param int $id The ID of the SalesProduct.
     * @return SalesProduct
     */
    public function update(array $data, int $id): SalesProduct;

    /**
     * Delete a SalesProduct.
     *
     * @param int $id The ID of the SalesProduct.
     * @return bool
     */
    public function delete(int $id): bool;
}
