<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get a setting by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value.
     *
     * @param string $key
     * @param mixed $value
     * @param string $group
     * @return bool
     */
    public static function set(string $key, $value, string $group = 'general')
    {
        $setting = self::firstOrNew(['key' => $key]);
        $setting->value = $value;
        $setting->group = $group;
        
        return $setting->save();
    }

    /**
     * Get all settings by group.
     *
     * @param string $group
     * @return array
     */
    public static function getByGroup(string $group)
    {
        return self::where('group', $group)
            ->pluck('value', 'key')
            ->toArray();
    }
}