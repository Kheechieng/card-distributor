<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class SubmitController extends Controller
{   
    public function distribute(Request $request)
    {
        $validated = $request->validate([
            'no_of_people' => 'required|numeric|min:0',
        ]);

        $shapes = array('S', 'H', 'D', 'C');
        $numbers = array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K');
        $cards = array();

        foreach($shapes as $shape) {
            foreach($numbers as $number) {
                $cards[] = $shape."-".$number;
            }
        }

        $collection = collect($cards);
        $shuffled = $collection->shuffle();
        $shuffled->all();

        $no_of_people = $request->no_of_people;
        $cards_per_person = count($shuffled) / $no_of_people;
        $result = '';

        for($i = 0; $i < $no_of_people; $i++) {
            for($j = $i * $cards_per_person; $j < ($i + 1) * $cards_per_person; $j++) {
                $result .= $shuffled[$j].',';
            }
            $result .= '<br/>';
        }

        return view('home', ['result' => $result]);
    }
}