<?php
  
  namespace App\Http\Requests;
  
  use App\Models\kas;
  use Illuminate\Foundation\Http\FormRequest;
  use Illuminate\Validation\Rule;
  
  class KasUpdateRequest extends FormRequest
  {
      /**
       * Get the validation rules that apply to the request.
       *
       * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
       */
      public function rules(): array
      {
          return [
            'Pemasukan' => ['numeric', 'min:0'],
            'Pengeluaran' => ['numeric', 'min:0'],
            'Donatur' => ['string', 'max:255'],
            'Keterangan' => ['string'],
          ];
      }
  }
     