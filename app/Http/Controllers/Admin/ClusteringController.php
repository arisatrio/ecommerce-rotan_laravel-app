<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Models\Product;
use Phpml\Clustering\KMeans;
use Phpml\Math\Distance\Euclidean;

class ClusteringController extends Controller
{
    public function index(Request $request)
    {   
        $data = Product::with(['transaksi', 'penjualan'])->active()->get();

        foreach($data as $key => $d) {
            $samples[$d->name] = [$d->transaksi->count(), $d->penjualan->sum('quantity')];
        }
        $kmeans = new KMeans(2);
        $cluster = $kmeans->cluster($samples);
        
        foreach($cluster as $key => $c) {
            $clustering['C'.$key+1] = collect($c);
        }

        $euclidean = new Euclidean();
        foreach($clustering as $cluster => $data) {
            $randomCentroid[$cluster] = $data->random();
        }
         //dd($distance);
        //dd($clustering);

        // $a = [5, 7];
        // $b = [3, 5]; 
        
        $euclidean = new Euclidean();
        // dd($euclidean->distance($a, $b));
        

        return view('_admin.clustering.index', compact('clustering', 'randomCentroid', 'euclidean'));
    }
}
