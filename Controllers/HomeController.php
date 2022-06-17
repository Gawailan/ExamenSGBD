<?php


class HomeController extends Controller
{
    public function index()
    {
        unset($_SESSION['ERROR']);

        $dateDay = Parent::getDateDay();
        $animals = Animal::all();
        $persons = Person::all();
        $boardings = Boarding::all();
        if(!empty($animals)){
            $nbanimals = count($animals);
        }
        if(!empty($persons)){
            $nbpersons = count($persons);
        }
        if(!empty($boardings)){
            $nbboardings = count($boardings);
        }
        $startBoardings = Boarding::where('startDate_boarding',$dateDay);
        $endBoardings = Boarding::where('endDate_boarding',$dateDay);
        $date = date('Y-m-d');

        include('../Views/Homes/home.php');
    }
}
?>