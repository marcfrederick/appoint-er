<?php
declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @var array<string> */
    protected $fillable = ['slot_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Slot>
     */
    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
