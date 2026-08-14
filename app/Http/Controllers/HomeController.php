<?php

namespace App\Http\Controllers;

use App\Models\Capability;
use App\Models\CompanyPillar;
use App\Models\Partner;
use App\Models\PlatformStep;
use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->get('lang', session('lang', 'en'));
        if (in_array($lang, ['en', 'id'])) {
            session(['lang' => $lang]);
            App::setLocale($lang);
        } else {
            $lang = 'en';
            App::setLocale('en');
        }

        $heroSetting = SiteSetting::where('key', 'hero')->first()?->value;
        $aboutStats = SiteSetting::where('key', 'about_stats')->first()?->value;
        $contactInfo = SiteSetting::where('key', 'contact_info')->first()?->value;

        $pillars = CompanyPillar::where('is_active', true)->orderBy('sort_order')->get();
        $capabilities = Capability::where('is_active', true)->orderBy('sort_order')->get();
        $featuredProject = Project::where('is_featured', true)->where('is_active', true)->first();
        $otherProjects = Project::where('is_featured', false)->where('is_active', true)->orderBy('sort_order')->get();
        $platformSteps = PlatformStep::orderBy('step_number')->get();
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->get();

        $brochureFiles = array_map(function($path) {
            return asset('brosur/' . basename($path));
        }, glob(public_path('brosur/*.jpg')) ?: []);

        return view('welcome', compact(
            'lang',
            'heroSetting',
            'aboutStats',
            'contactInfo',
            'pillars',
            'capabilities',
            'featuredProject',
            'otherProjects',
            'platformSteps',
            'partners',
            'brochureFiles'
        ));
    }

    public function switchLang($lang)
    {
        if (in_array($lang, ['en', 'id'])) {
            session(['lang' => $lang]);
            App::setLocale($lang);
        }
        return redirect()->back();
    }
}
