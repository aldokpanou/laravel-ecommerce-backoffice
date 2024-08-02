<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Changez à false si vous souhaitez ajouter une logique d'autorisation
    }

    /**
     * Règles de validation pour la requête.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Messages de validation personnalisés.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Le nom du produit est requis.',
            'description.required' => 'La description du produit est requise.',
            'price.required' => 'Le prix du produit est requis.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'stock.required' => 'Le stock du produit est requis.',
            'stock.numeric' => 'Le stock doit être un nombre.',
            'category_id.required' => 'La catégorie est requise.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
        ];
    }
}
