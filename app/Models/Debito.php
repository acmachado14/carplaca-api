<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debito extends Model
{

		public $timestamps = false;
		protected $primaryKey = 'cdDebito';
		protected $fillable = [
			'tipo',
			'valor',
			'descricao',
			'cdCarro'
		];

		protected $appends = ['links'];

		public function getLinksAttribute($links): array
		{
			return [
				'self' => '/api/debito/' . $this->cdDebito,
				'carro' => '/api/carro/' . $this->cdCarro
			];
		}
		public function carro()
		{
			return $this->belongsTo(Carro::class);
		}

	}

?>