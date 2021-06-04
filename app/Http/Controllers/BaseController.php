<?php


namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    /**
     * @return string
     * @throws Exception
     */
    private function getModel()
    {
        $controllerClass = get_class($this);
        $modelClassName = '';
        preg_match('/.*\\\\(.*)Controller$/', $controllerClass, $matches);
        if (count($matches) === 2) {
            $modelClassName = $matches[1];
        }
        $modelClass = 'App\\Models\\' . $modelClassName;
        if (!class_exists($modelClass)) {
            throw new Exception('Model class not found');
        }
        return $modelClass;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws Exception
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $modelClass = $this->getModel();
        $model = new $modelClass;
        $model->name = $request->input('name');
        $model->save();

        return $model;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function list()
    {
        $modelClass = $this->getModel();
        $modelQb = call_user_func($modelClass . '::with', ['dogs']);
        return $modelQb->get();
    }

}
