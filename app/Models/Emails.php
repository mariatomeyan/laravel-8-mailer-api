<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    use HasFactory;

    public function attachments()
    {
        return $this->belongsToMany(Attachment::class);
    }

    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient');
    }
}
