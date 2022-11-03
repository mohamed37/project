<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    protected $model;
    protected $moduleName;
    protected $pageTitle;
    protected $pageDes;

    public function __construct(Model $model)
    {
        $this->model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();

        if(!empty($with)) 
        {
            $rows = $rows->with($with);
        }
        
        $request->paginate = 10;
        $rows = $rows->paginate($request->paginate);
        $moduleName = $this->pluralModelName();
        $getModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $pageTitle = "Control " . $moduleName;
        $pageDes = "Here You Can Add / Edit / Delete " . $moduleName;

        return view('Dashboard.'. $routeName . 'index',compact(
            'rows' , 'pageTitle', 'moduleName', 'pageDes', 'getModuleName', 'routeName'
        ));
    }

    public function create(Request $request)
    {
        $moduleName = $this->getModelName();
        $pageTitle = "Create ". $moduleName;
        $pageDes = "Here you can create " . $moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('Dasboard.'.$folderName.'.create' , compact(
            'pageTitle', 'pageDes', 'moduleName', 'folderName', 'routeName'
        ))->with($append);
    }

    public function update(Request $request)
    {
        $row = $this->model->findOrFail($request->id);
        $moduleName = $this->getModelName();
        $pageTitle = "Edit ". $moduleName;
        $pageDes = "Here you can Update " . $moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('Dasboard.'.$folderName.'.edit' , compact(
            'row','pageTitle', 'pageDes', 'moduleName', 'folderName', 'routeName'
        ))->with($append);
    }

    public function destroy(Request $request)
    {
        $this->model->findOrFail($request->id);
        return redirect()->to($this->gerClassNameFromModel().'.index');
    }

    protected function filter($rows) { return $rows;}
    protected function with() {return [];}
    protected function append() { return [];}

    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName()
    {
        return str_plural($this->getModelName());
    }

    protected function getModelName()
    {
        return class_basename($this->model);
    }

    
}
