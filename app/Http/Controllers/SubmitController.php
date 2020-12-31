<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class SubmitController extends Controller
{   
    public function distribute(Request $request)
    {
        $validated = $request->validate([
            'no_of_people' => 'required|integer|min:1',
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
        $cards_per_person = floor(count($shuffled) / $no_of_people);
        if ($cards_per_person < 1)
            $cards_per_person = 1;
        $result = '';

        for($i = 0; $i < $no_of_people; $i++) {
            $result .= 'Person #'.($i + 1).' => ';
            for($j = $i * $cards_per_person; $j < ($i + 1) * $cards_per_person; $j++) {
                if ($j < 52) {
                    $result .= $shuffled[$j].',';
                    unset($shuffled[$j]);
                }
            }
            $result .= '<br/>';
        }

        return view('home', ['result' => $result]);
    }
}