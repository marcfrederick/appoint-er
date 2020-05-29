<?php
declare(strict_types=1);

namespace App\Http\Requests\Location;

use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>>
     */
    public function rules()
    {
        $stringLength = AppServiceProvider::$defaultStringLength;
        return [
            'title' => ['required', 'string', "max:{$stringLength}"],
            'description' => ['required', 'string'],
            'street' => ['required', 'string', "max:{$stringLength}"],
            'postcode' => ['required', 'string', "max:{$stringLength}"],
            'city' => ['required', 'string', "max:{$stringLength}"],
            'country' => ['required', 'string', 'size:3'],
        ];
    }
}
