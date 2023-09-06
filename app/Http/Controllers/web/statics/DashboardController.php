<?php

namespace App\Http\Controllers\Web\Statics;

use App\Http\Controllers\Controller;
use App\Services\FileService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @var FileService
     */
    protected $fileService;

    /**
     * DashboardController constructor.
     *
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Display the dashboard view.
     *
     * @return View
     */
    public function dashboard(): View
    {
        $lastXMLs = $this->fileService->getAll();
        return view('web.sections.static.dashboard', compact('lastXMLs'));
    }
}