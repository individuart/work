<?php namespace Individuart\Work\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Sortable; //necesito esta clase para reordenar en el listado
    /**
     * @var string The database table used by the model.
     */
    public $table = 'individuart_work_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'works' => ['Individuart\Work\Models\Work','table'=>'individuart_work_category_work']
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function scopePublished($query)
    {
        return $query->where('published',true);

    }

}