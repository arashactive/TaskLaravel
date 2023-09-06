<?php

namespace App\Http\Controllers\Web\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sections\ExcelRequest;
use App\Services\FileService;
use App\Services\Util\ExcelService;
use Illuminate\View\View;

class ExcelController extends Controller
{
    /**
     * @var ExcelService
     */
    private $excelService;

    /**
     * @var FileService
     */
    private $fileService;

    /**
     * ExcelController constructor.
     *
     * @param ExcelService $excelService
     * @param FileService $fileService
     */
    public function __construct(
        ExcelService $excelService,
        FileService $fileService
    ) {
        $this->excelService = $excelService;
        $this->fileService = $fileService;
    }

    /**
     * Show the initialization view for Excel operations.
     *
     * @return View
     */
    public function init(): View
    {
        return view('web.sections.excel.init');
    }

    /**
     * Upload an Excel file and show a preview.
     *
     * @param ExcelRequest $request
     * @return View
     */
    public function upload(ExcelRequest $request): View
    {
        $excelPath = $this->excelService->upload($request);
        $excelRows = $this->excelService->excelToArray($excelPath);

        return view('web.sections.excel.preview', compact('excelRows', 'excelPath'));
    }

    /**
     * Show the XML content for a specific file.
     *
     * @param int $fileId
     * @return View
     */
    public function xml(int $fileId): View
    {
        $file = $this->fileService->findById($fileId);
        return view('web.sections.excel.show', compact('file'));
    }

    /**
     * Download the XML file for a specific file ID.
     *
     * @param int $fileId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download(int $fileId)
    {
        $file = $this->fileService->findById($fileId);
        return response()->download(storage_path('app/' . $file->xml_file));
    }
}