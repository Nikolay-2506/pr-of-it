<?php

namespace App\Models;

use App\Model;

class Author extends Model
{
    protected static $table = 'authors';

    public $email;
    public $lastName;
    public $firstName;
    public $fatherName;

    public function generateFullNameAuthor()
    {
        $fullName = [];

        if (!empty($this->lastName)) {
            $fullName[] = $this->lastName;
        }
        if (!empty($this->firstName)) {
            $fullName[] = $this->firstName;
        }
        if (!empty($this->fatherName)) {
            $fullName[] = $this->fatherName;
        }

        return implode(' ', $fullName);
    }
}