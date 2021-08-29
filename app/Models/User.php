<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use Overtrue\LaravelFollow\Followable;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use HasRoles;
    use SoftDeletes;
    use Auditable;
    use CausesActivity;
    use Followable;

    public function identifiableName()
    {
        return $this->username;
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'active',
        'office_id',
        'avatar',
        'activated_at',
        'password_changed_at',
        'role_id',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'active',
        'email_verified_at',
        'two_factor_reset',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'created_at',
        'updated_at',
        'avatar',
        'google_id',
        'deleted_at',
        'activated_at',
        'password_changed_at',
        'role_id'
    ];

    protected $with = [
//        'profile',
//        'permissions',
//        'roles',
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(LinkedSocialAccount::class);
    }

    public function user_avatar()
    {
        if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            return $this->avatar;
        }

        return Storage::url($this->avatar);
    }

    public function logins(): HasMany
    {
        return $this->hasMany(Login::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function pinned_projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'pinned_projects');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class,'user_id','id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class,'created_by','id');
    }

    public function project_notifications()
    {
        return $this->hasMany(ProjectNotification::class, 'receiver_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class,'user_id','id');
    }

    public function assigned_projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,'project_user_permission','user_id','project_id')
            ->withPivot('read','update','delete','review','comment');
    }

    public function currentRole(): BelongsTo
    {
        return $this->belongsTo(\Spatie\Permission\Models\Role::class,'role_id');
    }

    public function isActive(): bool
    {
        return !!$this->active;
    }

    public function isAdmin(): bool
    {
        return $this->is_admin || $this->hasRole('admin');
    }

    public function activate()
    {
        $this->activated_at = now();
        $this->save();
    }

    public function deactivate()
    {
        $this->activated_at = null;
        $this->save();
    }

    public function switchRole($roleId)
    {
        $role = \Spatie\Permission\Models\Role::findById($roleId);
        $this->syncRoles($role);
        $this->role_id = $roleId;
        $this->save();
    }

    public function assigned_roles(): BelongsToMany
    {
        return $this->belongsToMany(\Spatie\Permission\Models\Role::class, 'assigned_roles', 'user_id', 'role_id');
    }

    public function scopeProjectManager($query)
    {
        $query->permission('projects.manage');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'activated_at' => 'datetime',
    ];

    public function getFullNameAttribute(): string
    {
        $fullName = '%s %s';
        return sprintf($fullName, $this->first_name, $this->last_name);
    }

    public function incrementLoginTries()
    {
        $this->increment('login_tries');
    }

    public function resetLoginTries()
    {
        $this->login_tries = 0;
        $this->save();
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function($q) use ($query) {
                    $q
                        ->where('name', 'LIKE', '%'. $query . '%')
                        ->orWhere('email', 'LIKE', '%' . $query . '%');
                });
    }

    public static function findByUsername(string $username)
    {
        return static::where('username', $username)->firstOrFail();
    }

    public function pending_transfers_from(): HasMany
    {
        return $this->hasMany(PendingTransfer::class,'from');
    }

    public function pending_transfers_to(): HasMany
    {
        return $this->hasMany(PendingTransfer::class,'to');
    }

    public function currentProjects(): HasMany
    {
        return $this->projects()->current();
    }
}
