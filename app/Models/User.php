<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    protected $incrementing = false;
    protected $primaryKey = 'npm';
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $kodeJurusan = '55201';


            $angkatan = '22';

            $prefix = $kodeJurusan . $angkatan;

            $lastUser = self::where('npm', 'like', $prefix . '%')
                            ->orderBy('npm', 'desc')
                            ->first();

            if ($lastUser) {
                $lastUrutan = (int) substr($lastUser->npm, -3);
                $newUrutan = str_pad($lastUrutan + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newUrutan = '001';
            }

            $model->npm = $prefix . $newUrutan;
        });
    }

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
