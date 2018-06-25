<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Crypt;

class Callback extends Model
{
    protected $fillable = [
        'username','text','reply_code'
    ]; 
       /**
     * Set field 'username'.
     *
     * @param string $value
     */
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'username'.
     *
     * @return string
     */
    public function getUsernameAttribute()
    {
        return Crypt::decrypt($this->attributes['username']);
    }

         /**
     * Set field 'text'.
     *
     * @param string $value
     */
    public function setTextAttribute($value)
    {
        $this->attributes['text'] = Crypt::encrypt($value);
    }
    /**
     * Get field 'text'.
     *
     * @return string
     */
    public function getTextAttribute()
    {
        return Crypt::decrypt($this->attributes['text']);
    }
}
