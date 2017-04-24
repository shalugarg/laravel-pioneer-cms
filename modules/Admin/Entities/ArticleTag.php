<?php

namespace Modules\Admin\Entities;

use Pingpong\Presenters\Model;

class ArticleTag extends Model {

    protected $table = 'article_tags';

    /**
     * primaryKey
     *
     * @var integer
     * @access protected
     */
    protected $primaryKey = null;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'article_id',
        'tag_id',
        'type'
    ];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(__NAMESPACE__ . '\\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(__NAMESPACE__ . '\\Category');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeNewest($query) {
        return $query->orderBy('created_at', 'desc');
    }

}
