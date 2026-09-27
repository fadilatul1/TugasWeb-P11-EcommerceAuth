<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Determine whether the user can update the product.
     */
    public function update(User $user, Product $product): bool
    {
        return in_array($user->role, ['admin', 'editor'], true);
    }

    /**
     * Determine whether the user can delete the product.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }
}