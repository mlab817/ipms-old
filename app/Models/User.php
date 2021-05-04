<?php

namespace App\Models;

use Approval\Models\Modification;
use Approval\Traits\ApprovesChanges;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use ApprovesChanges;
    use HasApiTokens;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'office_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = [
//        'profile',
//        'permissions',
//        'roles',
    ];

    /**
     * @param Modification $modification
     *
     * @return bool
     */
    public function authorizedToApprove(Modification $modification): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * @param Modification $modification
     *
     * @return bool
     */
    public function authorizedToDisapprove(Modification $modification): bool
    {
        return $this->hasRole('admin');
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class,'user_id','id');
    }

    public function assigned_projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,'project_user_permission','user_id','project_id')
            ->withPivot('read','update','delete','review','comment');
    }

    public function isActive(): bool
    {
        return !!$this->active;
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function activate()
    {
        $this->active = true;
    }

    public function deactivate()
    {
        $this->active = false;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
