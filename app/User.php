<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    protected $casts = ['paid' => "boolean"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function markPaid()
    {
        $this->paid = true;
        $this->save();
        $user = $this;
        Mail::send("emails.success", [], function ($message) use ($user) {
            $message->to($user->email)->subject("See you on LDOC!");
        });
    }
}
