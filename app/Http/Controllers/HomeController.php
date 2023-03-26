<?php

namespace App\Http\Controllers;
use App\Models\HardwareInventoryModel;
use App\Models\ComputerInventoryModel;
use App\Models\DepartmentModel;
use App\Models\ManagePdf;
use App\Models\EtcItMemberModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {

        $hardware_inventory = HardwareInventoryModel::where('status', '!=', '0')
                            ->paginate(10);
        $computer_inventory = ComputerInventoryModel::where('status', '!=', '0')
                             ->paginate(10);
        $deparment = DepartmentModel::where('status', '!=', '0')
                            ->get();
        $pdf = ManagePdf::where('status', '!=', '0')->orderBy('arrangement', 'asc')
                            ->get();

        $it_manager = EtcItMemberModel::where('status', '!=', '0')
                          ->where('position', '=', 'IT Manager')
                          ->orderBy('arrangement', 'asc')
                          ->get();

        $it_support = EtcItMemberModel::where('status', '!=', '0')
                                ->where('position', '=', 'IT Support')
                                ->orderBy('arrangement', 'asc')
                                ->get();

        return view('welcome', [
            'inventory' => $hardware_inventory,
            'inventory_computer' => $computer_inventory,
            'deparment' => $deparment,
            'pdf' => $pdf,
            'it_manager' => $it_manager,
            'it_support' => $it_support
        ]);

    }
    
}
