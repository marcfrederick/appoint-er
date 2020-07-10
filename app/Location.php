<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @var array<string> */
    protected $fillable = [
        'title', 'description', 'address_id', 'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Address>
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Category>
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * @param  String $categoryName
     * @return void
     */
    public function addCategoryByName(string $categoryName)
    {
        /** @var Category|null $category */
        $category = Category::firstWhere('name', '=', $categoryName);
        throw_if(is_null($category), new \Exception('Category not found'));
        CategoryLocation::create([
            'location_id' => $this->id,
            'category_id' => $category->id,
        ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoryLocation()
    {
        return $this->hasMany(CategoryLocation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Slot>
     */
    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection<Slot>
     */
    public function getFutureAvailableSlotsAttribute()
    {
        return $this->slots()
            ->whereDate('start', '>', now())
            ->doesntHave('booking')
            ->get();
    }
}
