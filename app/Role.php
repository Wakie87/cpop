<?php 

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $table = 'roles';

	protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
    /**
     * Gets the permissions associated with the role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permission()
    {
        return $this->belongsToMany('App\Permission');
    }
    /**
     * Gets the users associated with the role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\user');
    }
}