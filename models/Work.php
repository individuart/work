<?php namespace Individuart\Work\Models;

use Model;


/**
 * Work Model
 */
class Work extends Model
{
    use \October\Rain\Database\Traits\Sortable; //necesito esta clase para reordenar en el listado
    /**
     * @var string The database table used by the model.
     */
    public $table = 'individuart_work_works';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    protected $sortMode = 'simple';

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'featured_image' => ['System\Models\File']
    ];
    public $attachMany = [];

    public function getImageAttribute(){
        $trabajo = Work::find($this->id);
        if($trabajo->featured_image)
        {
            return '<img src="' . $trabajo->featured_image->getThumb(50, 50, 'crop') . '">';
        }else
        {
            return '';
        }
    }

    public function scopePublished($query)
    {
        return $query->where('published',true);

    }

}