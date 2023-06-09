<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;
    
    protected $dates = ['ultimo_dia'];

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id',
    ];

    public function categoria() {
        // una vacante tiene una categoria
        return $this->belongsTo(Categoria::class);
    }
    public function salario() {
        // Unna vacante tiene un salario
        return $this->belongsTo(Salario::class);
    }
    
    public function candidatos() {
        // Donde una vacante tiene muchos candidatos
        return $this->hasMany(Candidato::class)->orderByDesc('created_at');
    }

    public function reclutador() {
        // Cuando se sale de la convencion, tenemos que especificar
        // que va a ser el user_id


        // Esta relacion va a hacer hacia la persona que publico esta vacante
        return $this->belongsTo(User::class, 'user_id');
    }
}
