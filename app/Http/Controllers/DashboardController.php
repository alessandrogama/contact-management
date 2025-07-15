<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Gráfico de barras - contatos por mês
        $monthlyData = Contact::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->pluck('total', 'month');

        $labels = [];
        $values = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->translatedFormat('F');
            $values[] = $monthlyData[$i] ?? 0;
        }

        // Total de contatos
        $totalContacts = Contact::count();

        // Último contato
        $lastContact = Contact::latest()->first();

        // Gráfico de pizza por domínio de e-mail
        $emailDomains = Contact::selectRaw('SUBSTRING_INDEX(email, "@", -1) as domain, COUNT(*) as total')
            ->groupBy('domain')
            ->orderByDesc('total')
            ->pluck('total', 'domain');

        return view('dashboard', compact(
            'labels',
            'values',
            'totalContacts',
            'lastContact',
            'emailDomains'
        ));
    }
}
