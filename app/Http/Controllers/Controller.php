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
    public $routes = [];

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
        return view('default.list', ['list'=>$items, 'entity'=>$this->getEntity(), 'routes'=>$this->routes]);
    }

    public function add()
    {
        return view(static::ViewFolder.'.form',['entity'=> $this->getEntity()]);
    }

    public function make(Request $request)
    {
        $input = $this->filter($request);
        return $this->getEntity()->create($input);
    }
    public function view($entityId)
    {
        return view(static::ViewFolder.'.view',['entity'=>$this->getEntity(decrypt($entityId))]);
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
        return view(static::ViewFolder.'.form',['entity'=>$entity]);
    }

    public function delete(Request $request)
    {
        $entity = $this->getEntity(decrypt($request->input('id')));
        return $entity->delete();
    }

    public function getEntity($id = null)
    {
        $entityKind = static::MAIN_ENTITY;
        $entity = new $entityKind();
        if($id !== null && strcasecmp($id, (int) $id) === 0) {
            $entity = $entity::findOrFail($id);
        }
        return $entity;
    }

    protected function filter(Request $request) {
        $inputs = $request->input();
        unset ($inputs['_token']);
        return $inputs;
    }
}
