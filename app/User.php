<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Crypt;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','ref_id','email','full_name','division_id','gender','pln','status' //ทำเพิ่ม
    ]; 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
       /**
     * Set field 'name'.
     *
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'name'.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return Crypt::decrypt($this->attributes['name']);
    }
          /**
     * Set field 'ref_id'.
     *
     * @param string $value
     */
    public function setRefIdAttribute($value)
    {
        $this->attributes['ref_id'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'ref_id'.
     *
     * @return string
     */
    public function getRefIdAttribute()
    {
        return Crypt::decrypt($this->attributes['ref_id']);
    }
              /**
     * Set field 'email'.
     *
     * @param string $value
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'email'.
     *
     * @return string
     */
    public function getEmailAttribute()
    {
        return Crypt::decrypt($this->attributes['email']);
    }
               /**
     * Set field 'full_name'.
     *
     * @param string $value
     */
    public function setFullNameAttribute($value)
    {
        $this->attributes['full_name'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'full_name'.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return Crypt::decrypt($this->attributes['full_name']);
    }
                   /**
     * Set field 'division_id'.
     *
     * @param string $value
     */
    public function setDivisionIdAttribute($value)
    {
        $this->attributes['division_id'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'division_id'.
     *
     * @return string
     */
    public function getDivisionIdAttribute()
    {
        return Crypt::decrypt($this->attributes['division_id']);
    }
                       /**
     * Set field 'pln'.
     *
     * @param string $value
     */
    public function setDivisionPlnAttribute($value)
    {
        $this->attributes['pln'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'pln'.
     *
     * @return string
     */
    public function getDivisionPlnAttribute()
    {
        return Crypt::decrypt($this->attributes['pln']);
    }
}