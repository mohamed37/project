<?php

namespace App\Repository;
use App\Interfaces\permissionRepositoryInterface;

class premissionRepository implements permissionRepositoryInterface
{
    protected $model;
    
    public function __construct(Model $model)
    {
        $this->model;
    }

    public function view()
    {
        $rows = $this->model;
        $rows = $rows->paginate(10);
        $routeName = $this->getClassNameFromModel();
        return view('Dashboard.'.$routeName . 'index',compact('rows'));
    }


    public function create()
    {
        $routeName = $this->getClassNameFromModel();
        return view('Dashboard.'.$routeName . 'index');
    }
    


    public function insert($request)
    {
        try{
            //validate

            //store
             $this->model()->createOrUpdate([$request]);   
            //return
            return back()->with(['success' => __('messages.add_succ')]);

        }catch(\Exception $ex)
        {
            return $ex;
            return back()->with(['error' => __('messages.technical')]);
        }
    }
    

    public function edit($request)
    {   
        $row = $this->model()->findOrFail($request->id);
        $routeName = $this->getClassNameFromModel();
        return view('Dashboard.'.$routeName . 'edit', compact('row'));
    }
    

    public function update($request)
    {
        try{
            //validate

            //update
            $row = $this->model()->findOrFail($request->id);
            $row->Update([$request]);   
            //return
            return back()->with(['success' => __('messages.edit_succ')]);

        }catch(\Exception $ex)
        {
            return $ex;
            return back()->with(['error' => __('messages.technical')]);
        }
    }
    

    public function destroy($request)
    {
        try{
            
            //delete
             $this->model()->findOrFail($request->id)->delete();   
            //return
            return back()->with(['success' => __('messages.delete_succ')]);

        }catch(\Exception $ex)
        {
            return $ex;
            return back()->with(['error' => __('messages.technical')]);
        }
    }

    protected function getClassNameFromModel()
    {
        return strtolower(str_plural(class_basename($this->model)));
        
    }

}
