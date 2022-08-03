<?php

namespace App\Http\Livewire;

use App\Models\Toponymes;
use Livewire\Component;

class TypologieCommuneSelect extends Component
{
    public $commune_name; // L'identifiant du commune
    public $typologie_name; // L'identifiant de la typologie
    public $typologies; // la collection de typologie
    public $nom_propose_name; //
    public $nom_proposes;
    //public string $message;

    public function mount() {
        // On affecte une collection vide
        $this->typologies   = collect();
        $this->nom_proposes = collect();
        //$this->message      ='bonjour';
    }

    public function updatedCommuneName ($newValue) {

        $this->typologies = Toponymes::select('typologie')
             ->distinct('typologie')
             ->where('commune', $newValue)
             ->orderBy('typologie','asc')
             ->get();
             
    }

    public function updatedNomProposeName($valueCom,$valueTypo){
        $this->nom_proposes = Toponymes::select('nom_propose')
             ->distinct()
             ->where('commune',$valueCom)
             ->where('typologie',$valueTypo)
             ->whereNotnull('nom_propose')
             ->whereNotNull('gid_ati')
             ->orderBy('nom_propose','asc')
             ->get();
    }

    public function render()
    {
          // On récupère les communes Toponymes::select('commune')->distinct()->orderBy('commune','asc')->get();
    $communes   = Toponymes::select("id", "commune")
                    ->distinct('commune')
                    ->get();

    // On retourne la vue avec les communes
    return view('pages.denomination', [
        'communes' => $communes,
    ])->layout('layouts.guest');
    }
}
