<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(array $criteria = array(), array $order = array())
    {
        $entities = $this->getEntity()->query();
        if(!empty($criteria)) {
            foreach ($criteria as $field=>$value) {
                $entities->where($field, '=', $value);
            }
        }
        if(!empty($order)) {
            foreach($order as $orderField=>$ordenation) {
                $entities->order($orderField,$ordenation);
            }
        }
        $items  = $entities->paginate(20);
        return $this->view('default.list', ['list'=>$items, 'entity'=>$this->getEntity()]);
    }

    public function add()
    {
        return $this->view(static::ViewFolder.'.form',['entity'=> $this->getEntity]);
    }

    public function create(Request $request)
    {
        return $this->getEntity()->populate($request->input())->save();
    }

    public function update($entityId, Request $request)
    {
        if(decrypt($entityId)==decrypt($request->input('id'))) {
            return $this->getEntity(decrypt($entityId))->update($request->input());
        }
    }
    public function edit($entityId)
    {
        $entity = $this->getEntity(decrypt($entityId));
        return $this->view(static::ViewFolder.'.form',['entity'=>$entity]);
    }

    public function delete(Request $request)
    {
        $entity = $this->getEntity(decrypt($request->input('id')));
        return $entity->delete();
    }
}
