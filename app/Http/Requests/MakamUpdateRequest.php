<?php
  
  namespace App\Http\Requests;
  
  use App\Models\makam;
  use Illuminate\Foundation\Http\FormRequest;
  use Illuminate\Validation\Rule;
  
  class MakamUpdateRequest extends FormRequest
  {
      /**
       * Get the validation rules that apply to the request.
       *
       * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
       */
      public function rules(): array
      {
          return [
            'Nama' => ['required', 'string', 'max:255'],
            'Gelar' => ['required', 'string', 'max:255'],
            'Tgl_Lahir' => ['nullable', 'date'],
            'Tgl_Meninggal' => ['nullable', 'date'],
            'Cluster' => ['required', 'string', 'max:255'],
            'Deskripsi' => ['nullable', 'string'],
            'media' => ['nullable', 'file', 'mimes:jpg,jpeg,png,mp4,mov,avi', 'max:1024000'],
          ];
      }
  }
     