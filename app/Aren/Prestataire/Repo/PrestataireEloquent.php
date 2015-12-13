<?php
namespace App\Aren\Prestataire\Repo;

use App\Aren\Prestataire\Repo\PrestataireInterface;
use App\Aren\Prestataire\Entities\Prestataire as M;
use App\Aren\Prestataire\Entities\Map;

class PrestataireEloquent implements PrestataireInterface
{
    protected $prestataire;
    protected $map;

    public function __construct(M $prestataire, Map $map)
    {
        $this->prestataire = $prestataire;
        $this->map = $map;
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
            'actif'          => 0,
            'rang'           => (isset($data['rang']) ? $data['rang'] : 0),
        ));

        if( ! $prestataire )
        {
            return false;
        }

        if(isset($data['map']) && !empty($data['map']))
        {
            $this->map->create(['prestataire_id' => $prestataire->id, 'latitude' => $data['map']['latitude'], 'longitude' => $data['map']['longitude'] ]);
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

        if(isset($data['map']) && !empty($data['map']))
        {

            $map = $this->map->where('prestataire_id','=',$prestataire->id)->get();

            if(!$map->isEmpty())
            {
                $themap = $map->first();

                $themap->latitude  = $data['map']['latitude'];
                $themap->longitude = $data['map']['longitude'];

                $themap->save();
            }
            else
            {
                $this->map->create(['prestataire_id' => $prestataire->id, 'latitude' => $data['map']['latitude'], 'longitude' => $data['map']['longitude'] ]);
            }
        }

        return $prestataire;
    }

    public function delete($id){

        $prestataire = $this->prestataire->find($id);

        return $prestataire->delete($id);
    }

}
