<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'cdCarro';
    protected $fillable = [
        'placa',
        'descricao',
        'chassi',
        'combustivel',
        'lugar',
        'ano',
        'remark',
        'leilao',
        'descLeilao'
    ];
    
    protected $attributes = [
        'leilao' => '',
        'descleilao' => '',
        'remark' => '',
    ];

    protected $appends = ['links'];

    public function getLinksAttribute($links): array
    {
        return [
            'self' => '/api/carro/' . $this->cdCarro,
            'debitos' => '/api/carro/' . $this->cdCarro . '/debitos'
        ];
    }
    
    public function debitos(){
        return $this->hasMany(Debito::class);

    }
}

