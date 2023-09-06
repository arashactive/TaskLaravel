<?php

namespace App\Http\Controllers\web\section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\ExcelRequest;
use App\Services\Util\ExcelService;
use Illuminate\View\View;

class ExcelController extends Controller
{

    private $excelService;

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function init(): View
    {
        return view('web.sections.excel.init');
    }

    public function upload(ExcelRequest $request): View
    {
        $excelRows = $this->excelService->excelToArray($this->excelService->upload($request));

        return view('web.sections.excel.preview', compact('excelRows'));
    }
}
