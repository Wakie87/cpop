<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    public function getFullAddressAttribute() {
        return trim(implode(', ', array_filter([$this->address, $this->suburb, $this->state, $this->postcode])));
    }

}