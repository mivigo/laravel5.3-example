<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed tags
 */
class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id' //temporary!!
    ];

    protected $dates = ['published_at'];

    /**
     * An article is owned by user.
     * 
    **/


    public function scopePublished($query){
        $query->where('published_at','<=', Carbon::now());
    }

    public function scopeUnpublished($query){
        $query->where('published_at','>', Carbon::now());
    }

    public function setPublishedAtAttribute($date){
//        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * An article is owned by a user
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user () {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags () {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    /**
     * Get the list associated with the current article
     *
     *
     * @return array
     */
    public function getTagListAttribute() {
        return $this->tags->pluck('id')->all();
//        return $this->tags->pluck('id')->toArray(); //the same
        
    }
}
