<?php
namespace App\Aren\Prestataire\Repo;

use App\Aren\Prestataire\Repo\PrestataireInterface;
use App\Aren\Prestataire\Entities\Prestataire as M;

class PrestataireEloquent implements PrestataireInterface
{
    protected $prestataire;

    public function __construct(M $prestataire)
    {
        $this->prestataire = $prestataire;
    }

    public function getAll($actifs = false, $participant = false)
    {
        return $this->prestataire->with(['types'])->actifs($actifs)->participants($participant)->get();
    }

    public function find($id){

        return $this->prestataire->with(['types','map','remarques','prestations'])->findOrFail($id);
    }

    public function create(array $data){

        $prestataire = $this->prestataire->create(array(
            'etablissement'  => (isset($data['etablissement']) ? $data['etablissement'] : ''),
            'tache'          => (isset($data['tache']) ? $data['tache'] : ''),
            'civilite'       => $data['civilite'],
            'prenom'         => $data['prenom'],
            'nom'            => $data['nom'],
            'npa'            => $data['npa'],
            'rue'            => $data['rue'],
            'ville'          => $data['ville'],
            'district'       => (isset($data['district']) ? $data['district'] : ''),
            'telephone'      => (isset($data['telephone']) ? $data['telephone'] : ''),
            'mobile'         => (isset($data['mobile']) ? $data['mobile'] : ''),
            'fax'            => (isset($data['fax']) ? $data['fax'] : ''),
            'email'          => (isset($data['email']) ? $data['email'] : ''),
            'web'            => (isset($data['web']) ? $data['web'] : ''),
            'noParticipant'  => $data['noParticipant'],
            'actif'          => (isset($data['actif']) ? $data['actif'] : 0),
            'rang'           => (isset($data['rang']) ? $data['rang'] : 0),
        ));

        if( ! $prestataire )
        {
            return false;
        }

        return $prestataire;

    }

    public function update(array $data){

        $prestataire = $this->prestataire->findOrFail($data['id']);

        if( ! $prestataire )
        {
            return false;
        }

        $prestataire->fill($data);
        $prestataire->save();

        return $prestataire;
    }

    public function delete($id){

        $prestataire = $this->prestataire->find($id);

        return $prestataire->delete($id);
    }

}
