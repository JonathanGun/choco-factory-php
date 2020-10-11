<?php

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        require VIEW_PATH . "HomeView.class.php";
    }

    public function dashboard()
    {
        $this->authenticate();
        $this->filterMethod(array('GET'));

        echo (new HomeView(
            'dashboard.php',
            '| Dashboard',
            array(
                'chocolates' => $this->chocolateModel->getMostSoldChocolates(10),
            )
        ))->render();
    }
}
