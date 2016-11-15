<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    public function getFullAddressAttribute() {
        return trim(implode(', ', array_filter([$this->address, $this->suburb, $this->state, $this->postcode])));
    }

    public function getFullNameAttribute() {
        return ucfirst($this->first_name)  . ' ' . ucfirst($this->last_name);
    }

}