<?php namespace Square1\Wordpressed;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Square1\Wordpressed\MetaCollection as MetaCollection;

class CommentMeta extends Eloquent
{
    /**
     * @var string The DB table name
     */
    protected $table = 'commentmeta';

    /**
     * @var string Primiary DB key
     */
    protected $primaryKey = 'meta_id';

    /**
     * @var boolean Disable 'created_at' and 'updated_at' timestamp columns
     */
    public $timestamps = false;

    /**
     * Override the default Collection
     *
     * @param array $models
     *
     * @return \Square1\Wordpressed\UserMetaCollection
     */
    public function newCollection(array $models = [])
    {
        return new MetaCollection($models);
    }

    /**
     * Define user relationship
     *
     * @return object
     */
    public function comment()
    {
        return $this->belongsTo('Square1\Wordpressed\Comment', 'comment_id');
    }
}
