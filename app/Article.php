<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use SoftDeletes;

    protected $fillable = ['title', 'view'];
    protected $dates = ['publish_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User');


//        return $this->hasOne('App\User', 'author');
    }

    public function getLanguageAttribute()
    {
        return 'php';
    }

    public function scopePublished($query)
    {
        return $query->where('publish_at', '<', \Carbon\Carbon::now());
    }

    public function getSlugAttribute(){
        $slug =  action('ArticleController@show', ['id' => $this->id . '-' . str_slug($this->title)]);
//        $slug = $this->id . '-' . str_slug($this->title);
        return $slug;
    }

    public function highlight($source, $language){
        $GeSHi = new \GeSHi($source, $language);
        return $GeSHi->parse_code();
    }

}
