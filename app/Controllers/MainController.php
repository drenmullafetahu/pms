<?php
/**
 * Date: 19-Jul-16
 * Time: 02:55 PM
 */

namespace Controllers;


use App\ViewShare\ViewShare;
use App\Http\Requests\AppRequest;
use Illuminate\Routing\Route;

class MainController extends Controller
{

    protected $_controller;
    protected $_model;
    protected $_subModel;
    protected $_template;
    protected $_action;


    public function __construct(AppRequest $request, Route $route)
    {
        $viewShare = new ViewShare($route, $request);
        $this->setController();
        $this->setModel();
        $this->setTemplate();
        $this->_action = $viewShare->getAction();

    }

    private function setController()
    {
        if (!$this->_controller) {
            $controller = new \ReflectionClass($this);
            $controller = strtolower(str_replace("Controller", '', $controller->getShortName()));
            $this->_controller = $controller;
        }
    }

    private function setTemplate()
    {
        if (!$this->_template)
            $this->_template = appModule() . '.templates.' . $this->_controller;
    }

    private function setModel()
    {
        if (!$this->_model) {
            $this->_model = ucfirst($this->_controller);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view($this->_template);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->_template);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->_template);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view($this->_template);
    }


}